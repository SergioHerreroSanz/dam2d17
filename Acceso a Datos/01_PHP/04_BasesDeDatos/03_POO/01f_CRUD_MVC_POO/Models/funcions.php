<!--
    CRUD de una base de datos mySQL que lee un formulario con campos nombre y nota usando PDO
-->

<?php

require("conexion.php");
class Libro{
static function all()
{
    try {
        $st = Database::conexion()->prepare("SELECT * FROM libros");
        $st->execute();
        $rs = $st->fetchAll(PDO::FETCH_OBJ);
        return $rs;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

static function find($id)
{
    try {
        $st = Database::conexion()->prepare("SELECT * FROM libros WHERE id= :id");
        $st->bindParam(":id", $id);
        $st->execute();
        $rs = $st->fetch(PDO::FETCH_OBJ);
        return $rs;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

static function create($titulo, $precio, $fPub, $disponible)
{
    try {
        $sql = "INSERT INTO libros(titulo, precio, fPub, disponible) VALUES (:titulo, :precio, :fPub, :disponible)";
        $st = Database::conexion()->prepare($sql);
        $st->bindParam(":titulo", $titulo);
        $st->bindParam(":precio", $precio);
        $st->bindParam(":fPub", $fPub);
        $st->bindParam(":disponible", $disponible);
        return $st->execute();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}


static function update($id, $titulo, $precio, $fPub, $disponible)
{
    try {
        $sql = "UPDATE libros SET titulo = :titulo, precio = :precio, fPub = :fPub, disponible = :disponible WHERE id= :id";
        $st = Database::conexion()->prepare($sql);
        $st->bindParam(":titulo", $titulo);
        $st->bindParam(":precio", $precio);
        $st->bindParam(":fPub", $fPub);
        $st->bindParam(":disponible", $disponible);
        $st->bindParam(":id", $id);
        return $st->execute();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

static function delete($id)
{
    try {
        $sql = "DELETE FROM libros WHERE id= :id";
        $st = Database::conexion()->prepare($sql);
        $st->bindParam(":id", $id);
        return $st->execute();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
}
?>