<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Vehiculo</title>
</head>

<body>
    <h1>Editar Vehiculo</h1>
    <form action="index.php?action=editar_vehiculo" method="POST">
        <input type="hidden" name="id" value="<?= $vehiculo['_id'] ?>">
        <label for="marca">Marca:</label>
        <input type="text" id="marca" name="marca" value="<?= $vehiculo['marca'] ?>"><br>
        <label for="modelo">Modelo:</label>
        <input type="text" id="modelo" name="modelo" value="<?= $vehiculo['modelo'] ?>"><br>
        <button type="submit">Actualizar Vehiculo</button>
    </form>
    <a href="index.php?action=listar_vehiculos">Volver</a>
</body>

</html>