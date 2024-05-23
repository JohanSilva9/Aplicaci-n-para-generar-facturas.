<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facturas Previas - Tienda deportiva</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Facturas Previas</h2>
        <table>
            <tr>
                <th>Referencia</th>
                <th>Fecha</th>
                <th>Estado</th>
                <th>Acción</th>
            </tr>
            <?php
            // Verificar si $datos está definido y es un array válido
            if (isset($datos) && is_array($datos)) {
                foreach ($datos as $factura) {
            ?>
                    <tr>
                        <td><?php echo $factura['referencia']; ?></td>
                        <td><?php echo $factura['fecha']; ?></td>
                        <td><?php echo $factura['estado']; ?></td>
                        <td><a href="detalleFactura.php?referencia=<?php echo $factura['referencia']; ?>">Ver Detalle</a></td>
                    </tr>
            <?php
                }
            } else {
                echo "<tr><td colspan='4'>No hay facturas disponibles.</td></tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
