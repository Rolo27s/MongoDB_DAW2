<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta básica</title>
</head>

<body>
    <p>11. Agregación básica: Utiliza la agregación para encontrar la edad
        promedio de los usuarios.</p>

    <?php
    require "vendor/autoload.php";

    // Conexión a MongoDB
    $mongoClient = new MongoDB\Client("mongodb://localhost:27017");

    // Seleccionar la base de datos y la colección
    $database = $mongoClient->name; // Nombre de tu base de datos
    $collection = $database->usuarios; // Nombre de tu colección

    // Agregación para encontrar la edad promedio de los usuarios
    /*
    En este caso solo hay una etapa de pipeline ($group), que agrupa los documentos según un campo concreto o una expresión y realiza alguna operación de agregación.

    _id se establece en null para que todos los documentos se agrupen juntos. Se utiliza la función de agregación $avg.

    Tendremos una nueva clave: edad_promedio, con el valor correcto, porque estamos haciendo la media de $edad.
    */
    $pipeline = [
        ['$group' => [
            '_id' => null,
            'edad_promedio' => ['$avg' => '$edad']
        ]]
    ];
    // Ejecutamos la agregación
    $resultado = $collection->aggregate($pipeline);

    var_dump($resultado);
    echo "<br /><br />";
    // Obtener el resultado de la agregación y redondear el resultado a 2 decimales
    $edad_promedio = round($resultado->toArray()[0]['edad_promedio'], 2);

    // Imprimir la edad promedio de los usuarios
    echo "Edad promedio de los usuarios: " . $edad_promedio;
    ?>
</body>

</html>