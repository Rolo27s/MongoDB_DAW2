<?php
require "vendor/autoload.php";

// Conexión a MongoDB
$mongoClient = new MongoDB\Client("mongodb://localhost:27017");

// Seleccionar la base de datos y la colección
$database = $mongoClient->name; // Nombre de tu base de datos
$collection = $database->usuarios; // Nombre de tu colección

// ID del usuario que deseas eliminar, en este caso, Paco.
$id_usuario = "65cf3cdb48a060e2700f0938"; // Reemplaza con el ID del usuario específico que deseas eliminar

// Consulta para eliminar el usuario específico
$resultado = $collection->deleteOne(
    ['_id' => new MongoDB\BSON\ObjectId($id_usuario)] // Filtro para encontrar el usuario por su ID
);

// Verificar si la eliminación fue exitosa
if ($resultado->getDeletedCount() > 0) {
    echo "Se eliminó el usuario correctamente.";
} else {
    echo "No se encontró ningún usuario con el ID proporcionado.";
}
