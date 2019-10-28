<!--
Formulario con campos nombre y nota que al enviar añade en un archivo separados por `|`
-->

<html>
    <head>
        <title>Ejercicio03</title>
    </head>
    <body>
        <?php
            if(!empty())
            $f1=fopen("alumn.txt","w+");
            fwrite($f1,"Texto a escribir");

            
            rewind($f1);
            $contenido = fgets($f1);
        ?>    
    </body>
</html>
