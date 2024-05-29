<?php

use App\controllers\ConexionDBController;
use App\controllers\AuthController;


require '../Controllers/conexionDBControllers.php';
require '../Controllers/authControllers.php';

$conexionDB = new ConexionDBController();

// Instanciar el controlador de autenticación de usuario
$authController = new authController($conexionDB);

// Verificar si se han enviado datos por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Llamar al método de inicio de sesión del controlador de autenticación
    $authController->login();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión - Tienda deportiva</title>
    <link rel="stylesheet" href="css/stylesInicio.css"> 
</head>
<body>

    <div class="container">
        <h2>Iniciar sesión</h2>
        <form action=" " method="POST"> 
            <div class="form-group">
                <label for="username">Usuario:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
                
            </div>
            <?php if (isset($error_message)): ?>
                <p class="error"><?php echo $error_message; ?></p>
            <?php endif; ?>
            <button type="submit">Iniciar sesión</button>
        </form>
    </div>
  
</body>
</html>










