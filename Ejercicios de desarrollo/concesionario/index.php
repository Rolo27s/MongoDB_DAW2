<?php
require_once 'model.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
        // -------------------------- //
        // Acciones para los CLIENTES //
        // -------------------------- //
    case 'listar_clientes':
        listarClientes();
        break;
    case 'ver_cliente':
        if (isset($_GET['id'])) {
            verCliente($_GET['id']);
        } else {
            mostrarError('ID de cliente no especificado');
        }
        break;
    case 'agregar_cliente':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            agregarCliente();
        } else {
            mostrarFormularioAgregarCliente();
        }
        break;
    case 'editar_cliente':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['id'])) {
                editarCliente($_POST['id']);
            } else {
                mostrarError('ID de cliente no especificado');
            }
        } else {
            if (isset($_GET['id'])) {
                mostrarFormularioEditarCliente($_GET['id']);
            } else {
                mostrarError('ID de cliente no especificado');
            }
        }
        break;
    case 'eliminar_cliente':
        if (isset($_GET['id'])) {
            eliminarCliente($_GET['id']);
        } else {
            mostrarError('ID de cliente no especificado');
        }
        break;

        // --------------------------- //
        // Acciones para los VEHICULOS //
        // --------------------------- //
    case 'listar_vehiculos':
        listarVehiculos();
        break;
    case 'ver_vehiculo':
        if (isset($_GET['id'])) {
            verVehiculo($_GET['id']);
        } else {
            mostrarError('ID de vehiculo no especificado');
        }
        break;
    case 'agregar_vehiculo':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            agregarVehiculo();
        } else {
            mostrarFormularioAgregarVehiculo();
        }
        break;
    case 'editar_vehiculo':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['id'])) {
                editarVehiculo($_POST['id']);
            } else {
                mostrarError('ID de vehiculo no especificado');
            }
        } else {
            if (isset($_GET['id'])) {
                mostrarFormularioEditarVehiculo($_GET['id']);
            } else {
                mostrarError('ID de vehiculo no especificado');
            }
        }
        break;
    case 'eliminar_vehiculo':
        if (isset($_GET['id'])) {
            eliminarVehiculo($_GET['id']);
        } else {
            mostrarError('ID de vehiculo no especificado');
        }
        break;

        // ------------------------- //
        // Acciones para los PEDIDOS //
        // ------------------------- //
    case 'listar_pedidos':
        listarPedidos();
        break;
    case 'ver_pedido':
        if (isset($_GET['id'])) {
            verPedido($_GET['id']);
        } else {
            mostrarError('ID de pedido no especificado');
        }
        break;
    case 'agregar_pedido':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            agregarPedido();
        } else {
            mostrarFormularioAgregarPedido();
        }
        break;
    case 'editar_pedido':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['id'])) {
                editarPedido($_POST['id']);
            } else {
                mostrarError('ID de pedido no especificado');
            }
        } else {
            if (isset($_GET['id'])) {
                mostrarFormularioEditarPedido($_GET['id']);
            } else {
                mostrarError('ID de pedido no especificado');
            }
        }
        break;
    case 'eliminar_pedido':
        if (isset($_GET['id'])) {
            eliminarPedido($_GET['id']);
        } else {
            mostrarError('ID de pedido no especificado');
        }
        break;
    default:
        mostrarMenuPrincipal();
        break;
}

// --------------------------- //
// --- Funciones GENERALES --- //
// --------------------------- //
function mostrarError($mensaje)
{
    echo "<p>Error: $mensaje</p>";
}

function mostrarMenuPrincipal()
{
    include 'views/menu_principal.php';
}

// --------------------------- //
// Funciones para los CLIENTES //
// --------------------------- //
function listarClientes()
{
    $clientes = obtenerClientes();
    include 'views/clientes/listar_clientes.php';
}

function verCliente($id)
{
    $cliente = obtenerClientePorId($id);
    include 'views/clientes/ver_cliente.php';
}

function agregarCliente()
{
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    crearCliente($nombre, $telefono);
    header('Location: index.php?action=listar_clientes');
}

function editarCliente($id)
{
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    actualizarCliente($id, $nombre, $telefono);
    header('Location: index.php?action=listar_clientes');
}

function eliminarCliente($id)
{
    eliminarClienteDeBD($id);
    header('Location: index.php?action=listar_clientes');
}

function mostrarFormularioAgregarCliente()
{
    include 'views/clientes/formulario_agregar_cliente.php';
}

function mostrarFormularioEditarCliente($id)
{
    $cliente = obtenerClientePorId($id);
    include 'views/clientes/formulario_editar_cliente.php';
}

// ---------------------------- //
// Funciones para los VEHICULOS //
// ---------------------------- //
function listarVehiculos()
{
    $vehiculos = obtenerVehiculos();
    include 'views/vehiculos/listar_vehiculos.php';
}

function verVehiculo($id)
{
    $vehiculo = obtenerVehiculoPorId($id);
    include 'views/vehiculos/ver_vehiculo.php';
}

function agregarVehiculo()
{
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    crearVehiculo($marca, $modelo);
    header('Location: index.php?action=listar_vehiculos');
}

function editarvehiculo($id)
{
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    actualizarVehiculo($id, $marca, $modelo);
    header('Location: index.php?action=listar_vehiculos');
}

function eliminarVehiculo($id)
{
    eliminarVehiculoDeBD($id);
    header('Location: index.php?action=listar_vehiculos');
}

function mostrarFormularioAgregarVehiculo()
{
    include 'views/vehiculos/formulario_agregar_vehiculo.php';
}

function mostrarFormularioEditarVehiculo($id)
{
    $vehiculo = obtenerVehiculoPorId($id);
    include 'views/vehiculos/formulario_editar_vehiculo.php';
}

// -------------------------- //
// Funciones para los PEDIDOS //
// -------------------------- //
function listarPedidos()
{
    $pedidos = obtenerPedidos();
    include 'views/pedidos/listar_pedidos.php';
}

function verPedido($id)
{
    $pedido = obtenerPedidoPorId($id);
    include 'views/pedidos/ver_pedido.php';
}

function agregarPedido()
{
    $fecha = $_POST['fecha'];
    $detalles = $_POST['detalles'];
    crearPedido($fecha, $detalles);
    header('Location: index.php?action=listar_pedidos');
}

function editarPedido($id)
{
    $fecha = $_POST['fecha'];
    $detalles = $_POST['detalles'];
    actualizarPedido($id, $fecha, $detalles);
    header('Location: index.php?action=listar_pedidos');
}

function eliminarPedido($id)
{
    eliminarPedidoDeBD($id);
    header('Location: index.php?action=listar_pedidos');
}

function mostrarFormularioAgregarPedido()
{
    include 'views/pedidos/formulario_agregar_pedido.php';
}

function mostrarFormularioEditarPedido($id)
{
    $pedido = obtenerPedidoPorId($id);
    include 'views/pedidos/formulario_editar_pedido.php';
}
