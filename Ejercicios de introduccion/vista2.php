<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta básica</title>
</head>

<body>
    <p>9. Proyección de campos: Realiza una consulta que devuelva solo
        los nombres y correos de los usuarios.</p>

    <?php
    require "vendor/autoload.php";

    // Conexión a MongoDB
    $mongoClient = new MongoDB\Client("mongodb://localhost:27017");

    // Seleccionar la base de datos y la colección
    $database = $mongoClient->name; // Nombre de tu base de datos
    $collection = $database->usuarios; // Nombre de tu colección

    // Consulta para recuperar solo los nombres y correos de los usuarios
    $usuarios = $collection->find([], ['projection' => ['nombre' => 1, 'email' => 1]]);

    // Imprimir los datos de los usuarios (solo nombres y correos)
    echo "<h2>Nombres y correos de los usuarios</h2>";
    echo "<ul>";
    foreach ($usuarios as $usuario) {
        echo "<li>Nombre: " . $usuario['nombre'] . "</li>";
        echo "<li>Email: " . $usuario['email'] . "</li>";
    }
    echo "</ul>";
    ?>


</body>

</html>