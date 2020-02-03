<?php
$id = $_GET["id"];
require("../Models/funcions.php");

$datos = Libro::find($id);
if ($datos) {
    include("../Views/show.php");
} else {
    echo "No hay datos";
}

echo "<a href='../index.php'>Volver</a>";
?>