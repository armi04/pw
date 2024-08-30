<?php
include '../php/sesion.php';
include '../php/conexion.php';

// Obtener el nombre de usuario de la variable global
$nombreUsuario =  $_SESSION['username']; // Reemplaza "usuario" por la variable global que guarda el nombre de usuario

// Obtener el ID del profesor basado en el nombre de usuario
$sqlProfesor = "SELECT id_maestro FROM Maestro INNER JOIN Usuario ON Maestro.id_usuario = Usuario.id_usuario WHERE Usuario.nombres = '$nombreUsuario'";
$resultadoProfesore = $conn->query($sqlProfesor);

if ($resultadoProfesore->rowCount() > 0) {
  $filaProfesor = $resultadoProfesore->fetch(PDO::FETCH_ASSOC);
  $idProfesor = $filaProfesor["id_maestro"];
}

// Obtener los datos del profesor de la base de datos
$sqlProfesor = "SELECT Maestro.nombres, Maestro.apellido_paterno, Maestro.apellido_materno FROM Maestro INNER JOIN Usuario ON Maestro.id_usuario = Usuario.id_usuario WHERE Maestro.id_maestro = $idProfesor";
$resultadoProfesor = $conn->query($sqlProfesor);

// Obtener el número de aulas (cursos) del profesor
$sqlNumAulas = "SELECT COUNT(*) AS num_aulas FROM Curso WHERE id_maestro = $idProfesor";
$resultadoNumAulas = $conn->query($sqlNumAulas);

// Obtener el número de alumnos del profesor
$sqlNumAlumnos = "SELECT COUNT(DISTINCT CursoDelAlumno.id_alumno) AS num_alumnos FROM CursoDelAlumno INNER JOIN Curso ON CursoDelAlumno.id_curso = Curso.id_curso WHERE Curso.id_maestro = $idProfesor";
$resultadoNumAlumnos = $conn->query($sqlNumAlumnos);

if ($resultadoProfesor->rowCount() > 0 && $resultadoNumAulas->rowCount() > 0 && $resultadoNumAlumnos->rowCount() > 0) {
  $filaProfesor = $resultadoProfesor->fetch(PDO::FETCH_ASSOC);
  $nombresProfesor = $filaProfesor["nombres"];
  $apellidoPaternoProfesor = $filaProfesor["apellido_paterno"];
  $apellidoMaternoProfesor = $filaProfesor["apellido_materno"];
  $nombreCompletoProfesor = $nombresProfesor . ' ' . $apellidoPaternoProfesor . ' ' . $apellidoMaternoProfesor;

  $filaNumAulas = $resultadoNumAulas->fetch(PDO::FETCH_ASSOC);
  $numAulas = $filaNumAulas["num_aulas"];

  $filaNumAlumnos = $resultadoNumAlumnos->fetch(PDO::FETCH_ASSOC);
  $numAlumnos = $filaNumAlumnos["num_alumnos"];
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <title>Info</title>
  </head>
  <body>
    <div class="contenedor-card">
      <div class="card1">
        <div class="card1-image">
          <img src="./Info/head.jpg" />
        </div>
        <div class="card1-body">
          <div class="content">
            <h2><?php echo $nombreCompletoProfesor; ?><br /><span>Profesor</span></h2>
            <div class="info">
              <h3><?php echo $numAulas; ?><br /><span>Aulas</span></h3>
              <h3><?php echo $numAlumnos; ?><br /><span>Alumnos</span></h3>
              <h3><?php echo $numAulas*2; ?><br /><span>Horas</span></h3>          
            </div>
            <div class="btn-content">
              <button class="btn-pas" >
                <div>
                  <span>
                    <p>Contraseña</p>
                  </span>
                </div>
                <div>
                  <span>
                    <i class='bx bxs-lock-open' style='color:#ffffff' ></i>
                  </span>
                </div>
              </button>
              <button class="btn-edit" onclick="document.querySelector('#btnSetting').click();">
                Editar
                <svg class="svg" viewBox="0 0 512 512">
                  <path
                    d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"
                  ></path>
                </svg>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>