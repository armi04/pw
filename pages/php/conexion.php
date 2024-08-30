<?php
// Configuración de la conexión a la base de datos
$servername = "localhost"; // Cambiar si la base de datos está en un servidor remoto
$dbname = "BDsl";
$usernameDB = "MasterTeacher";
$passwordDB = "MasterTeacher";                    

try {
    // Se utiliza para establecer una conexión con la base de datos utilizando la extensión PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $usernameDB, $passwordDB);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    // echo "Error al conectar con la base de datos: " . $e->getMessage();
}
?>
