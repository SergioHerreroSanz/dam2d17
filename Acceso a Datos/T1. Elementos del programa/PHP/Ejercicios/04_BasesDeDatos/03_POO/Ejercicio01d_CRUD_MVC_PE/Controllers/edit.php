<?php
require("../Models/funcions.php");

$id = $_GET["id"];
$rs = find($id);
$titulo = $rs->titulo;
$precio = $rs->precio;
$fPub = $rs->fPub;
$disponible = $rs->disponible;

include("../Views/edit.php");

if (!empty($_POST)) {
    $titulo = $_POST["titulo"];
    $precio = $_POST["precio"];
    $fPub = $_POST["fPub"];
    $disponible = 0;
    
    if (isset($_POST["disponible"])) {
        $disponible = 1;
    }
   
    $resultado = update($id, $titulo, $precio, $fPub, $disponible);
    $aviso = $titulo . " modificado";
    header("Location: ../index.php?aviso=" . $aviso);
}
