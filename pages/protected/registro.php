<?php
include '../php/sesion.php';
include '../php/conexion.php';

$codigoAula = intval($_POST['codigo_aula']);
$salonClase = $_POST['salon_clase'];
$gradoAula = intval($_POST['grado_aula']);

// Haz que $codigoAula sea una variable global
$GLOBALS['codigoAula'] = $codigoAula;

// Obtener el nombre de usuario de la variable global
$nombreUsuario = $_SESSION['username'];

// Consulta para obtener el turno del alumno
$stmtTurno = $conn->prepare("SELECT a.turno FROM Alumno a INNER JOIN CursoDelAlumno cda ON a.id_alumno = cda.id_alumno WHERE cda.id_curso = :codigoAula LIMIT 1");
$stmtTurno->bindParam(":codigoAula", $codigoAula);
$stmtTurno->execute();
$turno = $stmtTurno->fetchColumn();

// Consulta para obtener el nombre y horario del curso
$stmtCurso = $conn->prepare("SELECT c.nombre, c.horario FROM Curso c WHERE c.id_curso = :codigoAula LIMIT 1");
$stmtCurso->bindParam(":codigoAula", $codigoAula);
$stmtCurso->execute();
$curso = $stmtCurso->fetch(PDO::FETCH_ASSOC);
$nombreCurso = $curso['nombre'];
$horario = $curso['horario'];

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
    <title>Menu</title>
  </head>

  <body>
    <!-- Parte de Información del aula -->
    <div class="wrapper">
      <div class="card">
        <img class="card-img" />
        <div class="link" data-text="Welcome">
          <span>Welcome</span>
        </div>

        <div class="card-body">
          <h1 class="card-title">Informacion de Aula</h1>
          <p class="card-info">Sección de clase: <span id="SALON_CLASE">A</span></p>
          <p class="card-info">Codigo de aula: <span id="CODIGO_AULA">U2134</span></p>
          <p class="card-info">Grado: <span id="GRADO_AULA">6to</span></p>
          <button class="card-btn" onclick="document.querySelector('#btnCurso').click();">Cambiar</button>
        </div>
      </div>

      <div class="swiper-button-prev" id="prev" onclick="Izquierda();"></div>
      <div class="swiper-button-next" id="next" onclick="Derecha();"></div>
    </div>

    
    <!-- Parte de Registro de notas -->
    <div class="container">
      <h1 class="registro">Registro de notas</h1>
      <div class="reg-wrapper">
        <div class="student-info">
          <h2>Estudiante</h2>
          <img
            src="https://th.bing.com/th/id/R.50f5bd8804632fc33de7156c7bb92e42?rik=K3C2XlyMAbJ4kQ&riu=http%3a%2f%2fl2t.mx%2fwp-content%2fuploads%2f2017%2f09%2fcoding.png&ehk=bYoFKN6Z7JPUjq3VVafv48lp2TqohJ2tlcTSGjSkwPc%3d&risl=&pid=ImgRaw&r=0"
            alt=""
          />
          <ul>
            <li>
              <h3>Turno:</h3>
              <span><?php echo $turno; ?></span>
            </li>
            <li>
              <h3>Curso:</h3>
              <span><?php echo $nombreCurso; ?></span>
            </li>
            <li>
              <h3>Horario:</h3>
              <span><?php echo $horario; ?></span>
            </li>
          </ul>
        </div>
        <div class="grade-info">
          <h3>Registro</h3>
            <form method="POST" action="secondPlane.php">
            <p class="c1">
              <label for="nombres">Nombres</label>
              <input type="text" name="nombres" id="nombres" required />
            </p>
            <p class="c2">
              <label for="apellidos">Apellido Paterno</label>
              <input type="text" name="apellidos" id="apellidos" required />
            </p>
            <p class="c3">
              <label for="apellidom">Apellido Materno</label>
              <input type="text" name="apellidom" id="apellidom" required />
            </p>
            <p class="c4">
              <label for="nota1">Nota 1</label>
              <input type="number" name="nota1" id="nota1" required />
            </p>
            <p class="c5">
              <label for="nota2">Nota 2</label>
              <input type="number" name="nota2" id="nota2" required />
            </p>
            <p class="c6">
              <label for="nota3">Nota 3</label>
              <input type="number" name="nota3" id="nota3" required />
            </p>        
            <input type="hidden" name="codigo_aula" id="codigo_aula" value="<?php echo $codigoAula; ?>">
            <p class="full">
              <button type="submit" name="registrar_notas">Registrar notas</button>
            </p>
          </form>
        </div>
      </div>
      <div class="container-img">
        <img src="./registro/wepik-export-20230626162331WkQt.webp" id="icon-fire">
      </div>
    </div>

    <!-- Footer -->
    <footer class="foot-er">
      <div class="foot-content">
        <div class="sec aboutus" id="ourmedia">
          <h2>Nuestras Redes</h2>
          <ul class="sci">
            <li>
              <a href="https://www.facebook.com/CN-SANTA-LUCIA-DE-FERREÑAFE-333705393400817/" id="l1"><i class="bx bxl-facebook"></i></a>
            </li>
            <li>
              <a href="https://twitter.com/MineduPeru/status/1663639040598462464" id="l2"><i class="bx bxl-twitter"></i></a>
            </li>
            <li>
              <a href="https://www.youtube.com/watch?v=NisuAvdcYCk" id="l3"><i class="bx bxl-youtube"></i></a>
            </li>
          </ul>
        </div>
        <div class="sec quicklinks" id="fast-access">
          <h2>Acceso Rápido</h2>
          <ul>
            <li><a id="botonAcerca">Acerca de</a></li>
            <li><a id="botonFaq">FAQ</a></li>
            <li><a id="botonHelp">Ayuda</a></li>
            <li><a href="https://goo.gl/maps/wMUvi3c3p9VmYsWM7">Ubicación</a></li>
          </ul>
        </div>
        <div class="sec quicklinks" id="devs">
          <h2>Developers</h2>
          <ul>
            <li><a id="botonTeam">Gabriel Paiva</a></li>
            <li><a id="botonTeam">Harbiz Diaz</a></li>
            <li><a id="botonTeam">David Miranda</a></li>
          </ul>
        </div>
        <div class="sec contact" id="contus">
          <h2>Contáctanos</h2>
          <ul class="infor">
            <li>
              <span><i class="bx bxs-map"></i></span>
              <span
                >Mariscal Caceres 551<br />Ferreñafe - Lambayeque<br />Perú</span
              >
            </li>
            <li>
              <span><i class="bx bxs-phone"></i></span>
              <p>
                <a href="https://wa.me/+51960541312">+51 960 541 312</a><br />
                <a href="https://wa.me/+51970541612">+51 970 541 612</a>
              </p>
            </li>
            <li>
              <span><i class="bx bxs-envelope"></i></span>
              <p>
                <a href="mailto:cnsantalucia@peru.com">cnsantalucia@peru.com</a>
              </p>
            </li>
          </ul>
        </div>
      </div>
      <div class="copyrightText">
        <p>© Todos los derechos reservados - Grupo Random</p>
      </div>
    </footer>
  </body>
</html>
