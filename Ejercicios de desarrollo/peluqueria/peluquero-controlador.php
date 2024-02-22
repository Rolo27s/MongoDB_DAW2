<?php
require_once("peluquero-modelo.php");

class ControladorPeluqueros
{
    private $modelo;

    public function __construct()
    {
        $this->modelo = new ModeloPeluquero();
    }

    public function procesar()
    {
        // Determina la acción a realizar (mostrar, insertar, modificar, eliminar)
        $action = isset($_GET["accion"]) ? $_GET["accion"] : "";

        switch ($action) {
            case "insertar":
                $this->insertarPeluquero();
                break;
            case "insertando":
                $this->insertandoPeluquero();
                break;
            case "editar":
                $this->editarPeluquero($_GET["id"]);
                break;
            case "editando":
                $this->editandoPeluquero();
                break;
            case "eliminar":
                $this->eliminarPeluquero($_GET["id"]);
                break;
            default:
                $this->mostrarPeluqueros();
        }
    }

    public function mostrarPeluqueros($mensaje = "")
    {
        // Muestra todos los Peluqueros en la vista
        $peluqueros = $this->modelo->pedirTodosLosPeluqueros();
        include("peluquero-vistas/listar.php");
    }

    public function insertarPeluquero()
    {
        // Carga la vista para insertar un nuevo Peluquero
        include("peluquero-vistas/insertar.php");
    }

    public function insertandoPeluquero()
    {
        // Inserta un nuevo Peluquero y luego muestra la lista actualizada
        $nombre = $_POST["nombre"];
        $dni = $_POST["dni"];
        $telefono = $_POST["telefono"];
        $this->modelo->insertarPeluquero($nombre, $dni, $telefono);
        $this->mostrarPeluqueros();
    }

    public function editarPeluquero($id)
    {
        $peluquero = $this->modelo->pedirUnPeluquero($id);
        include("peluquero-vistas/editar.php");
    }

    public function editandoPeluquero()
    {
        // Modifica un Peluquero existente y luego muestra la lista actualizada
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $dni = $_POST["dni"];
        $telefono = $_POST["telefono"];
        $count = $this->modelo->editarPeluquero($id, $nombre, $dni, $telefono);
        $mensaje = $count . " fila editada";
        $this->mostrarPeluqueros($mensaje);
    }

    public function eliminarPeluquero($id)
    {
        // Elimina un Peluquero y luego muestra la lista actualizada
        $count = $this->modelo->eliminarPeluquero($id);
        $mensaje = $count . " fila editada";
        $this->mostrarPeluqueros($mensaje);
    }
}

// Creo el controlador y le digo que procese la petición
$controlador = new ControladorPeluqueros();
$controlador->procesar();
