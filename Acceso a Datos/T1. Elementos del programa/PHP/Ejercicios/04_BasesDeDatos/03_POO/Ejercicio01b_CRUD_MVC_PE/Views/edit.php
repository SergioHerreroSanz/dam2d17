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