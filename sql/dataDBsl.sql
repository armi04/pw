USE BDsl;

-- Los datos en la tabla Token y en la tabla TimeToLogin se llenarán según las solicitudes.

-- Insertar datos en la tabla Usuario
INSERT INTO Usuario (nombres, correo, password) VALUES
  ('JuanSL', 'juan@example.com', '$2y$10$iQPFDzL8e9dM.mvFiT/Bw.ikU7GYTYBRfpgPSWXJ91QIvG6YoQjyi'),
  ('MariaSL', 'maria@example.com', '$2y$10$iQPFDzL8e9dM.mvFiT/Bw.ikU7GYTYBRfpgPSWXJ91QIvG6YoQjyi'),
  ('AnitaSL', 'anita@example.com', '$2y$10$iQPFDzL8e9dM.mvFiT/Bw.ikU7GYTYBRfpgPSWXJ91QIvG6YoQjyi'),
  ('MartinSL', 'marin@example.com', '$2y$10$iQPFDzL8e9dM.mvFiT/Bw.ikU7GYTYBRfpgPSWXJ91QIvG6YoQjyi'),
  ('ToroSL', 'toro@example.com', '$2y$10$iQPFDzL8e9dM.mvFiT/Bw.ikU7GYTYBRfpgPSWXJ91QIvG6YoQjyi'),
  ('JoseSL', 'jose@example.com', '$2y$10$iQPFDzL8e9dM.mvFiT/Bw.ikU7GYTYBRfpgPSWXJ91QIvG6YoQjyi'),
  ('JhonSL', 'jhon@example.com', '$2y$10$iQPFDzL8e9dM.mvFiT/Bw.ikU7GYTYBRfpgPSWXJ91QIvG6YoQjyi'),
  ('MarloSL', 'marlo@example.com', '$2y$10$iQPFDzL8e9dM.mvFiT/Bw.ikU7GYTYBRfpgPSWXJ91QIvG6YoQjyi'),
  ('GuillermoSL', 'guillermo@example.com', '$2y$10$iQPFDzL8e9dM.mvFiT/Bw.ikU7GYTYBRfpgPSWXJ91QIvG6YoQjyi'),
  ('FatimaSL', 'fatima@example.com', '$2y$10$iQPFDzL8e9dM.mvFiT/Bw.ikU7GYTYBRfpgPSWXJ91QIvG6YoQjyi'),
  ('TimanaSL', 'timana@example.com', '$2y$10$iQPFDzL8e9dM.mvFiT/Bw.ikU7GYTYBRfpgPSWXJ91QIvG6YoQjyi');

-- Contraseña normal: secreto123 
-- Contraseña hash: $2y$10$iQPFDzL8e9dM.mvFiT/Bw.ikU7GYTYBRfpgPSWXJ91QIvG6YoQjyi

-- Insertar datos en la tabla Maestro
INSERT INTO Maestro (nombres, apellido_paterno, apellido_materno, id_usuario) VALUES
  ('Juan', 'López', 'Mendoza', 1),
  ('Maria', 'Ramírez', 'Fernández', 2),
  ('Anita', 'Pérez', 'García', 3),
  ('Martin', 'Hernández', 'Rojas', 4),
  ('Toro', 'Díaz', 'Vega', 5),
  ('Jose', 'Sánchez', 'Navarro', 6),
  ('Jhon', 'Torres', 'Silva', 7),
  ('Marlo', 'Cruz', 'Ortega', 8),
  ('Guillermo', 'Gómez', 'Ríos', 9),
  ('Fatima', 'Mendoza', 'Vargas', 10),
  ('Timana', 'Martínez', 'Vargas', 11);

-- Insertar datos en la tabla Curso
INSERT INTO Curso (nombre, horario, nivel, id_maestro) VALUES

-- Cursos de 4to "A"
  ('Matemática', 'Lunes 8:00-10:00', 4, 1),
  ('Comunicación', 'Martes 8:00-10:00', 4, 2),
  ('Educación Religiosa', 'Miercoles 8:00-10:00', 4, 3),
  ('Ciencia Tecnología y Ambiente', 'Jueves 8:00-10:00', 4, 4),
  ('Inglés', 'Viernes 8:00-10:00', 4, 5),
  ('Formación Ciudadana', 'Lunes 10:00-12:00', 4, 6),
  ('Historia, geografía y economía', 'Martes 10:00-12:00', 4, 7),
  ('Persona, familia y relaciones humanas', 'Miercoles 10:00-12:00', 4, 8),
  ('Educación Física', 'Jueves 10:00-12:00', 4, 9),
  ('Educación por el arte', 'Viernes 10:00-12:00', 4, 10),
  ('Educación para el trabajo', 'Lunes 12:00-12:45', 4, 11),

-- Cursos de 5to "B"
  ('Matemática', 'Lunes 10:00-12:00', 5, 1),
  ('Comunicación', 'Martes 10:00-12:00', 5, 2),
  ('Educación Religiosa', 'Miercoles 10:00-12:00', 5, 3),
  ('Ciencia Tecnología y Ambiente', 'Jueves 10:00-12:00', 5, 4),
  ('Inglés', 'Viernes 10:00-12:00', 5, 5),
  ('Formación Ciudadana', 'Lunes 8:00-10:00', 5, 6),
  ('Historia, geografía y economía', 'Martes 8:00-10:00', 5, 7),
  ('Persona, familia y relaciones humanas', 'Miercoles 8:00-10:00', 5, 8),
  ('Educación Física', 'Jueves 8:00-10:00', 5, 9),
  ('Educación por el arte', 'Viernes 8:00-10:00', 5, 10),
  ('Educación para el trabajo', 'Lunes 12:00-12:45', 5, 11);

-- Insertar datos en la tabla Alumno
INSERT INTO Alumno (nombre, apellido_paterno, apellido_materno, turno, grado, seccion, year_academico) VALUES
  
  -- Alumnos de 4to "A"
  ('Pedro', 'Gómez', 'Ramírez', 'Mañana', 4, 'A', 2023),
  ('Carlos', 'López', 'Sánchez', 'Mañana', 4, 'A', 2023),
  ('Fernando', 'Martínez', 'González', 'Mañana', 4, 'A', 2023),
  ('Luis', 'Flores', 'Castillo', 'Mañana', 4, 'A', 2023),
  ('Diego', 'Hernández', 'Torres', 'Mañana', 4, 'A', 2023),
  ('Andrés', 'García', 'Pérez', 'Mañana', 4, 'A', 2023),
  ('Javier', 'Rodríguez', 'Vargas', 'Mañana', 4, 'A', 2023),
  ('Daniel', 'Gómez', 'Ramírez', 'Mañana', 4, 'A', 2023),
  ('Gabriel', 'López', 'Sánchez', 'Mañana', 4, 'A', 2023),
  ('Jorge', 'Martínez', 'González', 'Mañana', 4, 'A', 2023),
  ('Eduardo', 'Flores', 'Castillo', 'Mañana', 4, 'A', 2023),
  ('Mateo', 'Hernández', 'Torres', 'Mañana', 4, 'A', 2023),
  ('Nicolás', 'García', 'Pérez', 'Mañana', 4, 'A', 2023),
  ('Emilio', 'Rodríguez', 'Vargas', 'Mañana', 4, 'A', 2023),
  ('Sebastián', 'Gómez', 'Ramírez', 'Mañana', 4, 'A', 2023),
  ('Matías', 'López', 'Sánchez', 'Mañana', 4, 'A', 2023),
  
  -- Alumnos de 5to "B"
  ('Laura', 'Hernández', 'Torres', 'Mañana', 5, 'B', 2023),
  ('Ana', 'García', 'Pérez', 'Mañana', 5, 'B', 2023),
  ('María', 'Rodríguez', 'Vargas', 'Mañana', 5, 'B', 2023),
  ('Valentina', 'Gómez', 'Ramírez', 'Mañana', 5, 'B', 2023),
  ('Camila', 'López', 'Sánchez', 'Mañana', 5, 'B', 2023),
  ('Sofía', 'Martínez', 'González', 'Mañana', 5, 'B', 2023),
  ('Isabella', 'Flores', 'Castillo', 'Mañana', 5, 'B', 2023),
  ('Valeria', 'Hernández', 'Torres', 'Mañana', 5, 'B', 2023),
  ('Mariana', 'García', 'Pérez', 'Mañana', 5, 'B', 2023),
  ('Alejandra', 'Rodríguez', 'Vargas', 'Mañana', 5, 'B', 2023),
  ('Catalina', 'Gómez', 'Ramírez', 'Mañana', 5, 'B', 2023),
  ('Ximena', 'López', 'Sánchez', 'Mañana', 5, 'B', 2023),
  ('Luciana', 'Martínez', 'González', 'Mañana', 5, 'B', 2023),
  ('Paula', 'Flores', 'Castillo', 'Mañana', 5, 'B', 2023),
  ('Ana Sofía', 'Hernández', 'Torres', 'Mañana', 5, 'B', 2023);

-- Los datos en la tabla Trimestre se actualizarán mediante la función de actualizar notas.

-- Insertar datos en la tabla CursoDelAlumno

-- Alumnos de 4to "A"

-- Insertar datos en la tabla CursoDelAlumno

-- Pedro
INSERT INTO CursoDelAlumno (id_curso, id_alumno) VALUES
  (1, 1),
  (2, 1),
  (3, 1),
  (4, 1),
  (5, 1),
  (6, 1),
  (7, 1),
  (8, 1),
  (9, 1),
  (10, 1),
  (11, 1);

-- Carlos
INSERT INTO CursoDelAlumno (id_curso, id_alumno) VALUES
  (1, 2),
  (2, 2),
  (3, 2),
  (4, 2),
  (5, 2),
  (6, 2),
  (7, 2),
  (8, 2),
  (9, 2),
  (10, 2),
  (11, 2);

-- Fernando
INSERT INTO CursoDelAlumno (id_curso, id_alumno) VALUES
  (1, 3),
  (2, 3),
  (3, 3),
  (4, 3),
  (5, 3),
  (6, 3),
  (7, 3),
  (8, 3),
  (9, 3),
  (10, 3),
  (11, 3);

-- Luis
INSERT INTO CursoDelAlumno (id_curso, id_alumno) VALUES
  (1, 4),
  (2, 4),
  (3, 4),
  (4, 4),
  (5, 4),
  (6, 4),
  (7, 4),
  (8, 4),
  (9, 4),
  (10, 4),
  (11, 4);

-- Diego
INSERT INTO CursoDelAlumno (id_curso, id_alumno) VALUES
  (1, 5),
  (2, 5),
  (3, 5),
  (4, 5),
  (5, 5),
  (6, 5),
  (7, 5),
  (8, 5),
  (9, 5),
  (10, 5),
  (11, 5);

-- Andrés
INSERT INTO CursoDelAlumno (id_curso, id_alumno) VALUES
  (1, 6),
  (2, 6),
  (3, 6),
  (4, 6),
  (5, 6),
  (6, 6),
  (7, 6),
  (8, 6),
  (9, 6),
  (10, 6),
  (11, 6);

-- Javier
INSERT INTO CursoDelAlumno (id_curso, id_alumno) VALUES
  (1, 7),
  (2, 7),
  (3, 7),
  (4, 7),
  (5, 7),
  (6, 7),
  (7, 7),
  (8, 7),
  (9, 7),
  (10, 7),
  (11, 7);

-- Daniel
INSERT INTO CursoDelAlumno (id_curso, id_alumno) VALUES
  (1, 8),
  (2, 8),
  (3, 8),
  (4, 8),
  (5, 8),
  (6, 8),
  (7, 8),
  (8, 8),
  (9, 8),
  (10, 8),
  (11, 8);

-- Gabriel
INSERT INTO CursoDelAlumno (id_curso, id_alumno) VALUES
  (1, 9),
  (2, 9),
  (3, 9),
  (4, 9),
  (5, 9),
  (6, 9),
  (7, 9),
  (8, 9),
  (9, 9),
  (10, 9),
  (11, 9);

-- Jorge
INSERT INTO CursoDelAlumno (id_curso, id_alumno) VALUES
  (1, 10),
  (2, 10),
  (3, 10),
  (4, 10),
  (5, 10),
  (6, 10),
  (7, 10),
  (8, 10),
  (9, 10),
  (10, 10),
  (11, 10);

-- Eduardo
INSERT INTO CursoDelAlumno (id_curso, id_alumno) VALUES
  (1, 11),
  (2, 11),
  (3, 11),
  (4, 11),
  (5, 11),
  (6, 11),
  (7, 11),
  (8, 11),
  (9, 11),
  (10, 11),
  (11, 11);

-- Mateo
INSERT INTO CursoDelAlumno (id_curso, id_alumno) VALUES
  (1, 12),
  (2, 12),
  (3, 12),
  (4, 12),
  (5, 12),
  (6, 12),
  (7, 12),
  (8, 12),
  (9, 12),
  (10, 12),
  (11, 12);

-- Nicolás
INSERT INTO CursoDelAlumno (id_curso, id_alumno) VALUES
  (1, 13),
  (2, 13),
  (3, 13),
  (4, 13),
  (5, 13),
  (6, 13),
  (7, 13),
  (8, 13),
  (9, 13),
  (10, 13),
  (11, 13);

-- Emilio
INSERT INTO CursoDelAlumno (id_curso, id_alumno) VALUES
  (1, 14),
  (2, 14),
  (3, 14),
  (4, 14),
  (5, 14),
  (6, 14),
  (7, 14),
  (8, 14),
  (9, 14),
  (10, 14),
  (11, 14);

-- Sebastián
INSERT INTO CursoDelAlumno (id_curso, id_alumno) VALUES
  (1, 15),
  (2, 15),
  (3, 15),
  (4, 15),
  (5, 15),
  (6, 15),
  (7, 15),
  (8, 15),
  (9, 15),
  (10, 15),
  (11, 15);

-- Matías
INSERT INTO CursoDelAlumno (id_curso, id_alumno) VALUES
  (1, 16),
  (2, 16),
  (3, 16),
  (4, 16),
  (5, 16),
  (6, 16),
  (7, 16),
  (8, 16),
  (9, 16),
  (10, 16),
  (11, 16);

-- Alumnos de 5to "B"

-- Laura
INSERT INTO CursoDelAlumno (id_curso, id_alumno) VALUES
  (12, 17),
  (13, 17),
  (14, 17),
  (15, 17),
  (16, 17),
  (17, 17),
  (18, 17),
  (19, 17),
  (20, 17),
  (21, 17),
  (22, 17);

-- Ana
INSERT INTO CursoDelAlumno (id_curso, id_alumno) VALUES
  (12, 18),
  (13, 18),
  (14, 18),
  (15, 18),
  (16, 18),
  (17, 18),
  (18, 18),
  (19, 18),
  (20, 18),
  (21, 18),
  (22, 18);

-- María
INSERT INTO CursoDelAlumno (id_curso, id_alumno) VALUES
  (12, 19),
  (13, 19),
  (14, 19),
  (15, 19),
  (16, 19),
  (17, 19),
  (18, 19),
  (19, 19),
  (20, 19),
  (21, 19),
  (22, 19);

-- Valentina
INSERT INTO CursoDelAlumno (id_curso, id_alumno) VALUES
  (12, 20),
  (13, 20),
  (14, 20),
  (15, 20),
  (16, 20),
  (17, 20),
  (18, 20),
  (19, 20),
  (20, 20),
  (21, 20),
  (22, 20);

-- Camila
INSERT INTO CursoDelAlumno (id_curso, id_alumno) VALUES
  (12, 21),
  (13, 21),
  (14, 21),
  (15, 21),
  (16, 21),
  (17, 21),
  (18, 21),
  (19, 21),
  (20, 21),
  (21, 21),
  (22, 21);

-- Sofía
INSERT INTO CursoDelAlumno (id_curso, id_alumno) VALUES
  (12, 22),
  (13, 22),
  (14, 22),
  (15, 22),
  (16, 22),
  (17, 22),
  (18, 22),
  (19, 22),
  (20, 22),
  (21, 22),
  (22, 22);

-- Isabella
INSERT INTO CursoDelAlumno (id_curso, id_alumno) VALUES
  (12, 23),
  (13, 23),
  (14, 23),
  (15, 23),
  (16, 23),
  (17, 23),
  (18, 23),
  (19, 23),
  (20, 23),
  (21, 23),
  (22, 23);

-- Valeria
INSERT INTO CursoDelAlumno (id_curso, id_alumno) VALUES
  (12, 24),
  (13, 24),
  (14, 24),
  (15, 24),
  (16, 24),
  (17, 24),
  (18, 24),
  (19, 24),
  (20, 24),
  (21, 24),
  (22, 24);

-- Mariana
INSERT INTO CursoDelAlumno (id_curso, id_alumno) VALUES
  (12, 25),
  (13, 25),
  (14, 25),
  (15, 25),
  (16, 25),
  (17, 25),
  (18, 25),
  (19, 25),
  (20, 25),
  (21, 25),
  (22, 25);

-- Alejandra
INSERT INTO CursoDelAlumno (id_curso, id_alumno) VALUES
  (12, 26),
  (13, 26),
  (14, 26),
  (15, 26),
  (16, 26),
  (17, 26),
  (18, 26),
  (19, 26),
  (20, 26),
  (21, 26),
  (22, 26);

-- Catalina
INSERT INTO CursoDelAlumno (id_curso, id_alumno) VALUES
  (12, 27),
  (13, 27),
  (14, 27),
  (15, 27),
  (16, 27),
  (17, 27),
  (18, 27),
  (19, 27),
  (20, 27),
  (21, 27),
  (22, 27);

-- Ximena
INSERT INTO CursoDelAlumno (id_curso, id_alumno) VALUES
  (12, 28),
  (13, 28),
  (14, 28),
  (15, 28),
  (16, 28),
  (17, 28),
  (18, 28),
  (19, 28),
  (20, 28),
  (21, 28),
  (22, 28);

-- Luciana
INSERT INTO CursoDelAlumno (id_curso, id_alumno) VALUES
  (12, 29),
  (13, 29),
  (14, 29),
  (15, 29),
  (16, 29),
  (17, 29),
  (18, 29),
  (19, 29),
  (20, 29),
  (21, 29),
  (22, 29);

-- Paula
INSERT INTO CursoDelAlumno (id_curso, id_alumno) VALUES
  (12, 30),
  (13, 30),
  (14, 30),
  (15, 30),
  (16, 30),
  (17, 30),
  (18, 30),
  (19, 30),
  (20, 30),
  (21, 30),
  (22, 30);

-- Ana Sofía
INSERT INTO CursoDelAlumno (id_curso, id_alumno) VALUES
  (12, 31),
  (13, 31),
  (14, 31),
  (15, 31),
  (16, 31),
  (17, 31),
  (18, 31),
  (19, 31),
  (20, 31),
  (21, 31),
  (22, 31);
