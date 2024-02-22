<?php
require_once("cliente-modelo.php");

class ControladorClientes
{
    private $modelo;

    public function __construct()
    {
        $this->modelo = new ModeloCliente();
    }

    public function procesar()
    {
        // Determina la acción a realizar (mostrar, insertar, modificar, eliminar)
        $action = isset($_GET["accion"]) ? $_GET["accion"] : "";

        switch ($action) {
            case "insertar":
                $this->insertarCliente();
                break;
            case "insertando":
                $this->insertandoCliente();
                break;
            case "editar":
                $this->editarCliente($_GET["id"]);
                break;
            case "editando":
                $this->editandoCliente();
                break;
            case "eliminar":
                $this->eliminarCliente($_GET["id"]);
                break;
            default:
                $this->mostrarClientes();
        }
    }

    public function mostrarClientes($mensaje = "")
    {
        // Muestra todos los Clientes en la vista
        $clientes = $this->modelo->pedirTodosLosClientes();
        include("cliente-vistas/listar.php");
    }

    public function insertarCliente()
    {
        // Carga la vista para insertar un nuevo Cliente
        include("cliente-vistas/insertar.php");
    }

    public function insertandoCliente()
    {
        // Inserta un nuevo Cliente y luego muestra la lista actualizada
        $nombre = $_POST["nombre"];
        $dni = $_POST["dni"];
        $telefono = $_POST["telefono"];
        $this->modelo->insertarCliente($nombre, $dni, $telefono);
        $this->mostrarClientes();
    }

    public function editarCliente($id)
    {
        $cliente = $this->modelo->pedirUnCliente($id);
        include("cliente-vistas/editar.php");
    }

    public function editandoCliente()
    {
        // Modifica un Cliente existente y luego muestra la lista actualizada
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $dni = $_POST["dni"];
        $telefono = $_POST["telefono"];
        $count = $this->modelo->editarcliente($id, $nombre, $dni, $telefono);
        $mensaje = $count . " fila editada";
        $this->mostrarClientes($mensaje);
    }

    public function eliminarCliente($id)
    {
        // Elimina un Cliente y luego muestra la lista actualizada
        $count = $this->modelo->eliminarCliente($id);
        $mensaje = $count . " fila editada";
        $this->mostrarClientes($mensaje);
    }
}

// Creo el controlador y le digo que procese la petición
$controlador = new ControladorClientes();
$controlador->procesar();
