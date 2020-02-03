<!--
CRUD de una base de datos que lee un formulario con campos nombre y nota, se almacena con el formato nombre|nota
-->


<?php
include("form.php");
if (!empty($_POST)) {
    switch ($_POST["accion"]) {
        case "alta":
            $nombre = $_POST["nombre"];
            $nota = $_POST["nota"];
            $existe = false;

            if ($nombre != "" && $nota != "") {
                $f1 = fopen("alumn.txt", "r");
                $linea = fgets($f1);
                while (!feof($f1)) {
                    $campos = explode('|', $linea);
                    if ($nombre == $campos[0]) {
                        $existe = true;
                    }
                    $linea = fgets($f1);
                }
                fclose($f1);

                if ($existe) {
                    echo $nombre . " ya fue dado de alta.";
                } else {
                    $f1 = fopen("alumn.txt", "a");

                    fwrite($f1, $nombre . "|" . $nota . "\n");
                    echo $nombre . " con nota " . $nota . " dado de alta.";
                }
            } else {
                echo "Introduzca nombre y nota.";
            }

            break;
        case "baja":
            $nombre = $_POST["nombre"];

            if ($nombre != "") {
                $f1 = fopen("alumn.txt", "r");

                $nuevo = "";
                while (!feof($f1)) {
                    $linea = fgets($f1);
                    if (explode('|', $linea)[0] != $_POST["nombre"]) {
                        $nuevo = $nuevo . $linea;
                    }
                }
                fclose($f1);

                $f1 = fopen("alumn.txt", "w");
                fwrite($f1, $nuevo);
                echo $_POST["nombre"] . " dado de baja.";
            } else {
                echo "Introduzca un nombre.";
            }
            break;
        case "mostrar":
            $f1 = fopen("alumn.txt", "r");

            $linea = fgets($f1);
            if ($linea != "") {
                echo
                    "
                <table border='1'>    
                    <tr>
                        <th>Nombre</th>
                        <th>Nota</th>
                    </tr>
                ";
                while (!feof($f1)) {
                    $campos = explode('|', $linea);
                    echo "<tr>";
                    echo "<td>" . $campos[0] . "</td>";
                    echo "<td>" . $campos[1] . "</td>";
                    echo "</tr>";
                    $linea = fgets($f1);
                }
            } else {
                echo "No hay datos";
            }
            break;
        case "buscar":
            $nombre = $_POST["nombre"];
            $encontrado = false;
            if ($nombre != "") {
                $f1 = fopen("alumn.txt", "r");
                $linea = fgets($f1);
                while (!feof($f1) && !$encontrado) {
                    $campos = explode('|', $linea);
                    if ($nombre == $campos[0]) {
                        echo "La nota de " . $nombre . " es " . trim($campos[1]) . ".";
                        $encontrado = true;
                    }
                    $linea = fgets($f1);
                }
                if (!$encontrado) {
                    echo "No se encontró a " . $nombre . ".";
                }
            } else {
                echo "Introduzca un nombre.";
            }
            break;
        case "modificar":
            $nombre = $_POST["nombre"];
            $nota = $_POST["nota"];
            $f1 = fopen("alumn.txt", "r");
            if ($nombre != "" && $nota != "") {
                $nuevo = "";
                $encontrado = false;
                while (!feof($f1)) {
                    $linea = fgets($f1);
                    if (explode('|', $linea)[0] != $nombre) {
                        $nuevo = $nuevo . $linea;
                    } else {
                        $nuevo = $nuevo . $nombre . "|" . $nota . "\n";
                        $encontrado = true;
                    }
                }
                fclose($f1);
                if ($encontrado) {
                    $f1 = fopen("alumn.txt", "w");
                    fwrite($f1, $nuevo);
                    echo $nombre . " con nota " . $nota . " modificado.";
                } else {
                    echo $nombre . " no encontrado.";
                }
            } else {
                echo "Introduzca nombre y nueva nota.";
            }
            break;
    }
}

?>