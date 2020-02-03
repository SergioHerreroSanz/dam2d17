<!--
    identificar que ha dado un nombre y pass correcta
-->

<form action="ver.php" method="get">
    
    <label for="nombre">Nombre:</label>
    <input type="text" name="txtNombre" id="nombre"><br><br>

    <label for="pass">Contraseña:</label>
    <input type="text" name="txtPass" id="pass"><br><br>

    <input type="submit" value="INICIAR SESIÓN">

</form>

<?php
if ($_SESSION["log"]){
    echo "Autenticado";
} else {
    echo "No autenticado";
}
?>