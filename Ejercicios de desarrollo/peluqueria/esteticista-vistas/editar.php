<!DOCTYPE html>
<html>

<head>
    <title>Listado de esteticistas</title>
    <style>
        div {
            width: 50%;
            margin: 50px auto 0px;
        }
    </style>
</head>

<body>
    <div>
        <form method="post" action="esteticista-controlador.php?accion=editando">
            <input type="hidden" name="id" required="required" value="<?= $esteticista['_id'] ?>">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" required="required" value="<?= $esteticista['nombre'] ?>">
            <br />
            <label for="dni">Dni:</label>
            <input type="text" name="dni" required="required" value="<?= $esteticista['dni'] ?>">
            <br />
            <label for="telefono">Teléfono:</label>
            <input type="text" name="telefono" required="required" value="<?= $esteticista['telefono'] ?>">
            <br />
            <button type="submit">Guardar</button>
        </form>
    </div>
</body>

</html>