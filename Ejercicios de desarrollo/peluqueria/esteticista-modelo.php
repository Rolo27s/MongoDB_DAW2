<?php
require_once("vendor/autoload.php");

class ModeloEsteticista
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

    public function pedirTodosLosEsteticistas()
    {
        return $this->conexion->esteticistas->find();
    }

    public function pedirUnEsteticista($id)
    {
        return $this->conexion->esteticistas->findOne([
            "_id" => new MongoDB\BSON\ObjectId($id)
        ]);
    }

    public function insertarEsteticista($nombre, $dni, $telefono)
    {
        $res = $this->conexion->esteticistas->insertOne(["nombre" => $nombre, "dni" => $dni, "telefono" => $telefono]);
        return $res->getInsertedId();
    }

    public function editarEsteticista($id, $nombre, $dni, $telefono)
    {
        $res = $this->conexion->esteticistas->updateOne(
            ["_id" => new MongoDB\BSON\ObjectId($id)],
            ['$set' => [
                'nombre' => $nombre,
                'dni' => $dni,
                'telefono' => $telefono,
            ]]
        );
        return $res->getModifiedCount();
    }

    public function eliminarEsteticista($id)
    {
        $res = $this->conexion->esteticistas->deleteOne([
            "_id" => new MongoDB\BSON\ObjectId($id)
        ]);
        return $res->getDeletedCount();
    }
}
