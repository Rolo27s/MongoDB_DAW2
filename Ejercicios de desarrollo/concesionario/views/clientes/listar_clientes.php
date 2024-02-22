<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes</title>
</head>

<body>
    <h1>Lista de Clientes</h1>
    <ul>
        <?php foreach ($clientes as $cliente) : ?>
            <li>
                <a href="index.php?action=ver_cliente&id=<?= $cliente['_id'] ?>">
                    <?= $cliente['nombre'] ?> - <?= $cliente['telefono'] ?>
                </a>
                | <a href="index.php?action=editar_cliente&id=<?= $cliente['_id'] ?>">Editar</a>
                | <a href="index.php?action=eliminar_cliente&id=<?= $cliente['_id'] ?>" onclick="return confirm('¿Estás seguro de que deseas eliminar este cliente?')">Eliminar</a>
            </li>
        <?php endforeach; ?>
    </ul>
    <a href="index.php?action=agregar_cliente">Agregar Cliente</a>
    <br />
    <a href="index.php">Volver al menu principal</a>
</body>

</html>