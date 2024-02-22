<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Vehiculos</title>
</head>

<body>
    <h1>Lista de Vehiculos</h1>
    <ul>
        <?php foreach ($vehiculos as $vehiculo) : ?>
            <li>
                <a href="index.php?action=ver_vehiculo&id=<?= $vehiculo['_id'] ?>">
                    <?= $vehiculo['marca'] ?> - <?= $vehiculo['modelo'] ?>
                </a>
                | <a href="index.php?action=editar_vehiculo&id=<?= $vehiculo['_id'] ?>">Editar</a>
                | <a href="index.php?action=eliminar_vehiculo&id=<?= $vehiculo['_id'] ?>" onclick="return confirm('¿Estás seguro de que deseas eliminar este vehiculo?')">Eliminar</a>
            </li>
        <?php endforeach; ?>
    </ul>
    <a href="index.php?action=agregar_vehiculo">Agregar Vehiculo</a>
    <br />
    <a href="index.php">Volver al menu principal</a>
</body>

</html>