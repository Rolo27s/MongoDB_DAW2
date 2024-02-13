<!DOCTYPE html>
<html>

<head>
    <title>Listado de alumnos</title>
    <style>
        div {
            width: 50%;
            margin: 50px auto 0px;
        }
    </style>
</head>

<body>
    <div>
        <form method="post" action="alum-controlador.php?accion=editando">
            <input type="hidden" name="id" required="required" value="<?php echo "${alumno['_id']}"; ?>">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" required="required" value="<?php echo "${alumno['nombre']}"; ?>">
            <br />
            <label for="dni">Nombre:</label>
            <input type="text" name="dni" required="required" value="<?php echo "${alumno['dni']}"; ?>">
            <br />
            <label for="telefono">Teléfono:</label>
            <input type="text" name="telefono" required="required" value="<?php echo "${alumno['telefono']}"; ?>">
            <br />
            <button type="submit">Guardar</button>
        </form>
    </div>
</body>

</html>