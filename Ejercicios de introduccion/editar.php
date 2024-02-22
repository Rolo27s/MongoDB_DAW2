<?php
require "vendor/autoload.php";

// Conexión a MongoDB
$mongoClient = new MongoDB\Client("mongodb://localhost:27017");

// Seleccionar la base de datos y la colección
$database = $mongoClient->name; // Nombre de tu base de datos
$collection = $database->usuarios; // Nombre de tu colección

// ID del usuario que deseas actualizar. En este caso, Paco.
$id_usuario = "65cf3cdb48a060e2700f0938"; // Reemplaza con el ID del usuario específico que deseas actualizar

// Nueva edad del usuario
$nueva_edad = "30"; // Reemplaza con la nueva edad que deseas asignar al usuario

// Consulta para actualizar la edad del usuario específico
$resultado = $collection->updateOne(
    ['_id' => new MongoDB\BSON\ObjectId($id_usuario)], // Filtro para encontrar el usuario por su ID
    ['$set' => ['edad' => $nueva_edad]] // Actualiza el campo 'edad' con la nueva edad
);

// Verificar si la actualización fue exitosa
if ($resultado->getModifiedCount() > 0) {
    echo "Se actualizó la edad del usuario correctamente.";
} else {
    echo "No se encontró ningún usuario con el ID proporcionado.";
}
