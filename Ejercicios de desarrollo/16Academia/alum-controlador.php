<?php
require_once("alum-modelo.php");

class ControladorAlumno
{
    private $modelo;

    public function __construct()
    {
        $this->modelo = new ModeloAlumno();
    }

    public function procesar()
    {
        // Determina la acción a realizar (mostrar, insertar, modificar, eliminar)
        $action = isset($_GET["accion"]) ? $_GET["accion"] : "";

        switch ($action) {
            case "insertar":
                $this->insertarAlumno();
                break;
            case "insertando":
                $this->insertandoAlumno();
                break;
            case "editar":
                $this->editarAlumno($_GET["id"]);
                break;
            case "editando":
                $this->editandoAlumno();
                break;
            case "eliminar":
                $this->eliminarAlumno($_GET["id"]);
                break;
            default:
                $this->mostrarAlumnos();
        }
    }

    public function mostrarAlumnos($mensaje = "")
    {
        // Muestra todos los Alumnos en la vista
        $alumnos = $this->modelo->pedirTodosLosAlumnos();
        include("alum-vista-listar.php");
    }

    public function insertarAlumno()
    {
        // Carga la vista para insertar un nuevo Alumno
        include("alum-vista-insertar.php");
    }

    public function insertandoAlumno()
    {
        // Inserta un nuevo Alumno y luego muestra la lista actualizada
        $nombre = $_POST["nombre"];
        $dni = $_POST["dni"];
        $telefono = $_POST["telefono"];
        $this->modelo->insertarAlumno($nombre, $dni, $telefono);
        $this->mostrarAlumnos();
    }

    public function editarAlumno($id)
    {
        $alumno = $this->modelo->pedirUnAlumno($id);
        include("alum-vista-editar.php");
    }

    public function editandoAlumno()
    {
        // Modifica un Alumno existente y luego muestra la lista actualizada
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $dni = $_POST["dni"];
        $telefono = $_POST["telefono"];
        $count = $this->modelo->editarAlumno($id, $nombre, $dni, $telefono);
        $mensaje = $count . " fila editada";
        $this->mostrarAlumnos($mensaje);
    }

    public function eliminarAlumno($id)
    {
        // Elimina un Alumno y luego muestra la lista actualizada
        $count = $this->modelo->eliminarAlumno($id);
        $mensaje = $count . " fila editada";
        $this->mostrarAlumnos($mensaje);
    }
}

// Creo el controlador y le digo que procese la petición
$controlador = new ControladorAlumno();
$controlador->procesar();
