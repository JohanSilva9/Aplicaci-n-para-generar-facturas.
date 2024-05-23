<?php
namespace App\views;

use App\models\DetalleFactura;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de Factura - Tienda deportiva</title>
    <link rel="stylesheet" href="css/stylesDetalleFacturas.css">
</head>
<body>
    <div class="container">
        <h2>Detalle de Factura</h2>
        <div>
            <?php if(isset($detalleFactura)): ?>
                <h3>Número de referencia: <?php echo htmlspecialchars($detalleFactura->getReferenciaFactura()); ?></h3>
                <p>Cantidad: <?php echo htmlspecialchars($detalleFactura->getCantidad()); ?></p>
                <p>Precio Unitario: <?php echo htmlspecialchars($detalleFactura->getPrecioUnitario()); ?></p>
                <p>ID del Artículo: <?php echo htmlspecialchars($detalleFactura->getIdArticulo()); ?></p>
            <?php else: ?>
                <p>Detalle de factura no encontrado.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>


