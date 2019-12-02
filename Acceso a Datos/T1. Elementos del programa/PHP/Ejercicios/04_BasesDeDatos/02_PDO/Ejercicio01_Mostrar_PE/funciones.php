<!--
    a) Index (rejilla)
    b) Ver en cada alumno con un boton, usando <a>
-->

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


function mostrar()
{
    try {
        $st = conexion()->prepare("SELECT * FROM alumnos");
        $st->execute();
        $rs = $st->fetchAll(PDO::FETCH_ASSOC);
        return $rs;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function mostrarWhere($id)
{
    try {
        $st = conexion()->prepare("SELECT * FROM alumnos WHERE id=?");
        $st->bindParam(1, $id);
        $st->execute();
        $rs = $st->fetchAll(PDO::FETCH_ASSOC);
        return $rs;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function alta($nombre, $nota)
{
    try {
        $sql = "INSERT INTO alumnos(nombre, nota) VALUES (?, ?)";
        $st = conexion()->prepare($sql);
        $st->bindParam(1, $nombre);
        $st->bindParam(2, $nota);
        return $st->execute();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>