<?php
require_once("vendor/autoload.php");

class ModeloReserva
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

    public function pedirTodosLosReservas()
    {
        return $this->conexion->reservas->find();
    }

    public function pedirUnReserva($id)
    {
        return $this->conexion->reservas->findOne([
            "_id" => new MongoDB\BSON\ObjectId($id)
        ]);
    }

    public function insertarReserva($nombre, $fecha)
    {
        $res = $this->conexion->reservas->insertOne(["nombre" => $nombre, "fecha" => $fecha]);
        return $res->getInsertedId();
    }

    public function editarReserva($id, $nombre, $fecha)
    {
        $res = $this->conexion->reservas->updateOne(
            ["_id" => new MongoDB\BSON\ObjectId($id)],
            ['$set' => [
                'nombre' => $nombre,
                'fecha' => $fecha,
            ]]
        );
        return $res->getModifiedCount();
    }

    public function eliminarReserva($id)
    {
        $res = $this->conexion->reservas->deleteOne([
            "_id" => new MongoDB\BSON\ObjectId($id)
        ]);
        return $res->getDeletedCount();
    }
}
