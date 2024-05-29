<?php
use App\Controllers\ConexionDBController;
use App\Controllers\FacturaController;

require '../Controllers/ConexionDBControllers.php';
require '../Controllers/FacturaControllers.php';

$facturas = [];
$detalles = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conexion = new ConexionDBController();
    $facturaController = new FacturaController($conexion);
    $numeroDocumento = $_POST['numeroDocumento'];
    $tipoDocumento = $_POST['tipoDocumento'];

    $facturas = $facturaController->obtenerFacturasPorCliente($numeroDocumento, $tipoDocumento);
}

if (isset($_GET['referencia'])) {
    $conexion = new ConexionDBController();
    $facturaController = new FacturaController($conexion);
    $referencia = $_GET['referencia'];
    $detalles = $facturaController->obtenerDetallesFactura($referencia);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facturas Previas - Tienda deportiva</title>
    <link rel="stylesheet" href="css/stylesFacturasPrevias.css">
</head>
<body>
    <div class="container">
        <h1>Facturas Previas</h1>
        <form method="post" action="" class="form">
            <h2>Buscar Facturas</h2>
            <div class="form-group">
                <label for="tipoDocumento">Tipo de Documento:</label>
                <select id="tipoDocumento" name="tipoDocumento" required>
                    <option value="CC">Cédula de Ciudadanía</option>
                    <option value="TI">Tarjeta de Identidad</option>
                    <option value="CE">Cédula de Extranjería</option>
                </select>
            </div>
            <div class="form-group">
                <label for="numeroDocumento">Número de Documento:</label>
                <input type="text" id="numeroDocumento" name="numeroDocumento" required>
            </div>
            <input type="submit" value="Buscar" class="btn-buscar">
        </form>

        <?php if (!empty($facturas)): ?>
            <h2>Facturas Encontradas</h2>
            <table class="facturas-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre Completo</th>
                        <th>Tipo Documento</th>
                        <th>Número Documento</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Detalles</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($facturas as $factura): ?>
                        <tr>
                            <td><?= isset($factura['id']) ? $factura['id'] : '' ?></td>
                            <td><?= isset($factura['nombreCompleto']) ? $factura['nombreCompleto'] : '' ?></td>
                            <td><?= isset($factura['tipoDocumento']) ? $factura['tipoDocumento'] : '' ?></td>
                            <td><?= isset($factura['numeroDocumento']) ? $factura['numeroDocumento'] : '' ?></td>
                            <td><?= isset($factura['email']) ? $factura['email'] : '' ?></td>
                            <td><?= isset($factura['telefono']) ? $factura['telefono'] : '' ?></td>
                            <td><a href="detalleFacturaViews.php?referencia=<?= isset($factura['referencia']) ? $factura['referencia'] : '' ?>">Ver Detalles</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>

        <?php if (!empty($detalles)): ?>
            <h2>Detalles de la Factura</h2>
            <table class="detalles-table">
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
                            <td><?= isset($detalle['idArticulo']) ? $detalle['idArticulo'] : '' ?></td>
                            <td><?= isset($detalle['cantidad']) ? $detalle['cantidad'] : '' ?></td>
                            <td><?= isset($detalle['precioUnitario']) ? $detalle['precioUnitario'] : '' ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</body>
</html>
