<a href="index.php">Volver</a>
<form method="POST">
    <label id="nombre">Nombre</label>
    <input type="text" for="nombre" name="nombre">
    <br>
    <label id="nota">Nota</label>
    <input type="number" for="nota" name="nota">
    <br>
    <button type="submit" name="accion" value="alta">Alta</button>
</form>
<!--
    a) Index (rejilla)
    b) Ver en cada alumno con un boton, usando <a>
-->

<?php
if (!empty($_POST)) {
    require("funciones.php");

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
        $resultado = alta($nombre, $nota);
        if ($resultado) {
            $aviso = $nombre . " con nota " . $nota . " dado de alta.";
            header("Location: index.php?aviso=" . $aviso);
        } else {
            $aviso = $nombre . " ya fue dado de alta.";
        }
    } else {
        $aviso = "Introduzca nombre y nota.";
    }
    echo $aviso;
}
?>