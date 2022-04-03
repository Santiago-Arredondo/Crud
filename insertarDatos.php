<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar datos</title>
</head>

<body>
    <form action="insertarDatos.php" method="POST">
        <input type="text" name="texto" id="texto">
        <input type="submit" value="Añadir pendiente">
    </form>

    <div id="todolist">
        <?php

        $servidor = "localhost";
        $nombreusuario = "root";
        $password = "";
        $db = "todolistDB";

        $conexion = new mysqli($servidor, $nombreusuario, $password, $db);

        if ($conexion->connect_error) {
            die("Conexión fallida: " . $conexion->connect_error);
        }

        if (isset($_POST['texto'])) {
            $texto = $_POST['texto'];

            $sql = "INSERT INTO todoTable(texto, completado)
                                    VALUES('$texto', false)";

            if ($conexion->query($sql) === true) {
                echo '<div><form action=""><input type="checkbox">' . $texto . '</form></div>';
            } else {
                die("Error al insertar datos: " . $conexion->error);
            }
            //$conexion->close();
        }

        ?>
    </div>
</body>

</html>