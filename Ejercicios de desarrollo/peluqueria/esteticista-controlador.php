<?php
require_once("esteticista-modelo.php");

class ControladorEsteticistas
{
    private $modelo;

    public function __construct()
    {
        $this->modelo = new ModeloEsteticista();
    }

    public function procesar()
    {
        // Determina la acción a realizar (mostrar, insertar, modificar, eliminar)
        $action = isset($_GET["accion"]) ? $_GET["accion"] : "";

        switch ($action) {
            case "insertar":
                $this->insertarEsteticista();
                break;
            case "insertando":
                $this->insertandoEsteticista();
                break;
            case "editar":
                $this->editarEsteticista($_GET["id"]);
                break;
            case "editando":
                $this->editandoEsteticista();
                break;
            case "eliminar":
                $this->eliminarEsteticista($_GET["id"]);
                break;
            default:
                $this->mostrarEsteticistas();
        }
    }

    public function mostrarEsteticistas($mensaje = "")
    {
        // Muestra todos los Esteticistas en la vista
        $esteticistas = $this->modelo->pedirTodosLosEsteticistas();
        include("esteticista-vistas/listar.php");
    }

    public function insertarEsteticista()
    {
        // Carga la vista para insertar un nuevo Esteticista
        include("esteticista-vistas/insertar.php");
    }

    public function insertandoEsteticista()
    {
        // Inserta un nuevo Esteticista y luego muestra la lista actualizada
        $nombre = $_POST["nombre"];
        $dni = $_POST["dni"];
        $telefono = $_POST["telefono"];
        $this->modelo->insertarEsteticista($nombre, $dni, $telefono);
        $this->mostrarEsteticistas();
    }

    public function editarEsteticista($id)
    {
        $esteticista = $this->modelo->pedirUnEsteticista($id);
        include("esteticista-vistas/editar.php");
    }

    public function editandoEsteticista()
    {
        // Modifica un Esteticista existente y luego muestra la lista actualizada
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $dni = $_POST["dni"];
        $telefono = $_POST["telefono"];
        $count = $this->modelo->editarEsteticista($id, $nombre, $dni, $telefono);
        $mensaje = $count . " fila editada";
        $this->mostrarEsteticistas($mensaje);
    }

    public function eliminarEsteticista($id)
    {
        // Elimina un Esteticista y luego muestra la lista actualizada
        $count = $this->modelo->eliminarEsteticista($id);
        $mensaje = $count . " fila editada";
        $this->mostrarEsteticistas($mensaje);
    }
}

// Creo el controlador y le digo que procese la petición
$controlador = new ControladorEsteticistas();
$controlador->procesar();
