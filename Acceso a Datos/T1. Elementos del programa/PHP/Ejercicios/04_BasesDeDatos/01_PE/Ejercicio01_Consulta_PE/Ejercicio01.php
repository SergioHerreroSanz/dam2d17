<!--
Conectar a una base de datos y mostrar una tabla
-->

<?php
$con = mysqli_connect("localhost", "root", "", "dam2d");
$alumnos = mysqli_query($con, "select * from alumnos where id=1");
$alu = mysqli_fetch_assoc($alumnos);
echo $alu["nombre"] . " " . $alu["nota"];
