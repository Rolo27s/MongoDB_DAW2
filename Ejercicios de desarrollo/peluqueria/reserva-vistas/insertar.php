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
        <form method="post" action="reserva-controlador.php?accion=insertando">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" required="required">
            <br />
            <label for="fecha">Fecha:</label>
            <input type="date" name="fecha" required="required">
            <br />
            <button type="submit">Guardar</button>
        </form>
    </div>
</body>

</html>