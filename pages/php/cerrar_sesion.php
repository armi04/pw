<?php
session_start();

// Destruir todas las variables de sesión
$_SESSION = array();

// Destruir la sesión actual
session_destroy();

// Redirigir a la página de inicio de sesión u otra página
header('Location: ../../index.html');
exit();
?>
