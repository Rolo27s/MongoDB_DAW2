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
        <form method="post" action="controlador.php?accion=insertando">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" required="required">
            <br />
            <label for="dorsal">Dorsal:</label>
            <input type="number" name="dorsal" required="required">
            <br />
            <label for="salida">Salida:</label>
            <input type="text" pattern="([01]?[0-9]|2[0-3]):[0-5][0-9]:[0-5][0-9]" placeholder="00:00:00" name="salida" required="required">
            <br />
            <label for="llegada">Salida:</label>
            <input type="text" pattern="([01]?[0-9]|2[0-3]):[0-5][0-9]:[0-5][0-9]" placeholder="00:00:00" name="llegada" required="required">
            <br />
            <button type="submit">Insertar</button>
        </form>
        <a href="index.html">Volver al menu principal</a>
    </div>
</body>

</html>