<!--
Formulario con campos nombre y nota que al enviar añade en un archivo separados por `|`
-->


<?php
include("form.php");
if (!empty($_POST)) {
    switch ($_POST["accion"]) {
        case "alta":
            echo alta();
            break;
        case "baja":
            echo baja();
            break;
        case "mostrar":
            echo $mostrar;
            break;
        case "buscar":
            echo buscar();
            break;
        case "modificar":
            echo modificar();
            break;
    }
}


function alta()
{
    $resultado = "";
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
            $resultado = $nombre . " ya fue dado de alta.";
        } else {
            $f1 = fopen("alumn.txt", "a");

            fwrite($f1, $nombre . "|" . $nota . "\n");
            $resultado = $nombre . " con nota " . $nota . " dado de alta.";
        }
    } else {
        $resultado = "Introduzca nombre y nota.";
    }

    return $resultado;
}

function baja()
{
    $resultado = "";
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
        $resultado = $_POST["nombre"] . " dado de baja.";
    } else {
        $resultado =  "Introduzca un nombre.";
    }
    return $resultado;
}

function mostrar()
{
    $resultado = "";
    $f1 = fopen("alumn.txt", "r");

    $linea = fgets($f1);
    if ($linea != "") {
        $resultado = $resultado .
            "
                <table border='1'>    
                    <tr>
                        <th>Nombre</th>
                        <th>Nota</th>
                    </tr>
            ";
        while (!feof($f1)) {
            $campos = explode('|', $linea);
            $resultado = $resultado . "<tr>";
            $resultado = $resultado . "<td>" . $campos[0] . "</td>";
            $resultado = $resultado . "<td>" . $campos[1] . "</td>";
            $resultado = $resultado . "</tr>";
            $linea = fgets($f1);
        }
    } else {
        $resultado = "No hay datos";
    }
    return $resultado;
}

function buscar()
{
    $resultado = "";
    $nombre = $_POST["nombre"];
    $encontrado = false;
    if ($nombre != "") {
        $f1 = fopen("alumn.txt", "r");
        $linea = fgets($f1);
        while (!feof($f1) && !$encontrado) {
            $campos = explode('|', $linea);
            if ($nombre == $campos[0]) {
                $resultado = "La nota de " . $nombre . " es " . trim($campos[1]) . ".";
                $encontrado = true;
            }
            $linea = fgets($f1);
        }
        if (!$encontrado) {
            $resultado = "No se encontró a " . $nombre . ".";
        }
    } else {
        $resultado = "Introduzca un nombre.";
    }
    return $resultado;
}

function modificar()
{
    $resultado = "";
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
            $resultado = $nombre . " con nota " . $nota . " modificado.";
        } else {
            $resultado = $nombre . " no encontrado.";
        }
    } else {
        $resultado = "Introduzca nombre y nueva nota.";
    }
    return $resultado;
}

?>