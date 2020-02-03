<a href="../index.php">Volver</a>
<?php
$id = $_GET["id"];
require("../Models/funcions.php");
try {
    $datos = find($id);
} catch (Exception $e) {
    echo $e . getMessage();
}
if ($datos) {
    include("../Views/show.php");
} else {
    echo "No hay datos";
}
?>