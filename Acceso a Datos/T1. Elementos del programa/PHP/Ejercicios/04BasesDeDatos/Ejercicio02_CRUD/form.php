<!--
CRUD de una base de datos mySQL que lee un formulario con campos nombre y nota
-->

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Ejercicio02</title>
</head>

<body>
    <form action="./form.php" method="POST">
        <label id="nombre">Nombre</label>
        <input type="text" for="nombre" name="nombre">
        <br>
        <label id="nota">Nota</label>
        <input type="number" for="nota" name="nota">
        <br>
        <button type="submit" name="accion" value="alta">Alta</button>
        <button type="submit" name="accion" value="baja">Baja</button>
        <button type="submit" name="accion" value="mostrar">Mostrar</button>
        <button type="submit" name="accion" value="buscar">Buscar</button>
        <button type="submit" name="accion" value="modificar">Modificar</button>
    </form>
    <?php
    if (!empty($_POST)) {
        include("funciones.php");

        $con = mysqli_connect("localhost", "root", "", "dam2d");
        $nombre = $_POST["nombre"];
        $nota = $_POST["nota"];
        if ($nombre != "") {
            $hayNombre = true;
        } else {
            $hayNombre = false;
        }
        if ($nota != "") {
            $hayNota = true;
        } else {
            $hayNota = false;
        }

        switch ($_POST["accion"]) {
            case "alta":
                if ($hayNombre && $hayNota) {
                    $resultado = alta($con, $nombre, $nota);
                    if ($resultado) {
                        $aviso = $nombre . " con nota " . $nota . " dado de alta.";
                    } else {
                        $aviso = $nombre . " ya fue dado de alta.";
                    }
                } else {
                    $aviso = "Introduzca nombre y nota.";
                }
                echo $aviso;
                break;
            case "baja":
                if ($hayNombre) {
                    $resultado = baja($con, $nombre);
                    if ($resultado) {
                        $aviso = $nombre . " dado de baja.";
                    } else {
                        $aviso = "No se encontró a " . $nombre;
                    }
                } else {
                    $aviso = "Introduzca un nombre.";
                }
                echo $aviso;
                break;
            case "mostrar":
                $datos = mostrar($con);

                if ($datos) {
                    $aviso = "
                        <table border='1'>    
                            <tr>
                                <th>Nombre</th>
                                <th>Nota</th>
                            </tr>
                        ";
                    foreach ($datos as $dato) {
                        $aviso = $aviso . "<tr>";
                        foreach ($dato as $campo) {
                            $aviso = $aviso . "<td>" . $campo . "</td>";
                        }
                        $aviso = $aviso . "</tr>";
                    }
                    $aviso = $aviso . "</table>";
                } else {
                    $aviso = "No hay datos";
                }

                echo $aviso;
                break;
            case "buscar":
                if ($hayNombre) {
                    $resultado = buscar($con, $nombre);
                    if ($resultado[0]) {
                        $aviso = "La nota de " . $nombre . " es " . $resultado[1];
                    } else {
                        $aviso = "No se encontró a " . $nombre;
                    }
                } else {
                    $aviso = "Introduzca un nombre.";
                }
                echo $aviso;
                break;
            case "modificar":

                if ($hayNombre && $hayNota) {
                    $resultado = modificar($con, $nombre, $nota);
                    if ($resultado) {
                        $aviso = $nombre . " con nota " . $nota . " modificado";
                    } else {
                        $aviso = $nombre . " no encontrado.";
                    }
                } else {
                    $aviso = "Introduzca nombre y nueva nota.";
                }

                echo $aviso;
                break;
        }
    } ?>
</body>

</html>