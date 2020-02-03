<?php
function conexion()
{
    try {
        $con = new PDO("mysql:host=localhost;dbname=dam2d", "root", "");
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    return $con;
}
?>