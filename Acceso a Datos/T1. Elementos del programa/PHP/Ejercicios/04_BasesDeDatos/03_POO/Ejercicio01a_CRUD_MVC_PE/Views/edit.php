<?php
require("../Models/funcions.php");

$id = $_GET["id"];
$rs = find($id);
$titulo = $rs[0]["titulo"];
$precio = $rs[0]["precio"];
$fPub = $rs[0]["fPub"];
$disponible = $rs[0]["disponible"];
?>

<a href="../index.php">Volver</a>
<form method="POST">
    <label id="titulo">Título</label>
    <input type="text" for="titulo" name="titulo" value="<?php echo $titulo ?>">
    <br>
    <label id="precio">Precio</label>
    <input type="number" for="precio" name="precio" value="<?php echo $precio ?>">
    <br>
    <label id="fPub">Fecha de publicación</label>
    <input type="date" for="fPub" name="fPub" value="<?php echo $fPub ?>">
    <br>
    <label id="disponible">Disponible</label>
    <input type="checkbox" for="disponible" name="disponible" <?php if ($disponible == 1) {echo "checked";} ?>>
    <br>
    <button type="submit" name="accion" value="editar">Guardar</button>
</form>

<?php

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