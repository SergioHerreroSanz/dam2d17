<?php
echo "<a href='create.php'>Nuevo</a>" . "<br/>";

require("../Models/funcions.php");
try {
    $datos = all();
} catch (Exception $e) {
    echo $e->getMessage();
}
if ($datos) {
    include("../Views/index.php");
} else {
    echo "No hay datos" . "<br/>";
}

if (!empty($_GET["aviso"])) {
    echo $_GET["aviso"];
}
