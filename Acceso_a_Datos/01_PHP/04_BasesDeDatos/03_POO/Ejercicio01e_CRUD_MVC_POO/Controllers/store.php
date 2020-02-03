<?php
if (!empty($_POST)) {
    require("../Models/funcions.php");

    $titulo = $_POST["titulo"];
    $precio = $_POST["precio"];
    $fPub = $_POST["fPub"];
    $disponible = 0;

    if (isset($_POST["disponible"])) {
        $disponible = 1;
    }
    $resultado = Libro::create($titulo, $precio, $fPub, $disponible);
    if ($resultado) {
        $aviso = $titulo . " dado de alta.";
        header("Location: ../index.php?aviso=" . $aviso);
    } else {
        $aviso = $titulo . " ya fue dado de alta.";
    }
}
