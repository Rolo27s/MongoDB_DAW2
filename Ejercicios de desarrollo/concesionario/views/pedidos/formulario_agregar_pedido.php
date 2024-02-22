<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Pedido</title>
</head>

<body>
    <h1>Agregar Pedido</h1>
    <form action="index.php?action=agregar_pedido" method="POST">
        <label for="fecha">Fecha:</label>
        <input type="date" id="fecha" name="fecha" placeholder="YYYY-MM-DD"><br>
        <label for="detalles">Detalles:</label>
        <input type="text" id="detalles" name="detalles"><br>
        <button type="submit">Agregar Pedido</button>
    </form>
    <a href="index.php?action=listar_pedidos">Volver</a>
</body>

</html>