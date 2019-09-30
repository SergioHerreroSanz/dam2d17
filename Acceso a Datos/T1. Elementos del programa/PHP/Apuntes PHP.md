# PHP
PHP es una variación de HTML que contiene etiquetas especiales interpretadas por el servidor. Así cuando se enviá la información al cliente (navegador), este recibe una página web sin instancias PHP, en la que no queda rastro del código interpretado, como si se tratase de una página HTML normal. Si se intentase abrir un archivo PHP directamente desde el cliente, las instancias no se interpretarían y serian obviadas o mostradas como texto, pero serían visibles en el código fuente.
```
<?php 
	CÓDIGO
?>
```

## Escribir
Para imprimir una cadena de texto o el contenido de una variable se usa la palabra `echo`.
```
echo "TEXTO";
echo var;
```

## Comentarios
Se comenta igual que en Java.
```
// LÍNEA COMENTADA
/* TEXTO COMENTADO */
```

## Concatenar
Se concatena con un punto `.` o con una coma `,`. Para concatenar valores numéricos solo se puede utilizar la coma.
```
echo "Hola"."Mundo";
echo 1,2,3,4,5;
```

## Constantes
Las constantes se definen con un método, asignando de golpe el nombre de la variable con su valor.
```
define(String nomVar, valor);
define("edad", 19);
```


## Variables
Las variables se definen con un operador de igual `=`. Por convención los nombres empiezan por `$`.
```
$nombre = "Sergio"
```

## Constantes de Sistema
\_\_FILE__: Devuelve la ruta en la que se encuentra el archivo PHP desde el que se la llama.
\_\_LINE__: Indica la línea de código en la que se encuentra la llamada.
PHP_VERSION: Devuelve la versión del servidor PHP.
PHP_OS: Indica el Sistema operativo en el que se esta ejecutando el servidor.

## Formularios
Los formularios envían una serie de datos en forma de array que se almacenan en una variable global. Según el método de envío se almacena en `$_GET` o en `$_POST`. Accedemos a cada campo de la siguiente forma: 
```
$_GET[NOMBRECAMPO];
$_POST[NOMBRECAMPO];
```