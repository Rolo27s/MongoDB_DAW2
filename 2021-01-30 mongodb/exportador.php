<?php
require "vendor/autoload.php";
try {
    // conecto a la BD y me voy a la BD "agenda"
    $conexion = new MongoDB\Client("mongodb://localhost:27017");
    $bd = $conexion->agenda;

    // devuelve todos los contactos
    echo "Extracción de los contactos para MySQL:<br>\n";
    $contactos = $bd->contactos->find();
    foreach ($contactos as $contacto) {
        echo "<p>";
        echo "INSERT INTO contactos (nombre, telefono, email) VALUES(";
        echo "'" . $contacto['nombre']   . "',";
        echo       $contacto['telefono'] .  ",";
        echo "'" . $contacto['email']    . "');";
        echo "</p><br>";
    }

} catch (Exception $e) {
    print($e);
}