<?php
require "vendor/autoload.php";

// Conexión a MongoDB
$mongoClient = new MongoDB\Client("mongodb://localhost:27017");

// Seleccionar la base de datos y la colección
$database = $mongoClient->name; // Nombre de tu base de datos
$collection = $database->usuarios; // Nombre de tu colección

// Consulta para recuperar e imprimir los usuarios ordenados por edad ascendente
$usuarios_ordenados = $collection->find([], ['sort' => ['edad' => 1]]);

// Imprimir los datos de los usuarios ordenados por edad ascendente
echo "<h2>Usuarios ordenados por edad ascendente</h2>";
echo "<ul>";
foreach ($usuarios_ordenados as $usuario) {
    echo "<li>Nombre: " . $usuario['nombre'] . "</li>";
    echo "<li>Edad: " . $usuario['edad'] . "</li>";
    echo "<li>Email: " . $usuario['email'] . "</li>";
}
echo "</ul>";
