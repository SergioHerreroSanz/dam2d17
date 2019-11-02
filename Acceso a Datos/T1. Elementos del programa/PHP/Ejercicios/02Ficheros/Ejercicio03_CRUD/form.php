<!--
CRUD de una base de datos que lee un formulario con campos nombre y nota, se almacena con el formato nombre|nota
-->

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Ejercicio03</title>
</head>

<body>
    <form action="./Ejercicio03.php" method="POST">
        <label id="nombre">Nombre</label>
        <input type="text" for="nombre" name="nombre">
        <br>
        <label id="nota">Nota</label>
        <input type="number" for="nota" name="nota">
        <br>
        <button type="submit" name="accion" value="alta">Alta</button>
        <button type="submit" name="accion" value="baja">Baja</button>
        <button type="submit" name="accion" value="mostrar">Mostrar</button>
        <button type="submit" name="accion" value="buscar">Buscar</button>
        <button type="submit" name="accion" value="modificar">Modificar</button>
    </form>
</body>

</html>