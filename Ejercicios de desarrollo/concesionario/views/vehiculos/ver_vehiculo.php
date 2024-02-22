<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Vehiculo</title>
</head>

<body>
    <h1>Detalles del Vehiculo</h1>
    <p>ID: <?= $vehiculo['_id'] ?></p>
    <p>Marca: <?= $vehiculo['marca'] ?></p>
    <p>Modelo: <?= $vehiculo['modelo'] ?></p>
    <a href="index.php?action=listar_vehiculos">Volver</a>
</body>

</html>