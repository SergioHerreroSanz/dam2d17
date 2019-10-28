<!--
Escribir en un archivo, leer e imprimir.
-->

<html>
    <head>
        <title>Ejercicio02</title>
    </head>
    <body>
        <?php
            $f1=fopen("archivo.txt","w+");
            fwrite($f1,"Texto a escribir");

            echo "Se ha escrito el fichero."."<br>";
            rewind($f1);
            $contenido = fgets($f1);
            echo "El contenido del fichero es:"."<br>";
            echo $contenido;
        ?>    
    </body>
</html>

