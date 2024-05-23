<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/stylesFacturasPrevias.css">
    <title>Facturas Previas</title>

</head>
<body>
    <h1>Facturas Previas</h1>
    <form method="post" action="detalleFacturaViews.php">
        <label for="numeroDocumento">Número de Documento:</label>
        <input type="text" id="numeroDocumento" name="numeroDocumento" required><br>

        <label for="tipoDocumento">Tipo de Documento:</label>
        <select id="tipoDocumento" name="tipoDocumento" required>
            <option value="CC">Cédula de Ciudadanía</option>
            <option value="TI">Tarjeta de Identidad</option>
            <option value="CE">Cédula de Extranjería</option>
        </select><br><br>

        <input type="submit" value="Buscar Facturas">
    </form>

    <?php if (isset($facturas)): ?>
        <h2>Facturas del Cliente</h2>
        <table>
            <thead>
                <tr>
                    <th>Referencia</th>
                    <th>Fecha</th>
                    <th>Estado</th>
                    <th>Descuento</th>
                    <th>Detalles</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($facturas as $factura): ?>
                    <tr>
                        <td><?php echo $factura['referencia']; ?></td>
                        <td><?php echo $factura['fecha']; ?></td>
                        <td><?php echo $factura['estado']; ?></td>
                        <td><?php echo $factura['descuento']; ?>%</td>
                        <td><a href="index.php?controller=FacturasPreviasController&action=verDetalles&referencia=<?php echo $factura['referencia']; ?>">Ver Detalles</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>

    <?php if (isset($detalles)): ?>
        <h2>Detalles de la Factura</h2>
        <table>
            <thead>
                <tr>
                    <th>ID Artículo</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($detalles as $detalle): ?>
                    <tr>
                        <td><?php echo $detalle['idArticulo']; ?></td>
                        <td><?php echo $detalle['cantidad']; ?></td>
                        <td><?php echo $detalle['precioUnitario']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>


