<?php
require_once("vendor/autoload.php");

class ModeloPeluquero
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

    public function pedirTodosLosPeluqueros()
    {
        return $this->conexion->peluqueros->find();
    }

    public function pedirUnPeluquero($id)
    {
        return $this->conexion->peluqueros->findOne([
            "_id" => new MongoDB\BSON\ObjectId($id)
        ]);
    }

    public function insertarPeluquero($nombre, $dni, $telefono)
    {
        $res = $this->conexion->peluqueros->insertOne(["nombre" => $nombre, "dni" => $dni, "telefono" => $telefono]);
        return $res->getInsertedId();
    }

    public function editarPeluquero($id, $nombre, $dni, $telefono)
    {
        $res = $this->conexion->peluqueros->updateOne(
            ["_id" => new MongoDB\BSON\ObjectId($id)],
            ['$set' => [
                'nombre' => $nombre,
                'dni' => $dni,
                'telefono' => $telefono,
            ]]
        );
        return $res->getModifiedCount();
    }

    public function eliminarPeluquero($id)
    {
        $res = $this->conexion->peluqueros->deleteOne([
            "_id" => new MongoDB\BSON\ObjectId($id)
        ]);
        return $res->getDeletedCount();
    }
}
