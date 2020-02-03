<!--
CRUD de una base de datos que lee un formulario con campos nombre y nota, se almacena con el formato nombre|nota
-->


<?php
function alta($nombre, $nota)
{
    $existe = false;
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
        $resultado = false;
    } else {
        $f1 = fopen("alumn.txt", "a");
        fwrite($f1, $nombre . "|" . $nota . "\n");
        $resultado = true;
    }
    return $resultado;
}

function baja($nombre)
{
    $resultado = false;
    $f1 = fopen("alumn.txt", "r");
    $nuevo = "";

    while (!feof($f1)) {
        $linea = fgets($f1);
        if (explode('|', $linea)[0] != $nombre) {
            $nuevo = $nuevo . $linea;
        } else {
            $resultado = true;
        }
    }
    fclose($f1);

    $f1 = fopen("alumn.txt", "w");
    fwrite($f1, $nuevo);

    return $resultado;
}

function mostrar()
{
    $f1 = fopen("alumn.txt", "r");

    $linea = fgets($f1);
    if ($linea != "") {
        while (!feof($f1)) {
            $campos = explode('|', $linea);
            $resultado[] = array($campos[0], $campos[1]);
            $linea = fgets($f1);
        }
    }
    return $resultado;
}

function buscar($nombre)
{
    $nota = 0;
    $encontrado = false;

    $f1 = fopen("alumn.txt", "r");
    $linea = fgets($f1);
    while (!feof($f1) && !$encontrado) {
        $campos = explode('|', $linea);
        if ($nombre == $campos[0]) {
            $encontrado = true;
            $nota = $campos[1];
        }
        $linea = fgets($f1);
    }

    return array($encontrado, $nota);
}

function modificar($nombre, $nota)
{
    $nuevo = "";
    $encontrado = false;

    $f1 = fopen("alumn.txt", "r");
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
    }
    return $encontrado;
}
?>