<?php
require 'vendor/autoload.php';
$uri = "mongodb://localhost:27017";
$Client = new \MongoDB\Client($uri);

$Database = $Client->selectDatabase('name');
$Collection = $Database->selectCollection('usuarios');
echo "Conexión realizada a la base de datos 'name', collection 'usuarios";
