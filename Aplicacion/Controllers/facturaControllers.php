<?php

namespace App\Controllers;

use App\Controllers\ConexionDBController;

class FacturaController extends ConexionDBController
{
    public function generarFactura($cliente, $productos)
    {
        $referencia = uniqid('REF');
        $total = 0;
        foreach ($productos as $producto) {
            $total += $producto['precio'] * $producto['cantidad'];
        }

        $descuento = 0;
        if ($total > 200000) {
            $descuento = 10;
        } elseif ($total > 100000) {
            $descuento = 5;
        }

        $sqlFactura = "INSERT INTO facturas (referencia, fecha, idCliente, estado, descuento) VALUES (?, NOW(), ?, 'Pagada', ?)";
        $stmtFactura = $this->getConnection()->prepare($sqlFactura);
        $stmtFactura->bind_param("sii", $referencia, $cliente['id'], $descuento);
        $stmtFactura->execute();
        $stmtFactura->close();

        $sqlDetalle = "INSERT INTO detalleFacturas (cantidad, precioUnitario, idArticulo, referenciaFactura) VALUES (?, ?, ?, ?)";
        $stmtDetalle = $this->getConnection()->prepare($sqlDetalle);

        foreach ($productos as $producto) {
            $stmtDetalle->bind_param("iids", $producto['cantidad'], $producto['precio'], $producto['id'], $referencia);
            $stmtDetalle->execute();
        }

        $stmtDetalle->close();

        return $referencia;
    }
}
?>
