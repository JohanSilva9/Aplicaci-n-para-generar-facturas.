<?php

namespace App\controllers;

use App\controllers\databases\ConexionDBController;

class facturaspreviasControllers extends ConexionDBController
{
    public function consultarFacturas()
    {
        $sql = "SELECT * FROM facturas";
        
        return $this->execSQL($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function cambiarEstadoFactura($referencia, $estado)
    {
        $sql = "UPDATE facturas SET estado='$estado' WHERE referencia='$referencia'";
        
        return $this->execSQL($sql);
    }
}
?>


