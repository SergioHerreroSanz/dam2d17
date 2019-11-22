<?php
require("funciones.php");

$id = $_GET["id"];
$rs = mostrarWhere($id);
$nombre = $rs[0]["nombre"];
$nota = $rs[0]["nota"];
?>

<a href="index.php">Volver</a>
<form method="POST">
    <label id="nombre">Nombre</label>
    <input type="text" for="nombre" name="nombre" value="<?php echo $nombre ?>">
    <br>
    <label id="nota">Nota</label>
    <input type="number" for="nota" name="nota" value="<?php echo $nota ?>">
    <br>
    <button type="submit" name="accion" value="editar">Guardar</button>
</form>

<?php

if (!empty($_POST)) {
    $nombre = $_POST["nombre"];
    $nota = $_POST["nota"];
    if ($nombre != "") {
        $hayNombre = true;
    } else {
        $hayNombre = false;
    }
    if ($nota != "") {
        $hayNota = true;
    } else {
        $hayNota = false;
    }

    if ($hayNombre && $hayNota) {
        $resultado = modificar($id, $nombre, $nota);
        $aviso = $nombre . " con nota " . $nota . " modificado";
        header("Location: index.php?aviso=" . $aviso);
    } else {
        echo "Introduzca nombre y nueva nota.";
    }
}
?>