<?php 
include '../php/sesion.php';

include '../php/conexion.php';

// Obtener el nombre de usuario de la variable global
$nombreUsuario =  $_SESSION['username']; // Reemplaza "usuario" por la variable global que guarda el nombre de usuario

// Obtener el ID del profesor basado en el nombre de usuario
$sqlProfesor = "SELECT Maestro.nombres, Maestro.apellido_paterno, Maestro.apellido_materno FROM Maestro INNER JOIN Usuario ON Maestro.id_usuario = Usuario.id_usuario WHERE Usuario.nombres = '$nombreUsuario'";
$resultadoProfesore = $conn->query($sqlProfesor);

if ($resultadoProfesore->rowCount() > 0) {
  $filaProfesor = $resultadoProfesore->fetch(PDO::FETCH_ASSOC);
  $nombresProfesor = $filaProfesor["nombres"];
  $apellidoPaternoProfesor = $filaProfesor["apellido_paterno"];
  $apellidoMaternoProfesor = $filaProfesor["apellido_materno"];
  $nombreCompletoProfesor = $nombresProfesor . ' ' . $apellidoPaternoProfesor . ' ' . $apellidoMaternoProfesor;
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./index/style.css" />
    <link rel="stylesheet" href="./confi/conf.css" />
    <link rel="stylesheet" href="./cursos/Curstyle.css" />
    <link rel="stylesheet" href="./horario/hstyle.css" />
    <link rel="stylesheet" href="./Info/Istyle.css" />
    <link rel="stylesheet" href="./registro/Cstyle.css" />
    <link rel="stylesheet" href="./FAQ/faq.css" />
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />
    <link rel="shortcut icon" href="./index/Santa Lucia.png" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <title>Registro</title>
  </head>
  <body>
    <!-- Cabecera -->
    <div class="header">
      <div class="logo">
        <img src="./index/Santa Lucia.png" />
      </div>
      <nav class="menu">
        <div class="icon-head" id="icon-head-open">
          <i class="bx bx-help-circle"></i>
        </div>
        <div class="slide-text">
          <span>Somos</span>
          <div class="property">
            <ul>
              <li>valores</li>
              <li>compromiso</li>
              <li>excelencia</li>
            </ul>
          </div>
        </div>
      </nav>
    </div>

    <div class="overlay" id="overlay">
      <div class="overlay-content">
        <div class="popup faded displayed showed" id="popup">
          <div class="imagen-popup">
            <img src="./index/SVG.png" />
          </div>
          <div class="content-popup">
            <p class="saludo">¡Hola, Bienvenido al</p>
            <p class="saludo">Registro de notas!</p>
            <p class="info1">Conoce tu nueva página web.</p>
          </div>
          <div class="btn-popup-content">
            <button class="btn-siguiente-popup">Continuar</button>
            <button class="btn-cerrar-popup">Cerrar</button>
          </div>
        </div>
        <div class="popup faded" id="popup">
          <div class="content-popup">
            <i class="bx bxs-left-arrow"></i>
            <p>Aquí empieza la barra lateral</p>
            <p>actualiza tu foto y</p>
            <p>¡Comienza a divertirte!</p>
          </div>
          <div class="btn-popup-content">
            <button class="btn-siguiente-popup">Continuar</button>
            <button class="btn-cerrar-popup">Cerrar</button>
          </div>
        </div>
        <div class="popup faded" id="popup">
          <div class="content-popup">
            <i class="bx bxs-left-arrow"></i>
            <p>Elige el modo que desees,</p>
            <p>existen varias configuraciones,</p>
            <p>¡Asegúrate de probar todas!</p>
          </div>
          <div class="btn-popup-content">
            <button class="btn-siguiente-popup">Continuar</button>
            <button class="btn-cerrar-popup">Cerrar</button>
          </div>
        </div>
        <div class="popup faded" id="popup">
          <div class="content-popup">
            <i class="bx bxs-right-arrow"></i>
            <p>Si olvidas como funciona algo,</p>
            <p>¡Recuerda que siempre puedes</p>
            <p>pedir ayuda!</p>
          </div>
          <div class="btn-popup-content">
            <button class="btn-siguiente-popup">Finalizar</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Aqui se insertan todos los HTML's -->
    <div class="enrollador" id="enrollado"></div>

    <!-- Cuadrado para activar el sidebar -->
    <div class="open">
      <div class="burguer" id="btn">
        <span class="line1-bar"></span>
        <span class="line2-bar"></span>
        <span class="line3-bar"></span>
      </div>
    </div>

    <!-- Sidebar propiamente dicho -->
    <div class="sidebar">
      <div class="top">
        <div class="logo">
          <i class="bx bxs-school"></i>
          <span>Santa Lucia</span>
        </div>
      </div>
      <div class="user">
        <img src="./index/Imagen1-modified.png" class="user-image" />
        <div>
          <p class="bold"><?php echo $nombreCompletoProfesor; ?></p>
          <p>Profesor</p>
        </div>
      </div>
      <ul>
        <span class="selected"></span>
        <li>
          <a id="btnCurso">
            <!--BOTON PARA CURSOS-->
            <i class="bx bxs-home"></i>
            <span class="nav-item">Inicio</span>
          </a>
          <span class="tooltip">Inicio</span>
        </li>
        <li>
          <a id="btnCargar">
            <!--BOTON PARA REGISTRO-->
            <i class="bx bxs-book"></i>
            <span class="nav-item">Registro</span>
          </a>
          <span class="tooltip">Registro</span>
        </li>
        <li>
          <a id="btnInfo">
            <i class="bx bxs-contact"></i>
            <span class="nav-item">Información</span>
          </a>
          <span class="tooltip">Información</span>
        </li>
        <li>
          <a id="btnHor">
            <!--BOTON PARA HORARIO-->
            <i class="bx bxs-grid-alt"></i>
            <span class="nav-item">Horario</span>
          </a>
          <span class="tooltip">Horario</span>
        </li>
        <li>
          <a id="btnSetting">
            <i class="bx bxs-cog"></i>
            <span class="nav-item">Configuración</span>
          </a>
          <span class="tooltip">Ajustes</span>
        </li>
        <li id="last-one">
          <a href="../php/cerrar_sesion.php" id="btnSalir">
            <i
              class="fa-sharp fa-solid fa-right-from-bracket fa-rotate-180"
            ></i>
            <span class="nav-item">Salir</span>
          </a>
          <span class="tooltip">Salir</span>
        </li>
      </ul>
    </div>
  </body>
  <script src="./index/script.js"></script>
</html>
