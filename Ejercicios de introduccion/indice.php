<?php
require "vendor/autoload.php";

// Conexión a MongoDB
$mongoClient = new MongoDB\Client("mongodb://localhost:27017");

// Seleccionar la base de datos y la colección
$database = $mongoClient->name; // Nombre de tu base de datos
$collection = $database->usuarios; // Nombre de tu colección

// Crear un índice en la colección para el campo 'edad'
$resultado = $collection->createIndex(['edad' => 1]);

// Verificar si la creación del índice fue exitosa
if ($resultado) {
    echo "Índice creado exitosamente.";
} else {
    echo "Error al crear el índice.";
}
