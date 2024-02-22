<?php
require "vendor/autoload.php";

// Conexión a MongoDB
$mongoClient = new MongoDB\Client("mongodb://localhost:27017");

// Seleccionar la base de datos y la colección
$database = $mongoClient->name; // Nombre de tu base de datos
$collection = $database->usuarios; // Nombre de tu colección

// Consulta para recuperar los usuarios mayores de 25 años
$usuarios_mayores_25 = $collection->find(['edad' => ['$gt' => 25]]);

// Imprimir los datos de los usuarios mayores de 25 años
echo "<h2>Usuarios mayores de 25 años</h2>";
echo "<ul>";
foreach ($usuarios_mayores_25 as $usuario) {
    echo "<li>Nombre: " . $usuario['nombre'] . "</li>";
    echo "<li>Edad: " . $usuario['edad'] . "</li>";
    echo "<li>Email: " . $usuario['email'] . "</li>";
}
echo "</ul>";
