<?php
require "vendor/autoload.php";
try {
    // conecto a la BD
    $cliente = new MongoDB\Client("mongodb://localhost:27017");
    // me voy a la BD "agenda"
    $bd = $cliente->agenda;

    // insertar un contacto en la agenda en la tabla "contactos"
    $res = $bd->contactos->insertOne(
        [
            "nombre"   => "Ana",
            "telefono" => 100055741,
            "email"    => "ana@hotmail.com",
        ]
    );

    // veo los datos de la inserción
    echo "Id del último registro: " . $res->getinsertedId() . "<br>";

} catch (Exception $e) {
    print($e);
}