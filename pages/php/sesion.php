<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
   // Si no se cumple la condición de sesión iniciada, redirecciona a la página de inicio de sesión o muestra un mensaje de error.
   header('Location: ../login.html');
   exit;
}
?>
