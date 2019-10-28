<!--
Formulario con campos nombre y nota que al enviar añade en un archivo separados por `|`
-->

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Ejercicio03</title>
</head>

<body>
    <form action="./Ejercicio02.php" method="POST">
        <label id="nombre">Nombre</label>
        <input type="text" for="nombre" name="nombre">
        <br>
        <label id="nota">Nota</label>
        <input type="text" for="nota" name="nota">
        <br>
        <input type="submit">
    </form>
</body>

</html>