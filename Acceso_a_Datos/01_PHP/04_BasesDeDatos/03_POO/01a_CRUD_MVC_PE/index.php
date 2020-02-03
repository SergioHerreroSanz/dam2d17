<!--
    CRUD de una base de datos mySQL que lee un formulario con campos nombre y nota usando PDO
-->

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Ejercicio01</title>
</head>

<body>
    <a href="Views/create.php">Nuevo</a><br />
    <?php

    require("Models/funcions.php");
    try {
        $datos = all();
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    if ($datos) {
        include("Views/index.php");
    } else {
        echo "No hay datos" . "<br/>";
    }

    if (!empty($_GET)) {
        echo $_GET["aviso"];
    }
    ?>
</body>

</html>