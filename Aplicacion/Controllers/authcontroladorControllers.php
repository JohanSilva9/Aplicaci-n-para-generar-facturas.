<?php

namespace App\controllers;

use App\controllers\ConexionDBController;

class AuthController extends ConexionDBController
{
    public function login()
    {
        session_start();

        // Verificar si se enviaron datos de usuario y contraseña
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Validar usuario y contraseña
            if ($this->validarUsuario($username, $password)) {
                // Iniciar sesión
                $_SESSION['username'] = $username;

                // Redireccionar a la página de facturasViews
                header("Location: facturasViews.php");
                exit();
            } else {
                // Error de inicio de sesión: usuario o contraseña incorrectos
                $error_message = "Usuario o contraseña incorrectos";
                require_once('inicioViews.php');
            }
        } else {
            // Datos de inicio de sesión no recibidos
            $error_message = "Por favor, ingrese su usuario y contraseña";
            require_once('inicioViews.php');
        }
    }

    private function validarUsuario($usuario, $pwd)
    {
        $sql = "SELECT id FROM usuarios WHERE usuario = '$usuario' AND pwd = '$pwd'";
        $result = $this->execSQL($sql);

        return $result->num_rows > 0;
    }
}

?>




