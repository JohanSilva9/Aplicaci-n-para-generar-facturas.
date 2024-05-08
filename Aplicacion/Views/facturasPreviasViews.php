<?php
namespace App\views;
?>

<!DOCTYPE html>
<html lang="es">
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
            <?php foreach ($facturas as $factura): ?>
                <tr>
                    <td><?php echo $factura['referencia']; ?></td>
                    <td><?php echo $factura['fecha']; ?></td>
                    <td><?php echo $factura['estado']; ?></td>
                    <td><a href="detalleFactura.php?referencia=<?php echo $factura['referencia']; ?>">Ver Detalle</a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>

