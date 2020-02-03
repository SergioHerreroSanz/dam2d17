<a href="index.php">Volver</a>
<?php
require("funciones.php");
$id = $_GET["id"];
$resultado = eliminar($id);
if ($resultado) {
    $aviso = "Eliminado satisfactoriamente";
    header("Location: index.php?aviso=" . $aviso);
} else {
    echo "Algo salió mal";
}
?>