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
        $rs = $st->fetchAll(PDO::FETCH_OBJ);
        return $rs;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function find($id)
{
    try {
        $st = conexion()->prepare("SELECT * FROM libros WHERE id= :id");
        $st->bindParam(":id", $id);
        $st->execute();
        $rs = $st->fetch(PDO::FETCH_OBJ);
        return $rs;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function create($titulo, $precio, $fPub, $disponible)
{
    try {
        $sql = "INSERT INTO libros(titulo, precio, fPub, disponible) VALUES (:titulo, :precio, :fPub, :disponible)";
        $st = conexion()->prepare($sql);
        $st->bindParam(":titulo", $titulo);
        $st->bindParam(":precio", $precio);
        $st->bindParam(":fPub", $fPub);
        $st->bindParam(":disponible", $disponible);
        return $st->execute();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}


function update($id, $titulo, $precio, $fPub, $disponible)
{
    try {
        $sql = "UPDATE libros SET titulo = :titulo, precio = :precio, fPub = :fPub, disponible = :disponible WHERE id= :id";
        $st = conexion()->prepare($sql);
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

function delete($id)
{
    try {
        $sql = "DELETE FROM libros WHERE id= :id";
        $st = conexion()->prepare($sql);
        $st->bindParam(":id", $id);
        return $st->execute();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

?>
<!--
-fetch_assoc -> object
-BindParam por nombres
-conexión por variables
-trycatch en controlador
no verificar datos en ultima version
-ver no va?
-Volver abajo
-Fecha en formato dd/mm/aaaa
-Disponible (si/no) en vez de 1/0
-Precio sin decimales
-->