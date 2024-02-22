<?php
require_once 'vendor/autoload.php'; // Importar la biblioteca de MongoDB

// Función para conectar con la base de datos 'concesionario'. El parámetro es la collection.
function conectarBD($collection)
{
    $cliente = new MongoDB\Client("mongodb://localhost:27017");
    return $cliente->concesionario->$collection; // Reemplaza 'concesionario' por el nombre de tu base de datos
}

// ------------------------------------------------------------------------------------------------ //
// --------------------------    MODELOS PARA COLLECTION CLIENTES    ------------------------------ //
// ------------------------------------------------------------------------------------------------ //

// Función para crear un cliente
function crearCliente($nombre, $telefono)
{
    // Convertir el teléfono a tipo Int32
    $telefono = (int) $telefono;

    $coleccion = conectarBD("clientes");
    $coleccion->insertOne(['nombre' => $nombre, 'telefono' => $telefono]);
}

// Función para obtener todos los clientes
function obtenerClientes()
{
    $coleccion = conectarBD("clientes");
    return $coleccion->find();
}

// Función para obtener un cliente por su ID
function obtenerClientePorId($id)
{
    $coleccion = conectarBD("clientes");
    return $coleccion->findOne(['_id' => new MongoDB\BSON\ObjectID($id)]);
}

// Función para actualizar un cliente
function actualizarCliente($id, $nombre, $telefono)
{
    // Convertir el teléfono a tipo Int32
    $telefono = (int) $telefono;

    $coleccion = conectarBD("clientes");
    $coleccion->updateOne(['_id' => new MongoDB\BSON\ObjectID($id)], ['$set' => ['nombre' => $nombre, 'telefono' => $telefono]]);
}

// Función para eliminar un cliente
function eliminarClienteDeBD($id)
{
    $coleccion = conectarBD("clientes");
    $coleccion->deleteOne(['_id' => new MongoDB\BSON\ObjectID($id)]);
}

// ------------------------------------------------------------------------------------------------- //
// --------------------------    MODELOS PARA COLLECTION VEHICULOS    ------------------------------ //
// ------------------------------------------------------------------------------------------------- //

// Función para crear un vehiculo
function crearVehiculo($marca, $modelo)
{
    $coleccion = conectarBD("vehiculos");
    $coleccion->insertOne(['marca' => $marca, 'modelo' => $modelo]);
}

// Función para obtener todos los vehiculos
function obtenerVehiculos()
{
    $coleccion = conectarBD("vehiculos");
    return $coleccion->find();
}

// Función para obtener un cliente por su ID
function obtenerVehiculoPorId($id)
{
    $coleccion = conectarBD("vehiculos");
    return $coleccion->findOne(['_id' => new MongoDB\BSON\ObjectID($id)]);
}

// Función para actualizar un cliente
function actualizarVehiculo($id, $marca, $modelo)
{
    $coleccion = conectarBD("vehiculos");
    $coleccion->updateOne(['_id' => new MongoDB\BSON\ObjectID($id)], ['$set' => ['marca' => $marca, 'modelo' => $modelo]]);
}

// Función para eliminar un cliente
function eliminarVehiculoDeBD($id)
{
    $coleccion = conectarBD("vehiculos");
    $coleccion->deleteOne(['_id' => new MongoDB\BSON\ObjectID($id)]);
}

// ------------------------------------------------------------------------------------------------- //
// ----------------------------    MODELOS PARA COLLECTION PEDIDOS    ------------------------------ //
// ------------------------------------------------------------------------------------------------- //

// Función para crear un pedido. $fecha es un string con formato YYYY-MM-DD
function crearPedido($fecha, $detalles)
{
    $coleccion = conectarBD("pedidos");
    $coleccion->insertOne(['fecha' => $fecha, 'detalles' => $detalles]);
}


// Función para obtener todos los pedidos
function obtenerPedidos()
{
    $coleccion = conectarBD("pedidos");
    return $coleccion->find();
}

// Función para obtener un cliente por su ID
function obtenerPedidoPorId($id)
{
    $coleccion = conectarBD("pedidos");
    return $coleccion->findOne(['_id' => new MongoDB\BSON\ObjectID($id)]);
}

// Función para actualizar un cliente
function actualizarPedido($id, $fecha, $detalles)
{
    $coleccion = conectarBD("pedidos");
    $coleccion->updateOne(
        ['_id' => new MongoDB\BSON\ObjectID($id)],
        ['$set' => ['fecha' => $fecha, 'detalles' => $detalles]]
    );
}


// Función para eliminar un cliente
function eliminarPedidoDeBD($id)
{
    $coleccion = conectarBD("pedidos");
    $coleccion->deleteOne(['_id' => new MongoDB\BSON\ObjectID($id)]);
}
