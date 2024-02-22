<?php
require_once("vendor/autoload.php");
class Modelo
{
    // Conexión
    private $conexion;
    public $nombreBD = 'maraton';
    // Info de la base de datos

    public function __construct()
    {
        try {
            $cliente = new MongoDB\Client("mongodb://localhost:27017");
            $this->conexion = $cliente->maraton;
        } catch (Exception $e) {
            echo "Error al conectar a MongoDB: " . $e->getMessage();
        }
    }

    public function pedirTodosLosCorredores()
    {
        return $this->conexion->corredores->find();
    }

    public function pedirUnCorredor($id)
    {
        return $this->conexion->corredores->findOne([
            "_id" => new MongoDB\BSON\ObjectId($id)
        ]);
    }

    public function insertarCorredor($nombre, $dorsal, $salida, $llegada)
    {
        $res = $this->conexion->corredores->insertOne(["nombre" => $nombre, "dorsal" => $dorsal, "salida" => $salida, "llegada" => $llegada]);
        return $res->getInsertedId();
    }

    public function editarCorredor($id, $nombre, $dorsal, $salida, $llegada)
    {
        $res = $this->conexion->corredores->updateOne(
            ["_id" => new MongoDB\BSON\ObjectId($id)],
            ['$set' => [
                'nombre' => $nombre,
                'dorsal' => $dorsal,
                'salida' => $salida,
                'llegada' => $llegada,
            ]]
        );
        return $res->getModifiedCount();
    }

    public function eliminarCorredor($id)
    {
        $res = $this->conexion->corredores->deleteOne([
            "_id" => new MongoDB\BSON\ObjectId($id)
        ]);
        return $res->getDeletedCount();
    }
}
