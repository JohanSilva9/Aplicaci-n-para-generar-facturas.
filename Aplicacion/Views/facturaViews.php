<?php
use App\controllers\ConexionDBController;
use App\controllers\articuloController;

require '../Controllers/conexionDBControllers.php';
require '../Controllers/articuloControllers.php';

$conexion = new ConexionDBController();
$articuloController = new articuloController($conexion);

$idArticulo = 1; 
$articulo = $articuloController->obtenerArticulo($idArticulo);
$articulos = $articuloController->obtenerArticulos();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generar Factura - Tienda deportiva</title>
    <link rel="stylesheet" href="css/stylesFactura.css">
</head>
<body>
    <div class="container">
        <h1>Generar Factura</h1>
        <form method="post" action="facturasPreviasViews.php" class="form">
            <h2>Información del Cliente</h2>
            <div class="form-group">
                <label for="nombreCompleto">Nombre Completo:</label>
                <input type="text" id="nombreCompleto" name="nombreCompleto" required>
            </div>

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

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="text" id="telefono" name="telefono" required>
            </div>

            <h2>Productos</h2>
            <div id="productos" class="productos">
                <div class="producto">
                    <label for="idArticulo">ID Artículo:</label>
                    <select id="articulo1" name="articulos" onchange="updatePrice(this)" required>
                        <option value="">Seleccione un artículo</option>
                        <?php foreach($articulos as $item): ?>
                            <option value="<?= $item->getPrecio() ?>"><?= $item->getNombre() ?></option>
                        <?php endforeach; ?>
                    </select>

                    <label for="cantidad"><br><br>Cantidad:</label>
                    <input type="number" name="productos[1][cantidad]" required>

                    <label for="precio">Precio Unitario:</label>
                    <label id="precioUnitario1">Seleccione un artículo</label>
                </div>
            </div>
            <button type="button" onclick="agregarProducto()" class="btn-agregar">Agregar Producto</button>
            <br><br>
            <input type="submit" value="Generar Factura" class="btn-generar">
        </form>
    </div>

    <script>
        let contador = 2; // Iniciamos el contador desde 2 para el primer producto agregado

        function agregarProducto() {
            const productosDiv = document.getElementById('productos');
            const nuevoProducto = document.createElement('div');
            nuevoProducto.classList.add('producto');

            nuevoProducto.innerHTML = `
                <label for="idArticulo">ID Artículo:</label>
                <select id="articulo${contador}" name="articulos" onchange="updatePrice(this)" required>
                    <option value="">Seleccione un artículo</option>
                    <?php foreach($articulos as $item): ?>
                        <option value="<?= $item->getPrecio() ?>"><?= $item->getNombre() ?></option>
                    <?php endforeach; ?>
                </select>

                <label for="cantidad"><br><br>Cantidad:</label>
                <input type="number" name="productos[${contador}][cantidad]" required>

                <label for="precio">Precio Unitario:</label>
                <label id="precioUnitario${contador}">Seleccione un artículo</label>
            `;

            productosDiv.appendChild(nuevoProducto);
            contador++;
        }

        function updatePrice(select) {
            const selectedOption = select.options[select.selectedIndex];
            const precio = selectedOption.value;
            const productoId = select.id.slice(-1); // Obtenemos el ID del producto
            document.getElementById('precioUnitario' + productoId).textContent = 'Precio Unitario: ' + precio;
        }
    </script>
</body>
</html>





