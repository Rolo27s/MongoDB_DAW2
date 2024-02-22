<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
</head>

<body>
    <h1>Editar Cliente</h1>
    <form action="index.php?action=editar_cliente" method="POST">
        <input type="hidden" name="id" value="<?= $cliente['_id'] ?>">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?= $cliente['nombre'] ?>"><br>
        <label for="telefono">Teléfono:</label>
        <input type="number" id="telefono" name="telefono" value="<?= $cliente['telefono'] ?>"><br>
        <button type="submit">Actualizar Cliente</button>
    </form>
    <a href="index.php?action=listar_clientes">Volver</a>
</body>

</html>