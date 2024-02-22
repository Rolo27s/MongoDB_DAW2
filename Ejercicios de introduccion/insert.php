<?php
require "vendor/autoload.php";
try {
    $cliente = new MongoDB\Client("mongodb://localhost:27017");
    // Conecto a la base de datos 'agenda'
    $bd = $cliente->name;
    $res = $bd->usuarios->insertMany([
        ["nombre" => "Paco",  "edad" => 22, "email" => "paco.porras@gmail.com"],
        ["nombre" => "Maria", "edad" => 18, "email" => "maria.ravas@gmail.com"],
        ["nombre" => "Josh", "edad" => 24, "email" => "Josh345t@gmail.com"],
    ]);
    echo "Documentos insertados: " . $res->getInsertedCount() . "<br />";
    print_r($res->getInsertedIds());
} catch (Exception $e) {
    print($e);
}
