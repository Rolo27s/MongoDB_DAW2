<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Cliente</title>
</head>

<body>
    <h1>Agregar Cliente</h1>
    <form action="index.php?action=agregar_cliente" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre"><br>
        <label for="telefono">Teléfono:</label>
        <input type="number" id="telefono" name="telefono"><br>
        <button type="submit">Agregar Cliente</button>
    </form>
    <a href="index.php?action=listar_clientes">Volver</a>
</body>

</html>