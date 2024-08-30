<?php

include 'sesion.php';

// Verificar si se ha enviado el formulario de actualización de nombre de usuario
if ($_SERVER["REQUEST_METHOD"] === "POST" ) {
  // Obtener el nuevo nombre de usuario desde el formulario
  $passwd_actual = $_POST["passwd_actual"];
  $passwd_new = $_POST["passwd_new"];
  $passwd_new_ver = $_POST["passwd_new_ver"];

  // Incluir el archivo de conexión a la base de datos
  require_once 'conexion.php';

  // Obtener el nombre de usuario de la variable global
  $nombreUsuario = $_SESSION['username'];

  // Verificar si la contraseña actual es correcta;
  // Consultar la base de datos para verificar las credenciales
  $stmt = $conn->prepare("SELECT * FROM Usuario WHERE nombres = :username");
  $stmt->bindParam(":username", $nombreUsuario);
  $stmt->execute();

  if ($stmt->rowCount() > 0) {
      $user = $stmt->fetch();
      $contraAlmacenada = $user["password"];

      if ($user !== false && password_verify($passwd_actual, $contraAlmacenada)) {

        // Verificar si se encontró el usuario
        if ($passwd_new == $passwd_new_ver) {

            // Obtener la contraseña normal ingresada por el usuario
            $contrasenaNormal = $passwd_new_ver;

            // Generar el hash de la contraseña utilizando password_hash
            $contrasenaHash = password_hash($contrasenaNormal, PASSWORD_DEFAULT);

            // Llamar al procedimiento almacenado para actualizar las notas
            $stmtActualizarNotas = $conn->prepare("CALL ActualizarContrasena(:nombres, :nueva_contrasena)");
            $stmtActualizarNotas->bindParam(":nombres", $nombreUsuario);
            $stmtActualizarNotas->bindParam(":nueva_contrasena", $contrasenaHash);
            $stmtActualizarNotas->execute();

            include 'cerrar_sesion.php';
        }

      }
  }
}

// Redireccionar a la página principal si ingresó algo incorrecto.
header("Location: ../protected/index.php");
exit;

?>
