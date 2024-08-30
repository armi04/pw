<?php 
include '../php/sesion.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <link
      href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700;900&amp;display=swap"
      rel="stylesheet"
    />
    <title>cursos</title>
  </head>
  <body>
    <div class="formatcurso">
      <div class="titleen">
        <h3>Mis Aulas</h3>
      </div>
      <div class="accordion">

<?php

include '../php/conexion.php';

// Obtener el nombre de usuario de la variable global
$nombreUsuario = $_SESSION['username']; // Reemplaza "usuario" por la variable global que guarda el nombre de usuario

// Obtener el ID del profesor basado en el nombre de usuario
$sqlProfesor = "SELECT id_maestro FROM Maestro INNER JOIN Usuario ON Maestro.id_usuario = Usuario.id_usuario WHERE Usuario.nombres = '$nombreUsuario'";
$resultadoProfesor = $conn->query($sqlProfesor);

if ($resultadoProfesor->rowCount() > 0) {
  $filaProfesor = $resultadoProfesor->fetch(PDO::FETCH_ASSOC);
  $idProfesor = $filaProfesor["id_maestro"];

  // Obtener los cursos por grado del profesor
  $sqlCursos = "SELECT DISTINCT Curso.id_curso, Curso.nombre, Curso.horario, Curso.nivel, Alumno.seccion FROM Curso 
                INNER JOIN Maestro ON Curso.id_maestro = Maestro.id_maestro
                INNER JOIN Alumno ON Curso.nivel = Alumno.grado
                WHERE Maestro.id_maestro = $idProfesor";      

  // Generar el contenido para cada grado (1-5)
for ($grado = 1; $grado <= 5; $grado++) {
  $textoGrado = '';

  if ($grado == 1 || $grado == 3) {
    $textoGrado = 'er';
  } else if ($grado == 2) {
    $textoGrado = 'do';
  } else {
    $textoGrado = 'to';
  }

  echo '<div class="contentBx active">
          <div class="label active" id="sub' . $grado . '">
            <span>' . $grado . $textoGrado . ' Grado</span>
            <label class="container1">
              <div class="line"></div>
              <div class="line line-indicator"></div>
            </label>
          </div>
          <div class="contenT">';

  $resultadoCursos = $conn->query($sqlCursos);

  while ($filaCurso = $resultadoCursos->fetch(PDO::FETCH_ASSOC)) {
    $idCurso = $filaCurso["id_curso"];
    $nombreCurso = $filaCurso["nombre"];
    $horarioCurso = $filaCurso["horario"];
    $nivelCurso = $filaCurso["nivel"];
    $seccionCurso = $filaCurso["seccion"];

    if ($nivelCurso == $grado) {
      // Mostrar los datos del curso en el HTML
      echo '<div class="card-father">
              <div class="card-ofc">
                <div class="card-front" style="background-image: url(./cursos/mat' . $grado . '.webp)">
                  <div class="bg"></div>
                  <div class="body-card-front">
                    <h1>Sección ' . $seccionCurso . '</h1>
                  </div>
                </div>
                <div class="card-back">
                  <div class="body-card-back">
                    <h1>Curso: ' . $nombreCurso . '</h1>
                    <button id="btnIngreso" data-text="' . $idCurso . '" data-room="' . $seccionCurso . '" data-grade="' . $grado . $textoGrado . '">Ingresar</button>
                  </div>
                </div>
              </div>
            </div>';
    }
  }

  echo '</div>
    </div>';
}
  echo '</div>
  </div>
  <a id="back-to-top">
    <i class="fa-solid fa-chevron-up"></i>
  </a>
  </body>
  </html>';
}

$conn = null;
?>
