USE BDsl;

-- Por si queremos eliminar un procedimiento.
DROP PROCEDURE IF EXISTS ActualizarNotas

DELIMITER //

CREATE PROCEDURE RegistrarLogin(
  IN p_nombres VARCHAR(50),
  IN p_password VARCHAR(100)
)
/*
Procedimiento almacenado que registra el inicio de sesión en la tabla TimeToLogin.
Requiere nombres y contraseña válidos previamente validados.

Parámetros:
- p_nombres: Nombres del usuario (previamente validados).
- p_password: Contraseña del usuario (previamente validada).
*/
BEGIN
  DECLARE v_id_usuario INT;

  -- Obtener el ID del usuario basado en el nombre y contraseña proporcionados
  SELECT id_usuario INTO v_id_usuario
  FROM Usuario
  WHERE nombres = p_nombres AND password = p_password;

  -- Insertar el registro de inicio de sesión en la tabla TimeToLogin
  INSERT INTO TimeToLogin (id_usuario, fecha_login)
  VALUES (v_id_usuario, NOW());
  
END //

DELIMITER ;

/*
Procedimiento almacenado que registra un token en la tabla Token para restablecer la contraseña de un usuario.

Parámetros:
- p_nombres: Nombres del usuario al que se le enviará el token.
- p_token: Token generado para restablecer la contraseña.
- p_fecha_emision: Fecha y hora de emisión del token.
- p_fecha_expiracion: Fecha y hora de expiración del token.
*/

DELIMITER //

CREATE PROCEDURE GenerarToken(
  IN p_nombres VARCHAR(50),
  IN p_token VARCHAR(100),
  IN p_fecha_emision DATETIME,
  IN p_fecha_expiracion DATETIME
)
BEGIN
  DECLARE v_id_usuario INT;

  -- Obtener el ID del usuario basado en los nombres proporcionados
  SELECT id_usuario INTO v_id_usuario
  FROM Usuario
  WHERE nombres = p_nombres;

  -- Insertar el registro del token en la tabla Token
  INSERT INTO Token (id_usuario, token, fecha_emision, fecha_expiracion)
  VALUES (v_id_usuario, p_token, p_fecha_emision, p_fecha_expiracion);
  
END //

DELIMITER ;

DELIMITER //

CREATE PROCEDURE ActualizarContrasena(
  IN p_nombres VARCHAR(50),
  IN p_nueva_contrasena VARCHAR(100)
)
BEGIN
  UPDATE Usuario
  SET password = p_nueva_contrasena
  WHERE nombres = p_nombres;
END //

DELIMITER ;

/*
Procedimiento almacenado que actualiza las notas y los estatus correspondientes en la base de datos.

Parámetros:
- p_nombre: Nombre del alumno.
- p_apellido_paterno: Apellido paterno del alumno.
- p_apellido_materno: Apellido materno del alumno.
- p_nota1: Primera nota a actualizar.
- p_nota2: Segunda nota a actualizar.
- p_nota3: Tercera nota a actualizar.
- p_id_curso: ID del curso.
- p_id_alumno: ID del alumno.
*/

DELIMITER //

CREATE PROCEDURE ActualizarNotas(
  IN p_nombre VARCHAR(50),
  IN p_apellido_paterno VARCHAR(50),
  IN p_apellido_materno VARCHAR(50),
  IN p_nota1 DECIMAL(5, 2),
  IN p_nota2 DECIMAL(5, 2),
  IN p_nota3 DECIMAL(5, 2),
  IN p_id_curso INT,
  IN p_id_alumno INT
)
BEGIN
  DECLARE v_id_cursoDelAlumno INT;
  DECLARE v_id_trimestre INT;
  DECLARE v_num_trimestres INT;
  DECLARE v_promedio DECIMAL(5, 2);
  DECLARE v_estatus_cursoDelAlumno ENUM('Aprobado', 'Desaprobado', 'En curso');

  -- Obtener el id_cursoDelAlumno correspondiente
  SELECT id_cursoDelAlumno INTO v_id_cursoDelAlumno
  FROM CursoDelAlumno
  WHERE id_curso = p_id_curso
    AND id_alumno = p_id_alumno;

  -- Verificar si ya se actualizaron los tres trimestres del curso
  SELECT COUNT(*) INTO v_num_trimestres
  FROM CursoDelAlumno
  WHERE id_cursoDelAlumno = v_id_cursoDelAlumno
    AND (id_t1 IS NULL OR id_t2 IS NULL OR id_t3 IS NULL);

  IF v_num_trimestres = 0 THEN
    -- Los tres trimestres ya están actualizados, no hacer nada
    SELECT 'Los tres trimestres ya están actualizados.' AS mensaje;
  ELSE
    -- Actualizar el trimestre correspondiente
    IF (SELECT id_t1 FROM CursoDelAlumno WHERE id_cursoDelAlumno = v_id_cursoDelAlumno) IS NULL THEN
      -- Actualizar el primer trimestre
      INSERT INTO Trimestre (nota1, nota2, nota3, estatus)
      VALUES (p_nota1, p_nota2, p_nota3, IF((p_nota1 + p_nota2 + p_nota3) / 3 > 12, 'Aprobado', 'Desaprobado'));
      SET v_id_trimestre = LAST_INSERT_ID();
      UPDATE CursoDelAlumno
      SET id_t1 = v_id_trimestre
      WHERE id_cursoDelAlumno = v_id_cursoDelAlumno;
    ELSEIF (SELECT id_t2 FROM CursoDelAlumno WHERE id_cursoDelAlumno = v_id_cursoDelAlumno) IS NULL THEN
      -- Actualizar el segundo trimestre
      INSERT INTO Trimestre (nota1, nota2, nota3, estatus)
      VALUES (p_nota1, p_nota2, p_nota3, IF((p_nota1 + p_nota2 + p_nota3) / 3 > 12, 'Aprobado', 'Desaprobado'));
      SET v_id_trimestre = LAST_INSERT_ID();
      UPDATE CursoDelAlumno
      SET id_t2 = v_id_trimestre
      WHERE id_cursoDelAlumno = v_id_cursoDelAlumno;
    ELSE
      -- Actualizar el tercer trimestre
      INSERT INTO Trimestre (nota1, nota2, nota3, estatus)
      VALUES (p_nota1, p_nota2, p_nota3, IF((p_nota1 + p_nota2 + p_nota3) / 3 > 12, 'Aprobado', 'Desaprobado'));
      SET v_id_trimestre = LAST_INSERT_ID();
      UPDATE CursoDelAlumno
      SET id_t3 = v_id_trimestre
      WHERE id_cursoDelAlumno = v_id_cursoDelAlumno;
    END IF;

    -- Actualizar el estatus del curso del alumno
    SELECT COUNT(*) INTO v_num_trimestres
    FROM Trimestre
    WHERE id_trimestre IN ((SELECT id_t1 FROM CursoDelAlumno WHERE id_cursoDelAlumno = v_id_cursoDelAlumno),
                           (SELECT id_t2 FROM CursoDelAlumno WHERE id_cursoDelAlumno = v_id_cursoDelAlumno),
                           (SELECT id_t3 FROM CursoDelAlumno WHERE id_cursoDelAlumno = v_id_cursoDelAlumno))
      AND estatus = 'Desaprobado';

    IF v_num_trimestres > 0 THEN
      SET v_estatus_cursoDelAlumno = 'Desaprobado';
    ELSE
      SET v_estatus_cursoDelAlumno = 'Aprobado';
    END IF;

    UPDATE CursoDelAlumno
    SET estatus = v_estatus_cursoDelAlumno
    WHERE id_cursoDelAlumno = v_id_cursoDelAlumno;

    SELECT 'Notas actualizadas correctamente.' AS mensaje;
  END IF;
END //

DELIMITER ;
