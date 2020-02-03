<?php
echo "
    <table border='1'>    
    <tr>
        <th>Id</th>
        <th>Título</th>
        <th>Precio</th>
        <th>Fecha</th>
        <th>Disponible</th>
    </tr>
";
echo "<tr>";
echo "<td>$datos->id</td>";
echo "<td>$datos->titulo</td>";  
echo "<td>$datos->precio\€</td>";  
echo "<td>" . date_format(date_create($datos->fPub), 'd-m-Y') . "</td>";  
if($datos->disponible==1){
    echo "<td>Si</td>";
} else {
    echo "<td>No</td>";
}
echo "</tr>";
echo "</table>";
?>