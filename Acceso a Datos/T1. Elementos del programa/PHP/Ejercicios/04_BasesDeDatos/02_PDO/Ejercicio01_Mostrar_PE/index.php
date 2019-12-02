<!--
    a) Index (rejilla)
    b) Ver en cada alumno con un boton, usando <a>
-->

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Ejercicio02</title>
</head>

<body>
    <a href="nuevo.php">Nuevo</a>
    <?php

    require("funciones.php");
    try {
        $datos = mostrar();
    } catch (Exception $e) {
        echo $e . getMessage();
    }
    if ($datos) {
        $aviso = "
            <table border='1'>    
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Nota</th>
                    <th>Acción</th>
                </tr>
            ";
        foreach ($datos as $dato) {
            $aviso = $aviso . "<tr>";
            foreach ($dato as $campo) {
                $aviso = $aviso . "<td>" . $campo . "</td>";
            }
            $linkVer = "<a href='ver.php?id=" . $dato["id"] . "'>Ver</a>";
            $linkEdit = "<a href='editar.php?id=" . $dato["id"] . "'>Editar</a>";
            $linkElim = "<a href='eliminar.php?id=" . $dato["id"] . "'>Eliminar</a>";
            $aviso = $aviso . "<td>" . $linkVer . " " . $linkEdit . " " . $linkElim . "</td>";
            $aviso = $aviso . "</tr>";
        }
        $aviso = $aviso . "</table>";
    } else {
        $aviso = "No hay datos";
    }

    echo $aviso;

    if (!empty($_GET)) {
        echo $_GET["aviso"];
    }
    ?>
</body>

</html>