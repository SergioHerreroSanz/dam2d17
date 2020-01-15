<!--
Leer un archivo e imprimirlo por pantalla.
-->

<html>
    <head>
        <title>Ejercicio01</title>
    </head>
    <body>
        <?php
            $contenido = readfile("archivo.txt");
            echo $contenido;
        ?>    
    </body>
</html>