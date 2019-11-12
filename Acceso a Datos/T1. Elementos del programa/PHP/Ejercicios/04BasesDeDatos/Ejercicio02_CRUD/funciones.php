<!--
CRUD de una base de datos mySQL que lee un formulario con campos nombre y nota
-->

<?php
function alta($con, $nombre, $nota)
{
    $resultado = mysqli_query($con, "INSERT INTO alumnos (nombre, nota) VALUES ('" . $nombre . "', '" . $nota . "')");
    return $resultado;
}

function baja($con, $nombre)
{
    $resultado = mysqli_query($con, "DELETE FROM alumnos WHERE nombre='" . $nombre . "'");

    return $resultado;
}

function mostrar($con)
{
    $alumnos = mysqli_query($con, "SELECT * FROM alumnos");
    while ($alu = mysqli_fetch_assoc($alumnos)) {
        $resultado[] = array($alu["nombre"], $alu["nota"]);
    }
    return $resultado;
}

function buscar($con, $nombre)
{
    $nota = 0;
    $encontrado = false;

    $alumnos = mysqli_query($con, "SELECT * FROM alumnos WHERE nombre='" . $nombre . "'");
    while ($alu = mysqli_fetch_assoc($alumnos)) {
        $encontrado = true;
        $nota = $alu["nota"];
    }

    return array($encontrado, $nota);
}

function modificar($con, $nombre, $nota)
{
    $encontrado = false;

    $alumnos = mysqli_query($con, "SELECT * FROM alumnos WHERE nombre='" . $nombre . "'");
    while ($alu = mysqli_fetch_assoc($alumnos)) {
        $encontrado = mysqli_query($con, "UPDATE alumnos SET nota = " . $nota . " WHERE nombre = '" . $nombre . "'");
    }

    return $encontrado;
}
?>