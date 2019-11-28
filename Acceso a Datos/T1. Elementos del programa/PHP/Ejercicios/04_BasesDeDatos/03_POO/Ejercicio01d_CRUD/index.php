<!--
    CRUD de una base de datos mySQL que lee un formulario con campos nombre y nota usando PDO
-->

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Ejercicio02</title>
</head>

<body>
    <?php
    if (isset($_GET["aviso"])){
        $aviso = $_GET["aviso"];
    } else {
        $aviso = "";
    }
    header("Location: Controllers/index.php?aviso=" . $aviso);
    ?>
</body>

</html>