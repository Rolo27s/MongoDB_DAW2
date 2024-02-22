c
<!DOCTYPE html>
<html>

<head>
    <title>Listado de corredores</title>
    <style>
        div {
            width: 50%;
            margin: 50px auto 0px;
        }
    </style>
</head>

<body>
    <div>
        <form method="post" action="controlador.php?accion=editando">
            <input type="hidden" name="id" required="required" value="<?= $corredor['_id'] ?>">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" required="required" value="<?= $corredor['nombre'] ?>">
            <br />
            <label for="dorsal">Dorsal:</label>
            <input type="number" name="dorsal" required="required" value="<?= $corredor['dorsal'] ?>">
            <br />
            <label for="salida">Salida:</label>
            <input type="text" pattern="([01]?[0-9]|2[0-3]):[0-5][0-9]:[0-5][0-9]" placeholder="00:00:00" name="salida" required="required" value="<?= $corredor['salida'] ?>">
            <br />
            <label for="llegada">Salida:</label>
            <input type="text" pattern="([01]?[0-9]|2[0-3]):[0-5][0-9]:[0-5][0-9]" placeholder="00:00:00" name="llegada" required="required" value="<?= $corredor['llegada'] ?>">
            <br />
            <button type="submit">Guardar</button>
        </form>
        <a href="index.html">Volver al menu principal</a>
    </div>
</body>

</html>