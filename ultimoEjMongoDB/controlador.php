<?php
require_once("modelo.php");

class Controlador
{
    private $modelo;

    public function __construct()
    {
        $this->modelo = new Modelo();
    }

    public function procesar()
    {
        // Determina la acción a realizar (mostrar, insertar, modificar, eliminar)
        $action = isset($_GET["accion"]) ? $_GET["accion"] : "";

        switch ($action) {
            case "insertar":
                $this->insertarCorredor();
                break;
            case "insertando":
                $this->insertandoCorredor();
                break;
            case "editar":
                $this->editarCorredor($_GET["id"]);
                break;
            case "editando":
                $this->editandoCorredor();
                break;
            case "eliminar":
                $this->eliminarCorredor($_GET["id"]);
                break;
            default:
                $this->mostrarCorredores();
        }
    }

    public function mostrarCorredores($mensaje = "")
    {
        // Muestra todos los Corredores en la vista
        $corredores = $this->modelo->pedirTodosLosCorredores();
        include("vistas/listar.php");
    }

    public function insertarCorredor()
    {
        // Carga la vista para insertar un nuevo Corredor
        include("vistas/insertar.php");
    }

    public function editarCorredor($id)
    {
        $corredor = $this->modelo->pedirUnCorredor($id);
        include("vistas/editar.php");
    }


    public function insertandoCorredor()
    {
        // Inserta un nuevo Corredor y luego muestra la lista actualizada
        $nombre = $_POST["nombre"];
        $dorsal = $_POST["dorsal"];
        $salida = $_POST["salida"];
        $llegada = $_POST["llegada"];
        $count = $this->modelo->insertarCorredor($nombre, $dorsal, $salida, $llegada); // Devuelve el id
        $mensaje = $count . " fila insertada";
        $this->mostrarCorredores($mensaje);
    }

    public function editandoCorredor()
    {
        // Modifica un Corredor existente y luego muestra la lista actualizada
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $dorsal = $_POST["dorsal"];
        $salida = $_POST["salida"];
        $llegada = $_POST["llegada"];
        $count = $this->modelo->editarCorredor($id, $nombre, $dorsal, $salida, $llegada);
        $mensaje = $count . " fila editada";
        $this->mostrarCorredores($mensaje);
    }

    public function eliminarCorredor($id)
    {
        // Elimina un Corredor y luego muestra la lista actualizada
        $count = $this->modelo->eliminarCorredor($id);
        $mensaje = $count . " fila eliminada";
        $this->mostrarCorredores($mensaje);
    }
}

// Creo el controlador y le digo que procese la petición
$controlador = new Controlador();
$controlador->procesar();
