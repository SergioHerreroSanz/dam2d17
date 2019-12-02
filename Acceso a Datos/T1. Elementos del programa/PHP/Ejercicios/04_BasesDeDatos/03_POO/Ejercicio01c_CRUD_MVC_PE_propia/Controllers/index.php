<head>
    <title>Ejercicio01</title>
</head>
<?php

$action = "";
if (isset($_GET["action"])) {
    $action = $_GET["action"];
}

switch ($action) {
    case "create":
        include("create.php");
        break;
    case "show":
        include("show.php");
        break;
    case "edit":
        include("edit.php");
        break;
    case "destroy":
        include("destroy.php");
        break;
    default:
        echo "<a href='../index.php?action=create'>Nuevo</a>" . "<br/>";
        require("../Models/funcions.php");
        try {
            $datos = all();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        if ($datos) {
            include("../Views/index.php");
        } else {
            echo "No hay datos" . "<br/>";
        }
        
        if (!empty($_GET["aviso"])) {
            echo $_GET["aviso"];
        }
        break;
}
