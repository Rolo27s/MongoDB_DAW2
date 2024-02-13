<?php
require "vendor/autoload.php";
try {
    // conecto a la BD
    $cliente = new MongoDB\Client("mongodb://localhost:27017");
    // me voy a la BD "agenda"
    $bd = $cliente->agenda;

    // pone a 7000 el saldo del contacto con nombre "Ana"
    $updateResult = $bd->contactos->updateOne(
        [ 'nombre' => 'Ana' ],
        [ '$set'   => [
                'telefono' => 700111444,
                'email' => 'anamari@mixmail.com'
            ]
        ]
    );
    // MUY IMPORTANTE LAS COMILLAS SIMPLES
    printf("Datos coincidentes: %d<br>", $updateResult->getMatchedCount());
    printf("Datos modificados:  %d<br>", $updateResult->getModifiedCount());



} catch (Exception $e) {
    print($e);
}