<!DOCTYPE html>
<html>

<head>
    <title>Listado de alumnos</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            margin: 50px auto 0px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        #mensaje {
            margin: 50px auto;
            padding: 15px;
            width: 50%;
            color: green;
            background-color: azure;
            text-align: center;
        }
    </style>
</head>

<body>
    <?php
    if (isset($mensaje) && $mensaje != '') {
    ?>
        <div id="mensaje"><?php echo $mensaje ?></div>
    <?php
    }
    ?>
    <table>
        <tr>
            <th>Nombre</th>
            <th>DNI</th>
            <th>Teléfono</th>
            <th>Acciones</th>
        </tr>
        <?php
        foreach ($alumnos as $fila) {
            echo "<tr>\n";
            echo "  <td>${fila['nombre']}</td>\n";
            echo "  <td>${fila['dni']}</td>\n";
            echo "  <td>${fila['telefono']}</td>\n";
            echo "  <td>\n";
            echo "    <button onclick=\"location.href='alum-controlador.php?accion=editar&id=${fila['_id']}'\">Editar</button>\n";
            echo "    <button onclick=\"location.href='alum-controlador.php?accion=eliminar&id=${fila['_id']}'\">Eliminar</button>\n";
            echo "  </td>\n";
            echo "</tr>\n";
        }
        ?>
        <tr>
            <td colspan="4">
                <button onclick="location.href='alum-controlador.php?accion=insertar'">Insertar</button>
            </td>
        </tr>
    </table>
</body>

</html>