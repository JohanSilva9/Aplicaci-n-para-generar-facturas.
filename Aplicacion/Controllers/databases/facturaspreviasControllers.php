<?php

namespace App\controllers;

use App\controllers\databases\ConexionDBController;

class FacturasPreviasController extends ConexionDBController
{
    public function consultarFacturas()
    {
        $sql = "SELECT * FROM facturas";
        $result = $this->conex->query($sql);
        
        if ($result) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            // Manejar el error en la consulta SQL
            return false;
        }
    }

    public function cambiarEstadoFactura($referencia, $estado)
    {
        $sql = "UPDATE facturas SET estado=? WHERE referencia=?";
        $stmt = $this->conex->prepare($sql);
        
        if ($stmt) {
            $stmt->bind_param('ss', $estado, $referencia);
            $stmt->execute();
            $stmt->close();
            return true;
        } else {
            // Manejar el error en la preparación de la consulta
            return false;
        }
    }
}
?>


