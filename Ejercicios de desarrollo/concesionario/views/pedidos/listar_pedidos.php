<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Pedidos</title>
</head>

<body>
    <h1>Lista de Pedidos</h1>
    <ul>
        <?php foreach ($pedidos as $pedido) : ?>
            <li>
                <a href="index.php?action=ver_pedido&id=<?= $pedido['_id'] ?>">
                    <?= $pedido['fecha'] ?> - <?= $pedido['detalles'] ?>
                </a>
                | <a href="index.php?action=editar_pedido&id=<?= $pedido['_id'] ?>">Editar</a>
                | <a href="index.php?action=eliminar_pedido&id=<?= $pedido['_id'] ?>" onclick="return confirm('¿Estás seguro de que deseas eliminar este pedido?')">Eliminar</a>
            </li>
        <?php endforeach; ?>
    </ul>
    <a href="index.php?action=agregar_pedido">Agregar Pedido</a>
    <br />
    <a href="index.php">Volver al menu principal</a>
</body>

</html>