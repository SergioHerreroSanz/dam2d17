echo "<a href="../index.php">Volver</a>"
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
