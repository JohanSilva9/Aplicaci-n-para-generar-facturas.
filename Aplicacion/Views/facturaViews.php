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
                    <input type="text" name="productos[0][id]" required>

                    <label for="cantidad">Cantidad:</label>
                    <input type="number" name="productos[0][cantidad]" required>

                    <label for="precio">Precio Unitario:</label>
                    <input type="number" step="0.01" name="productos[0][precio]" required>
                </div>
            </div>
            <button type="button" onclick="agregarProducto()" class="btn-agregar">Agregar Producto</button>
            <br><br>
            <input type="submit" value="Generar Factura" class="btn-generar">
        </form>
    </div>

    <script>
        let contador = 1;

        function agregarProducto() {
            const productosDiv = document.getElementById('productos');
            const nuevoProducto = document.createElement('div');
            nuevoProducto.classList.add('producto');

            nuevoProducto.innerHTML = `
                <label for="idArticulo">ID Artículo:</label>
                <input type="text" name="productos[${contador}][id]" required>

                <label for="cantidad">Cantidad:</label>
                <input type="number" name="productos[${contador}][cantidad]" required>

                <label for="precio">Precio Unitario:</label>
                <input type="number" step="0.01" name="productos[${contador}][precio]" required>
            `;

            productosDiv.appendChild(nuevoProducto);
            contador++;
        }
    </script>
</body>
</html>






