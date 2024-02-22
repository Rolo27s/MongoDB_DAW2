<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Cliente</title>
</head>

<body>
    <h1>Detalles del Cliente</h1>
    <p>ID: <?= $cliente['_id'] ?></p>
    <p>Nombre: <?= $cliente['nombre'] ?></p>
    <p>Teléfono: <?= $cliente['telefono'] ?></p>
    <a href="index.php?action=listar_clientes">Volver</a>
</body>

</html>