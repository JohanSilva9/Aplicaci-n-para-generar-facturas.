<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Generar Factura</title>
</head>
<body>
    <h1>Generar Factura</h1>
    <form method="post" action="facturasPreviasViews.php">
        <h2>Información del Cliente</h2>
        <label for="nombreCompleto">Nombre Completo:</label>
        <input type="text" id="nombreCompleto" name="nombreCompleto" required><br>

        <label for="tipoDocumento">Tipo de Documento:</label>
        <select id="tipoDocumento" name="tipoDocumento" required>
            <option value="CC">Cédula de Ciudadanía</option>
            <option value="TI">Tarjeta de Identidad</option>
            <option value="CE">Cédula de Extranjería</option>
        </select><br>

        <label for="numeroDocumento">Número de Documento:</label>
        <input type="text" id="numeroDocumento" name="numeroDocumento" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" required><br>

        <h2>Productos</h2>
        <div id="productos">
            <div class="producto">
                <label for="idArticulo">ID Artículo:</label>
                <input type="text" name="productos[0][id]" required><br>

                <label for="cantidad">Cantidad:</label>
                <input type="number" name="productos[0][cantidad]" required><br>

                <label for="precio">Precio Unitario:</label>
                <input type="number" step="0.01" name="productos[0][precio]" required><br>
            </div>
        </div>
        <button type="button" onclick="agregarProducto()">Agregar Producto</button><br><br>

        <input type="submit" value="Generar Factura">
    </form>

    <script>
        let contador = 1;

        function agregarProducto() {
            const productosDiv = document.getElementById('productos');
            const nuevoProducto = document.createElement('div');
            nuevoProducto.classList.add('producto');

            nuevoProducto.innerHTML = `
                <label for="idArticulo">ID Artículo:</label>
                <input type="text" name="productos[${contador}][id]" required><br>

                <label for="cantidad">Cantidad:</label>
                <input type="number" name="productos[${contador}][cantidad]" required><br>

                <label for="precio">Precio Unitario:</label>
                <input type="number" step="0.01" name="productos[${contador}][precio]" required><br>
            `;

            productosDiv.appendChild(nuevoProducto);
            contador++;
        }
    </script>
</body>
</html>





