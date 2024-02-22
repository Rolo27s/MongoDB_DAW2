<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Pedido</title>
</head>

<body>
    <h1>Editar Pedido</h1>
    <form action="index.php?action=editar_pedido" method="POST">
        <input type="hidden" name="id" value="<?= $pedido['_id'] ?>">
        <label for="fecha">Fecha:</label>
        <input type="date" id="fecha" name="fecha" value="<?= $pedido['fecha'] ?> " placeholder="YYYY-MM-DD"><br>
        <label for="detalles">Detalles:</label>
        <input type="text" id="detalles" name="detalles" value="<?= $pedido['detalles'] ?>"><br>
        <button type="submit">Actualizar Pedido</button>
    </form>
    <a href="index.php?action=listar_pedidos">Volver</a>
</body>

</html>