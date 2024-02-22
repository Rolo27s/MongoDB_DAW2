<!DOCTYPE html>
<html>

<head>
    <title>Listado de reservas</title>
    <style>
        div {
            width: 50%;
            margin: 50px auto 0px;
        }
    </style>
</head>

<body>
    <div>
        <form method="post" action="reserva-controlador.php?accion=editando">
            <input type="hidden" name="id" required="required" value="<?= $reserva['_id'] ?>">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" required="required" value="<?= $reserva['nombre'] ?>">
            <br />
            <label for="fecha">Nombre:</label>
            <input type="date" name="fecha" required="required" value="<?= $reserva['fecha'] ?>">
            <br />
            <button type="submit">Guardar</button>
        </form>
    </div>
</body>

</html>