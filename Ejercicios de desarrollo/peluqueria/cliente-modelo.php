<?php
require_once("vendor/autoload.php");

class ModeloCliente
{
    private $conexion;

    public function __construct()
    {
        try {
            $cliente = new MongoDB\Client("mongodb://localhost:27017");
            $this->conexion = $cliente->peluqueria;
        } catch (Exception $e) {
            print($e);
        }
    }

    public function pedirTodosLosClientes()
    {
        return $this->conexion->clientes->find();
    }

    public function pedirUnCliente($id)
    {
        return $this->conexion->clientes->findOne([
            "_id" => new MongoDB\BSON\ObjectId($id)
        ]);
    }

    public function insertarCliente($nombre, $dni, $telefono)
    {
        $res = $this->conexion->clientes->insertOne(["nombre" => $nombre, "dni" => $dni, "telefono" => $telefono]);
        return $res->getInsertedId();
    }

    public function editarCliente($id, $nombre, $dni, $telefono)
    {
        $res = $this->conexion->clientes->updateOne(
            ["_id" => new MongoDB\BSON\ObjectId($id)],
            ['$set' => [
                'nombre' => $nombre,
                'dni' => $dni,
                'telefono' => $telefono,
            ]]
        );
        return $res->getModifiedCount();
    }

    public function eliminarCliente($id)
    {
        $res = $this->conexion->clientes->deleteOne([
            "_id" => new MongoDB\BSON\ObjectId($id)
        ]);
        return $res->getDeletedCount();
    }
}
