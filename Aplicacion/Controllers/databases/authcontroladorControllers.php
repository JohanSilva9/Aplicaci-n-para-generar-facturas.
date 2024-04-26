<?php

namespace App\controllers;

use App\controllers\databases\ConexionDBController;

class authcontroladorControllers extends ConexionDBController
{
    public function validarUsuario($usuario, $pwd)
    {
        $sql = "SELECT id FROM usuarios WHERE usuario = '$usuario' AND pwd = '$pwd'";
        
        $result = $this->execSQL($sql);

        if ($result->num_rows > 0) {
            return true;
        }

        return false;
    }
}
?>
