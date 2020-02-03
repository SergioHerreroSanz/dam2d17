<a href="index.php">Volver</a>
<?php
require("../Models/funcions.php");
$id = $_GET["id"];
$resultado = delete($id);
if ($resultado) {
    $aviso = "Eliminado satisfactoriamente";
    header("Location: ../index.php?aviso=$aviso");
} else {
    echo "Algo salió mal";
}
?>