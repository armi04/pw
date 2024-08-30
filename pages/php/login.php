<?php
session_start();

// Obtener los datos enviados desde el formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Incluir el archivo de conexión a la base de datos
    require_once 'conexion.php';

    // Verificar si se ha enviado la solicitud de "Ingresar"
    if (isset($_POST["Ingresar"])) {
        // Consultar la base de datos para verificar las credenciales
        $stmt = $conn->prepare("SELECT * FROM Usuario WHERE nombres = :username");
        $stmt->bindParam(":username", $username);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch();
            $contraAlmacenada = $user["password"];

            if ($user !== false && password_verify($password, $contraAlmacenada)) {
                // Las credenciales son válidas, se ha iniciado sesión correctamente
                // Ejecutar el procedimiento almacenado RegistrarLogin
                $stmtRegistrarLogin = $conn->prepare("CALL RegistrarLogin(:username, :password)");
                $stmtRegistrarLogin->bindParam(":username", $username);
                $stmtRegistrarLogin->bindParam(":password", $contraAlmacenada);
                $stmtRegistrarLogin->execute();

                // Si las credenciales son válidas, establecer una variable de sesión
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;

                // Redireccionar a la página deseada después del inicio de sesión
                header("Location: ../protected/index.php");
                exit;
            }
        }

        // Si se llega a este punto, las credenciales son inválidas
        echo "Nombre de usuario o contraseña incorrectos.";
    }
}
?>
