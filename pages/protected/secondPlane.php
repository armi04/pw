<?php 
include '../php/sesion.php';
include '../php/conexion.php';

// Verificar si se ha enviado el formulario de registro de notas
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["registrar_notas"])) {
    $nombres = $_POST["nombres"];
    $apellidoPaterno = $_POST["apellidos"];
    $apellidoMaterno = $_POST["apellidom"];
    $nota1 = $_POST["nota1"];
    $nota2 = $_POST["nota2"];
    $nota3 = $_POST["nota3"];
    $codigoAula = $_POST['codigo_aula'];
  
    // Consulta para obtener el ID del alumno
    $stmtIdAlumno = $conn->prepare("SELECT id_alumno FROM Alumno WHERE nombre = :nombres AND apellido_paterno = :apellidoPaterno AND apellido_materno = :apellidoMaterno LIMIT 1");
    $stmtIdAlumno->bindParam(":nombres", $nombres);
    $stmtIdAlumno->bindParam(":apellidoPaterno", $apellidoPaterno);
    $stmtIdAlumno->bindParam(":apellidoMaterno", $apellidoMaterno);
    $stmtIdAlumno->execute();
    $idAlumno = $stmtIdAlumno->fetchColumn();    

    // Llamar al procedimiento almacenado para actualizar las notas
    $stmtActualizarNotas = $conn->prepare("CALL ActualizarNotas(:nombres, :apellidoPaterno, :apellidoMaterno, :nota1, :nota2, :nota3, :idCurso, :idAlumno)");
    $stmtActualizarNotas->bindParam(":nombres", $nombres);
    $stmtActualizarNotas->bindParam(":apellidoPaterno", $apellidoPaterno);
    $stmtActualizarNotas->bindParam(":apellidoMaterno", $apellidoMaterno);
    $stmtActualizarNotas->bindParam(":nota1", $nota1);
    $stmtActualizarNotas->bindParam(":nota2", $nota2);
    $stmtActualizarNotas->bindParam(":nota3", $nota3);
    $stmtActualizarNotas->bindParam(":idCurso", $codigoAula);
    $stmtActualizarNotas->bindParam(":idAlumno", $idAlumno);
    $stmtActualizarNotas->execute();
    
    // Obtener el mensaje del procedimiento almacenado
    // Se debería abrir una ventana luego de presionar el botón "Registrar notas".
    $mensaje = $stmtActualizarNotas->fetch(PDO::FETCH_ASSOC)["mensaje"];

    // Redirigir a la página de inicio de sesión u otra página
    header('Location: ./index.php');
  }
  ?>