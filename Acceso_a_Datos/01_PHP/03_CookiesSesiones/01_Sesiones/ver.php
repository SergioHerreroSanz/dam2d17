<?php
session_start();

$_SESSION["log"] = true;

$_SESSION["nombre"] = "Sergio";
$_SESSION["pass2"]=  "1234";

if ($_SESSION["nombre"] == $_GET["txtNombre"] && $_SESSION["pass"] == $_GET["txtPass"]) {
    echo "Logeado";
    
} else {
    header("Location: http://localhost:/Acceso a Datos/03_CookiesSesiones/Ejercicio01_Cookies/Ejercicio01.php");
}