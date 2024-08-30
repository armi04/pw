<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!empty($_POST["username"])) {
        $username = $_POST["username"];

        // Incluir el archivo de conexión a la base de datos
        require_once 'conexion.php';

        // Verificar si se ha enviado la solicitud de "Olvidé Contraseña"
        if (isset($_POST["OlvideContra"])) {

            // Aquí puedes realizar la lógica necesaria para generar el token y enviarlo al usuario
            $stmt = $conn->prepare("SELECT id_usuario FROM Usuario WHERE nombres = :username");
            $stmt->bindParam(":username", $username);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $user = $stmt->fetch();
                $idUsuario = $user["id_usuario"];

                // Generar el token como una cadena aleatoria
                $token = generateRandomString(32); // Genera una cadena aleatoria de longitud 32

                // Calcular la fecha de expiración del token (6 meses después de la emisión)
                $fechaEmision = date("Y-m-d H:i:s");
                $fechaExpiracion = date("Y-m-d H:i:s", strtotime("+6 months", strtotime($fechaEmision)));

                // Insertar el registro del token en la tabla Token
                $stmtGenerarToken = $conn->prepare("CALL GenerarToken(:nombres, :token, :fecha_emision, :fecha_expiracion)");
                $stmtGenerarToken->bindParam(":nombres", $username);
                $stmtGenerarToken->bindParam(":token", $token);
                $stmtGenerarToken->bindParam(":fecha_emision", $fechaEmision);
                $stmtGenerarToken->bindParam(":fecha_expiracion", $fechaExpiracion);
                $stmtGenerarToken->execute();

                // Redireccionar a la página deseada después del inicio de sesión
                echo "Su solicitud está siendo procesada. Para mayor información contactarse con el administrador de usuarios.";
            } else {
                echo "El nombre de usuario no existe.";
            }

            exit; // Terminar la ejecución del script después de manejar la solicitud de "Olvidé Contraseña"
        }
    }
}

function generateRandomString($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}
?>
