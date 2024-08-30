<?php

include 'sesion.php';

// Verificar si se ha enviado el formulario de actualización de nombre de usuario
if ($_SERVER["REQUEST_METHOD"] === "POST" ) {
  // Obtener el nuevo nombre de usuario desde el formulario
  $nuevoNombreUsuario = $_POST["Nombre"];

  // Incluir el archivo de conexión a la base de datos
  require_once 'conexion.php';

  // Obtener el nombre de usuario de la variable global
  $nombreUsuario = $_SESSION['username'];

  // Consultar el ID del usuario basado en el nombre de usuario
  $stmtObtenerIdUsuario = $conn->prepare("SELECT id_usuario FROM Usuario WHERE nombres = :nombreUsuario");
  $stmtObtenerIdUsuario->bindParam(":nombreUsuario", $nombreUsuario);
  $stmtObtenerIdUsuario->execute();

  // Verificar si se encontró el usuario
  if ($stmtObtenerIdUsuario->rowCount() > 0) {
    $filaUsuario = $stmtObtenerIdUsuario->fetch(PDO::FETCH_ASSOC);
    $idUsuario = $filaUsuario["id_usuario"];

    // Actualizar el nombre de usuario en la base de datos
    $stmtActualizarUsuario = $conn->prepare("UPDATE Usuario SET nombres = :nuevoNombreUsuario WHERE id_usuario = :idUsuario");
    $stmtActualizarUsuario->bindParam(":nuevoNombreUsuario", $nuevoNombreUsuario);
    $stmtActualizarUsuario->bindParam(":idUsuario", $idUsuario);
    $stmtActualizarUsuario->execute();

    // Actualizar el nombre de usuario en la variable global
    $_SESSION['username'] = $nuevoNombreUsuario;
  }

  // Cerrar la conexión a la base de datos
  $conn = null;
}

include 'cerrar_sesion.php';

?>
