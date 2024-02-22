<?php
require_once("reserva-modelo.php");

class ControladorReservas
{
    private $modelo;

    public function __construct()
    {
        $this->modelo = new ModeloReserva();
    }

    public function procesar()
    {
        // Determina la acción a realizar (mostrar, insertar, modificar, eliminar)
        $action = isset($_GET["accion"]) ? $_GET["accion"] : "";

        switch ($action) {
            case "insertar":
                $this->insertarReserva();
                break;
            case "insertando":
                $this->insertandoReserva();
                break;
            case "editar":
                $this->editarReserva($_GET["id"]);
                break;
            case "editando":
                $this->editandoReserva();
                break;
            case "eliminar":
                $this->eliminarReserva($_GET["id"]);
                break;
            default:
                $this->mostrarReservas();
        }
    }

    public function mostrarReservas($mensaje = "")
    {
        // Muestra todos los Reservas en la vista
        $reservas = $this->modelo->pedirTodosLosReservas();
        include("reserva-vistas/listar.php");
    }

    public function insertarReserva()
    {
        // Carga la vista para insertar un nuevo Reserva
        include("reserva-vistas/insertar.php");
    }

    public function insertandoReserva()
    {
        // Inserta un nuevo Reserva y luego muestra la lista actualizada
        $nombre = $_POST["nombre"];
        $fecha = $_POST["fecha"];
        $this->modelo->insertarReserva($nombre, $fecha);
        $this->mostrarReservas();
    }

    public function editarReserva($id)
    {
        $reserva = $this->modelo->pedirUnReserva($id);
        include("reserva-vistas/editar.php");
    }

    public function editandoReserva()
    {
        // Modifica un Reserva existente y luego muestra la lista actualizada
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $fecha = $_POST["fecha"];
        $count = $this->modelo->editarReserva($id, $nombre, $fecha);
        $mensaje = $count . " fila editada";
        $this->mostrarReservas($mensaje);
    }

    public function eliminarReserva($id)
    {
        // Elimina un Reserva y luego muestra la lista actualizada
        $count = $this->modelo->eliminarReserva($id);
        $mensaje = $count . " fila editada";
        $this->mostrarReservas($mensaje);
    }
}

// Creo el controlador y le digo que procese la petición
$controlador = new ControladorReservas();
$controlador->procesar();
