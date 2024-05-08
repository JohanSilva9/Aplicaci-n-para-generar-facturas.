<?php
// Este archivo será el punto de entrada para redirigir a las diferentes vistas según la lógica de la aplicación.
session_start();

// Si el usuario está autenticado, redirigir a la página de generación de factura, de lo contrario, redirigir al formulario de inicio de sesión
if (isset($_SESSION['usuario'])) {
    header("Location: facturaViews.php");
} else {
    header("Location: inicioViews.php");
}
exit();
?>


