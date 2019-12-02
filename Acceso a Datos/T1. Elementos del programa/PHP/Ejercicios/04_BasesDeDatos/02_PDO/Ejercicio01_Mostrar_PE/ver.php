<!--
    a) Index (rejilla)
    b) Ver en cada alumno con un boton, usando <a>
-->

<a href="index.php">Volver</a>
<?php
    $id=$_GET["id"];
    require("funciones.php");
    try {
        $datos = mostrarWhere($id);
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
