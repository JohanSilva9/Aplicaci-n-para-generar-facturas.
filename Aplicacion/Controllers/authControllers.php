<?php

namespace App\controllers;

// Importa la clase ConexionDBController
use App\controllers\ConexionDBController;

class AuthController extends ConexionDBController
{
    public function login()
    {
        // Inicia la sesión si aún no se ha iniciado
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Verifica si se enviaron datos de usuario y contraseña
        if (isset($_POST['username'], $_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Filtra y escapa los datos del usuario para evitar inyección de SQL
            $username = $this->conex->real_escape_string($username);
            $password = $this->conex->real_escape_string($password);

            // Validar usuario y contraseña
            if ($this->validarUsuario($username, $password)) {
                // Iniciar sesión
                $_SESSION['username'] = $username;

                // Redireccionar a la página de facturasViews
                header("Location: MenuViews.php");
                exit();
            } else {
                header("Location: index.php");
                $error_message = "Usuario o contraseña incorrectos";
               
            }
        } else {
            // Datos de inicio de sesión no recibidos
            $error_message = "Por favor, ingrese su usuario y contraseña";
        }

        // Incluye la vista de inicio de sesión
        require_once('index.php');
    }

    private function validarUsuario($usuario, $pwd)
    {
        // Consulta SQL utilizando consultas preparadas para evitar la inyección de SQL
        $sql = "SELECT id FROM usuarios WHERE usuario = ? AND pwd = ?";
        $stmt = $this->conex->prepare($sql);
        $stmt->bind_param("ss", $usuario, $pwd);
        $stmt->execute();
        $result = $stmt->get_result();

        // Verifica si se encontró algún resultado
        return $result->num_rows > 0;
    }
}

?>
