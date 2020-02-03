<!--
    CRUD de una base de datos mySQL que lee un formulario con campos nombre y nota usando PDO
-->

<?php

require("conexion.php");

function all()
{
    try {
        $st = conexion()->prepare("SELECT * FROM libros");
        $st->execute();
        $rs = $st->fetchAll(PDO::FETCH_ASSOC);
        return $rs;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function find($id)
{
    try {
        $st = conexion()->prepare("SELECT * FROM libros WHERE id=?");
        $st->bindParam(1, $id);
        $st->execute();
        $rs = $st->fetchAll(PDO::FETCH_ASSOC);
        return $rs;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function create($titulo, $precio, $fPub, $disponible)
{
    try {
        $sql = "INSERT INTO libros(titulo, precio, fPub, disponible) VALUES (?, ?, ?, ?)";
        $st = conexion()->prepare($sql);
        $st->bindParam(1, $titulo);
        $st->bindParam(2, $precio);
        $st->bindParam(3, $fPub);
        $st->bindParam(4, $disponible);
        return $st->execute();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}


function update($id, $titulo, $precio, $fPub, $disponible)
{
    try {
        $sql = "UPDATE libros SET titulo = ?, precio = ?, fPub = ?, disponible = ? WHERE id=?";
        $st = conexion()->prepare($sql);
        $st->bindParam(1, $titulo);
        $st->bindParam(2, $precio);
        $st->bindParam(3, $fPub);
        $st->bindParam(4, $disponible);
        $st->bindParam(5, $id);
        return $st->execute();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function delete($id)
{
    try {
        $sql = "DELETE FROM libros WHERE id=?";
        $st = conexion()->prepare($sql);
        $st->bindParam(1, $id);
        return $st->execute();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

?>