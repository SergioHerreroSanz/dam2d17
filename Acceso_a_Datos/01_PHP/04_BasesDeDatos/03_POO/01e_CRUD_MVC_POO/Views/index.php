<?php
echo "
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
    echo "<tr>";  
    echo "<td>" . $dato->id . "</td>";
    echo "<td>" . $dato->titulo . "</td>";  
    echo "<td>" . $dato->precio . "€</td>";  
    echo "<td>" . date_format(date_create($dato->fPub), 'd-m-Y') . "</td>";  
    if($dato->disponible==1){
        echo "<td>Si</td>";
    } else {
        echo "<td>No</td>";
    }  
    $linkVer = "<a href='show.php?id=" . $dato->id . "'>Ver</a>";
    $linkEdit = "<a href='edit.php?id=" . $dato->id . "'>Editar</a>";
    $linkElim = "<a href='destroy.php?id=" . $dato->id . "'>Eliminar</a>";
    echo "<td>" . $linkVer . " " . $linkEdit . " " . $linkElim . "</td>";
    echo "</tr>";
}
echo "</table>";
