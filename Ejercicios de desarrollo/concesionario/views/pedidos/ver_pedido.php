<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Pedido</title>
</head>

<body>
    <h1>Detalles del Pedido</h1>
    <p>ID: <?= $pedido['_id'] ?></p>
    <p>Fecha: <?= $pedido['fecha'] ?></p>
    <p>Detalles: <?= $pedido['detalles'] ?></p>
    <a href="index.php?action=listar_pedidos">Volver</a>
</body>

</html>