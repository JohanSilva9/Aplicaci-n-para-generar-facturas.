<?php

namespace App\controllers;

use App\controllers\databases\ConexionDBController;

class facturaControllers extends ConexionDBController
{
    public function generarFactura($cliente, $productos)
    {
        // Generar número de referencia
        $referencia = uniqid('REF');

        // Calcular descuento
        $total = 0;
        foreach ($productos as $producto) {
            $total += $producto['precio'] * $producto['cantidad'];
        }

        $descuento = '0';
        if ($total > 200000) {
            $descuento = '10';
        } elseif ($total > 100000) {
            $descuento = '5';
        }

        // Insertar datos en la tabla facturas
        $sql = "INSERT INTO facturas (referencia, fecha, idCliente, descuento) VALUES ('$referencia', NOW(), {$cliente['id']}, '$descuento')";
        $this->execSQL($sql);

        // Insertar detalles en la tabla detalleFacturas
        foreach ($productos as $producto) {
            $sqlDetalle = "INSERT INTO detalleFacturas (cantidad, precioUnitario, idArticulo, referenciaFactura) VALUES ({$producto['cantidad']}, {$producto['precio']}, {$producto['id']}, '$referencia')";
            $this->execSQL($sqlDetalle);
        }

        return $referencia;
    }
}
?>

