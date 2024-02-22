<?php
require "vendor/autoload.php";

// Conexión a MongoDB
$mongoClient = new MongoDB\Client("mongodb://localhost:27017");

// Seleccionar la base de datos y la colección
$database = $mongoClient->name; // Nombre de tu base de datos
$collection = $database->usuarios; // Nombre de tu colección

// Contar el número total de documentos en la colección
$total_usuarios = $collection->countDocuments();

// Imprimir el número total de usuarios
echo "Número total de usuarios en la colección: " . $total_usuarios;
