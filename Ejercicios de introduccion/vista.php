<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta básica</title>
</head>

<body>
    <p>3. Consulta básica: Recupera e imprime los datos de todos los
        usuarios en la colección.</p>

    <?php
    require "vendor/autoload.php";
    // Conexión a MongoDB
    $mongoClient = new MongoDB\Client("mongodb://localhost:27017");

    // Seleccionar la base de datos y la colección
    $database = $mongoClient->name; // Nombre de tu base de datos
    $collection = $database->usuarios; // Nombre de tu colección

    // Consulta para recuperar todos los usuarios
    $usuarios = $collection->find();

    // Imprimir los datos de todos los usuarios
    echo "<h2>Datos de Usuarios</h2>";
    echo "<ul>";
    foreach ($usuarios as $usuario) {
        echo "<li>Nombre: " . $usuario['nombre'] . "</li>";
        echo "<li>Edad: " . $usuario['edad'] . "</li>";
        echo "<li>Email: " . $usuario['email'] . "</li>";
    }
    echo "</ul>";

    ?>

</body>

</html>