<?php

namespace App\controllers;

use App\controllers\databases\ConexionDBController;

class clienteController extends ConexionDBController
{
    public function registrarCliente($nombreCompleto, $tipoDocumento, $numeroDocumento, $email, $telefono)
    {
        $sql = "INSERT INTO clientes (nombreCompleto, tipoDocumento, numeroDocumento, email, telefono) VALUES ('$nombreCompleto', '$tipoDocumento', '$numeroDocumento', '$email', '$telefono')";
        
        return $this->execSQL($sql);
    }

    public function actualizarCliente($id, $nombreCompleto, $tipoDocumento, $numeroDocumento, $email, $telefono)
    {
        $sql = "UPDATE clientes SET nombreCompleto='$nombreCompleto', tipoDocumento='$tipoDocumento', numeroDocumento='$numeroDocumento', email='$email', telefono='$telefono' WHERE id=$id";
        
        return $this->execSQL($sql);
    }
}
?>

