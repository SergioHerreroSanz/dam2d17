<form method="POST" action="store.php">
    <label id="titulo">Título</label>
    <input type="text" for="titulo" name="titulo">
    <br>
    <label id="precio">Precio</label>
    <input type="number" for="precio" name="precio" step="0.01">
    <br>
    <label id="fPub">Fecha de publicación</label>
    <input type="date" for="fPub" name="fPub">
    <br>
    <label id="disponible">Disponible</label>
    <input type="checkbox" for="disponible" name="disponible">
    <br>
    <button type="submit" name="accion" value="confirmar">Confirmar</button>
</form>

<a href="../index.php">Volver</a>