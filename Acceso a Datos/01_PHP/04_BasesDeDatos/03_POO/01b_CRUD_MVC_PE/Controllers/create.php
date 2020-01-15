<?php
include("../views/create.php");

if (!empty($_POST)) {
    require("../Models/funcions.php");

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
        $resultado = create($titulo, $precio, $fPub, $disponible);
        if ($resultado) {
            $aviso = $titulo . " dado de alta.";
            header("Location: ../index.php?aviso=" . $aviso);
        } else {
            $aviso = $titulo . " ya fue dado de alta.";
        }
    } else {
        $aviso = "Introduzca campos.";
    }
    echo $aviso;
}
?>