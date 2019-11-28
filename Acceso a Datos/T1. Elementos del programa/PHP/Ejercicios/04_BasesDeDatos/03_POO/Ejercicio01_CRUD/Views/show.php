<a href="../index.php">Volver</a>
<?php
    $id=$_GET["id"];
    require("../Models/funcions.php");
    try {
        $datos = find($id);
    } catch (Exception $e) {
        echo $e . getMessage();
    }
    if ($datos) {
        $aviso = "
            <table border='1'>    
            <tr>
                <th>Id</th>
                <th>Título</th>
                <th>Precio</th>
                <th>Fecha</th>
                <th>Disponible</th>
            </tr>
        ";
        foreach ($datos as $dato) {
            $aviso = $aviso . "<tr>";
            foreach ($dato as $campo) {
                $aviso = $aviso . "<td>" . $campo . "</td>";
            }
            $aviso = $aviso . "</tr>";
        }
        $aviso = $aviso . "</table>";
    } else {
        $aviso = "No hay datos";
    }
    echo $aviso;
