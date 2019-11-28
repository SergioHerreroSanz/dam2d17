<?php
require("../Models/funcions.php");

$id = $_GET["id"];
$rs = find($id);
$titulo = $rs[0]["titulo"];
$precio = $rs[0]["precio"];
$fPub = $rs[0]["fPub"];
$disponible = $rs[0]["disponible"];

include("../Views/edit.php");

if (!empty($_POST)) {
    $titulo = $_POST["titulo"];
    $precio = $_POST["precio"];
    $fPub = $_POST["fPub"];
    $disponible = 0;
    if ($titulo != "") {
        $hayTitulo = true;
    } else {
        $hayTitulo = false;
    }
    if ($precio != "") {
        $hayPrecio = true;
    } else {
        $hayPrecio = false;
    }
    if ($fPub != "") {
        $hayFPub = true;
    } else {
        $hayFPub = false;
    }
    if (isset($_POST["disponible"])) {
        $disponible = 1;
    }

    if ($hayTitulo && $hayPrecio && $hayFPub) {
        $resultado = update($id, $titulo, $precio, $fPub, $disponible);
        $aviso = $titulo . " modificado";
        header("Location: ../index.php?aviso=" . $aviso);
    } else {
        echo "Introduzca campos";
    }
}
?>