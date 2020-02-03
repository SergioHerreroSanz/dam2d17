<?php
require("../Models/funcions.php");

$id = $_GET["id"];
$rs = Libro::find($id);
$titulo = $rs->titulo;
$precio = $rs->precio;
$fPub = $rs->fPub;
$disponible = $rs->disponible;

include("../Views/edit.php");
