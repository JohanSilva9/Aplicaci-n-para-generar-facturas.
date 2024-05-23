<?php
namespace App\views;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de Factura - Tienda deportiva</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Detalle de Factura</h2>
        <div>
            <h3>Número de referencia: <?php echo $factura['referencia']; ?></h3>
            <p>Fecha de la compra: <?php echo $factura['fecha']; ?></p>
            <p>Estado: <?php echo $factura['estado']; ?></p>
            <h4>Información del Cliente</h4>
            <p>Nombre: <?php echo $cliente['nombreCompleto']; ?></p>
            <p>Tipo de documento: <?php echo $cliente['tipoDocumento']; ?></p>
            <p>Número de documento: <?php echo $cliente['numeroDocumento']; ?></p>
            <p>Teléfono: <?php echo $cliente['telefono']; ?></p>
            <p>Email: <?php echo $cliente['email']; ?></p>
            <h4>Productos</h4>
            <table>
                <tr>
                    <th>Nombre del Producto</th>
                    <th>Precio Unitario</th>
                    <th>Cantidad</th>
                    <th>Valor Total</th>
                </tr>
                <?php foreach ($productos as $producto): ?>
                    <tr>
                        <td><?php echo $producto['nombre']; ?></td>
                        <td><?php echo $producto['precio']; ?></td>
                        <td><?php echo $producto['cantidad']; ?></td>
                        <td><?php echo $producto['precio'] * $producto['cantidad']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <p>Descuento: <?php echo $factura['descuento']; ?>%</p>
            <p>Total a pagar: <?php echo $totalAPagar; ?></p>
        </div>
    </div>
</body>
</html>

