<?php
use App\Controllers\ConexionDBController;
use App\Controllers\FacturaController;

require '../Controllers/ConexionDBControllers.php';
require '../Controllers/FacturaControllers.php';

$facturas = null;
$detalles = null;

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
    $detalles = $facturaController->obtenerDetallesFactura($_GET['referencia']);
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

        <?php if ($facturas): ?>
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
                            <td><?= $factura['id'] ?></td>
                            <td><?= $factura['nombreCompleto'] ?></td>
                            <td><?= $factura['tipoDocumento'] ?></td>
                            <td><?= $factura['numeroDocumento'] ?></td>
                            <td><?= $factura['email'] ?></td>
                            <td><?= $factura['telefono'] ?></td>
                            <td><a href="?referencia=<?= $factura['id'] ?>">Ver Detalles</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>

        <?php if ($detalles): ?>
            <h2>Detalles de la Factura</h2>
            <table class="detalles-table">
                <thead>
                    <tr>
                        <th>ID Artículo</th>
                        <th>Nombre Artículo</th>
                        <th>Cantidad</th>
                        <th>Precio Unitario</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($detalle as $detalle): ?>
                        <tr>
                            <td><?= $detalle['idArticulo'] ?></td>
                            <td><?= $detalle['nombreArticulo'] ?></td>
                            <td><?= $detalle['cantidad'] ?></td>
                            <td><?= $detalle['precioUnitario'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</body>
</html>
