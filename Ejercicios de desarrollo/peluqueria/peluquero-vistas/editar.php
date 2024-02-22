<!DOCTYPE html>
<html>

<head>
    <title>Listado de peluqueros</title>
    <style>
        div {
            width: 50%;
            margin: 50px auto 0px;
        }
    </style>
</head>

<body>
    <div>
        <form method="post" action="peluquero-controlador.php?accion=editando">
            <input type="hidden" name="id" required="required" value="<?= $peluquero['_id'] ?>">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" required="required" value="<?= $peluquero['nombre'] ?>">
            <br />
            <label for="dni">Dni:</label>
            <input type="text" name="dni" required="required" value="<?= $peluquero['dni'] ?>">
            <br />
            <label for="telefono">Teléfono:</label>
            <input type="text" name="telefono" required="required" value="<?= $peluquero['telefono'] ?>">
            <br />
            <button type="submit">Guardar</button>
        </form>
    </div>
</body>

</html>