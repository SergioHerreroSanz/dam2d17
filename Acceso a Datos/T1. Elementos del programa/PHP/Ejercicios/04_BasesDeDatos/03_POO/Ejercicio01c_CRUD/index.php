<!--
    CRUD de una base de datos mySQL que lee un formulario con campos nombre y nota usando PDO
-->
<?php
$action = "";
$aviso = "";
$id = "";

if (isset($_GET["action"])) {
    $action = $_GET["action"];
}
if (isset($_GET["aviso"])) {
    $aviso = $_GET["aviso"];
}
if (isset($_GET["id"])) {
    $id = $_GET["id"];
}

header("Location: Controllers/index.php?action=$action&aviso=$aviso&id=$id");
?>