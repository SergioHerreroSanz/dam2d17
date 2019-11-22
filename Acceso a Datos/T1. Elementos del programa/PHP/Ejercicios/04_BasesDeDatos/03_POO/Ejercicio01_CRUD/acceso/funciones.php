<!--
    CRUD de una base de datos mySQL que lee un formulario con campos nombre y nota usando PDO
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


function modificar($id, $nombre, $nota)
{
    try {
        $sql = "UPDATE alumnos SET nombre = ?, nota = ? WHERE id=?";
        $st = conexion()->prepare($sql);
        $st->bindParam(1, $nombre);
        $st->bindParam(2, $nota);
        $st->bindParam(3, $id);
        return $st->execute();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function eliminar($id)
{
    try {
        $sql = "DELETE FROM alumnos WHERE id=?";
        $st = conexion()->prepare($sql);
        $st->bindParam(1, $id);
        return $st->execute();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

?>