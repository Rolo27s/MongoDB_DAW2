<!DOCTYPE html>
<html>

<head>
    <title>Listado de corredores</title>
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

        a {
            display: block;
            width: 50%;
            margin: 0 auto;
        }

        h1 {
            text-align: center;
        }
    </style>
</head>
<h1>Lista de corredores</h1>
<hr />

<body>
    <?php
    if (isset($mensaje) && $mensaje != '') {
    ?>
        <div id="mensaje">
            <?= $mensaje ?>
        </div>
    <?php
    }
    ?>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Dorsal</th>
            <th>Salida</th>
            <th>Llegada</th>
            <th>Acciones</th>
        </tr>
        <script type="text/javascript">
            function confirmarEliminacion(id, nombreCorredor) {
                if (confirm('¿Estás seguro de que deseas eliminar al corredor ' + nombreCorredor + '?')) {
                    // Si el usuario confirma, redirige al controlador con la acción de eliminar
                    window.location.href = 'controlador.php?accion=eliminar&id=' + id;
                } else {
                    // Si el usuario cancela, no se hace nada
                    return false;
                }
            }
        </script>
        <?php
        foreach ($corredores as $fila) {
            echo "<tr>\n";
            echo "  <td>" . htmlspecialchars($fila['nombre']) . "</td>\n";
            echo "  <td>" . htmlspecialchars($fila['dorsal']) . "</td>\n";
            echo "  <td>" . htmlspecialchars($fila['salida']) . "</td>\n";
            echo "  <td>" . htmlspecialchars($fila['llegada']) . "</td>\n";
            echo "  <td>\n"; // Aquí irán las acciones (botones)
            echo "    <button onclick=\"location.href='controlador.php?accion=editar&id=" . htmlspecialchars($fila['_id']) . "'\">Editar</button>\n";
            echo "    <button onclick=\"confirmarEliminacion('" . htmlspecialchars($fila['_id']) . "', '" . htmlspecialchars($fila['nombre']) . "')\">Eliminar</button>\n";
            echo "  </td>\n";
            echo "</tr>\n";
        }
        ?>
        <tr>
            <td colspan="4">
                <button onclick="location.href='controlador.php?accion=insertar'">Insertar</button>
            </td>
        </tr>
    </table>
</body>

</html>