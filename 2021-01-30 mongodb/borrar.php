<?php
require "vendor/autoload.php";
try {
    // conecto a la BD
    $cliente = new MongoDB\Client("mongodb://localhost:27017");
    // me voy a la BD "agenda"
    $bd = $cliente->agenda;

    // Elimina al contacto con nombre "Alfredo"
    echo "Documentos antes de borrar: " . $bd->contactos->count() . "<br>";
    $deleteResult = $bd->contactos->deleteMany( [ "nombre" => "Alfredo" ] );
    echo "Documentos restantes después de borrar: " . $bd->contactos->count() . "<br>";
    echo "Resultado de borrar: <br>";
    print_r($deleteResult);
    echo "<br><br>";

    // Elimina al contacto con id "65b929e8a291ca270a039fb1"
    echo "Documentos antes de borrar: " . $bd->contactos->count() . "<br>";
    $deleteResult = $bd->contactos->deleteOne( array( '_id' => new MongoDB\BSON\ObjectId('65b929e8a291ca270a039fb1')));
    echo "Documentos restantes después de borrar: " . $bd->contactos->count() . "<br>";
    echo "<br><br>";

} catch (Exception $e) {
    print($e);
}
