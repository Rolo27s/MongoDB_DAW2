<?php
require_once("vendor/autoload.php");

class ModeloAlumno
{
    private $conexion;

    public function __construct()
    {
        try {
            $cliente = new MongoDB\Client("mongodb://localhost:27017");
            $this->conexion = $cliente->academia;
        } catch (Exception $e) {
            print($e);
        }
    }

    public function pedirTodosLosAlumnos()
    {
        return $this->conexion->alumnos->find();
    }

    public function pedirUnAlumno($id)
    {
        return $this->conexion->alumnos->findOne([
            "_id" => new MongoDB\BSON\ObjectId($id)
        ]);
    }

    public function insertarAlumno($nombre, $dni, $telefono)
    {
        $res = $this->conexion->alumnos->insertOne(["nombre" => $nombre, "dni" => $dni, "telefono" => $telefono]);
        return $res->getInsertedId();
    }

    public function editarAlumno($id, $nombre, $dni, $telefono)
    {
        $res = $this->conexion->alumnos->updateOne(
            ["_id" => new MongoDB\BSON\ObjectId($id)],
            ['$set' => [
                'nombre' => $nombre,
                'dni' => $dni,
                'telefono' => $telefono,
            ]]
        );
        return $res->getModifiedCount();
    }

    public function eliminarAlumno($id)
    {
        $res = $this->conexion->alumnos->deleteOne([
            "_id" => new MongoDB\BSON\ObjectId($id)
        ]);
        return $res->getDeletedCount();
    }
}
