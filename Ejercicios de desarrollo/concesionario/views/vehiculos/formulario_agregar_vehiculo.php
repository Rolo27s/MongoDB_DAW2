<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Vehiculo</title>
</head>

<body>
    <h1>Agregar Vehiculo</h1>
    <form action="index.php?action=agregar_vehiculo" method="POST">
        <label for="marca">Marca:</label>
        <input type="text" id="marca" name="marca"><br>
        <label for="modelo">Modelo:</label>
        <input type="text" id="modelo" name="modelo"><br>
        <button type="submit">Agregar Vehiculo</button>
    </form>
    <a href="index.php?action=listar_vehiculos">Volver</a>
</body>

</html>