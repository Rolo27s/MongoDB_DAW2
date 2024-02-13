<?php
require "vendor/autoload.php";
try {
    // conecto a la BD
    $cliente = new MongoDB\Client("mongodb://localhost:27017");
    // me voy a la BD "agenda"
    $bd = $cliente->agenda;

    // devuelve todos los contactos
    echo "Todos los contactos<br>\n";
    $contactos = $bd->contactos->find();
    foreach ($contactos as $contacto) {
        //var_dump($contacto);
        echo "<p>Nombre: ${contacto['nombre']}<br>";
        echo "Telefono: ${contacto['telefono']}<br>";
        echo "Email: ${contacto['email']}<br></p>";
        echo "<br>";
    }

    // contactos con nombre Ana
    echo "<br><br>";
    echo "Contactos con nombre 'Ana' <br>";
    $contactos = $bd->contactos->find( [ "nombre" => "Ana" ] );
    foreach ($contactos as $contacto) {
        //print_r($contacto);
        echo "<p>Nombre: ${contacto['nombre']}<br>";
        echo "Telefono: ${contacto['telefono']}<br>";
        echo "Email: ${contacto['email']}<br></p>";
        echo "<br>";
    }


    // solo devuelve el primero que encuentre
    echo "<br><br>";
    echo "Primer contacto con nombre 'Ana'<br>";
    $ana = $bd->contactos->findOne( [ "nombre"=> "Ana" ] );
    echo "<p>";
    echo "_ID: ${ana['_id']}<br>";
    echo "Nombre: ${ana['nombre']}<br>";
    echo "Telefono: ${ana['telefono']}<br>";
    echo "Email: ${ana['email']}<br></p>";
    echo "<br>";

} catch (Exception $e) {
    print($e);
}