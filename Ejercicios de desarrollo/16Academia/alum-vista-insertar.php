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
            <form method="post" action="alum-controlador.php?accion=insertando">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" required="required">
                <br/>
                <label for="dni">Dni:</label>
                <input type="text" name="dni" required="required">
                <br/>
                <label for="telefono">Teléfono:</label>
                <input type="number" name="telefono" required="required">
                <br/>
                <button type="submit">Guardar</button>
            </form>
        </div>
    </body>
</html>