<?php
function conexion()
{
    $db="dam2d";
    $user="root";
    $password="";
    try {
        $con = new PDO("mysql:host=localhost;dbname=$db", $user, $password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    return $con;
}
?>