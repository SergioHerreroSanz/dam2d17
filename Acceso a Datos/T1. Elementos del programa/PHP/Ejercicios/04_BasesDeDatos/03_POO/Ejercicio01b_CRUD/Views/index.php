<?php
$aviso = "
        <table border='1'>    
            <tr>
                <th>Id</th>
                <th>Título</th>
                <th>Precio</th>
                <th>Fecha</th>
                <th>Disponible</th>
                <th>Acción</th>
            </tr>
        ";
foreach ($datos as $dato) {
    $aviso = $aviso . "<tr>";
    foreach ($dato as $campo) {
        $aviso = $aviso . "<td>" . $campo . "</td>";
    }
    $linkVer = "<a href='Controllers/show.php?id=" . $dato["id"] . "'>Ver</a>";
    $linkEdit = "<a href='Controllers/edit.php?id=" . $dato["id"] . "'>Editar</a>";
    $linkElim = "<a href='Controllers/destroy.php?id=" . $dato["id"] . "'>Eliminar</a>";
    $aviso = $aviso . "<td>" . $linkVer . " " . $linkEdit . " " . $linkElim . "</td>";
    $aviso = $aviso . "</tr>";
}
$aviso = $aviso . "</table>";

echo $aviso;
?>