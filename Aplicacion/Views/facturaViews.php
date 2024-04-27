<?php
session_start();
require_once 'facturaControllers.php';
require_once 'clienteController.php';

// Verificar si el usuario está autenticado, de lo contrario, redirigir al formulario de inicio de sesión
if (!isset($_SESSION['usuario'])) {
    header("Location: inicioViews.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generar factura - Tienda deportiva</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Generar factura</h2>
        <form action="procesar_factura.php" method="POST">
            <div class="form-group">
                <label for="nombre">Nombre completo:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="tipo_documento">Tipo de documento:</label>
                <select id="tipo_documento" name="tipo_documento" required>
                    <option value="CC">Cédula de ciudadanía</option>
                    <option value="CE">Cédula de extranjería</option>
                    <option value="NIT">NIT</option>
                    <!-- Agrega más opciones según tu necesidad -->
                </select>
            </div>
            <div class="form-group">
                <label for="numero_documento">Número de documento:</label>
                <input type="text" id="numero_documento" name="numero_documento" required>
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="text" id="telefono" name="telefono" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <!-- Aquí puedes agregar la parte del formulario para seleccionar productos -->
            <button type="submit">Generar factura</button>
        </form>
    </div>
</body>
</html>

