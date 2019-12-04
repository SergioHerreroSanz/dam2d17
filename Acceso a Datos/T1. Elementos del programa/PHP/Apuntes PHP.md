- [PHP](#php)
	- [1- Basics](#1--basics)
		- [1.1- Escribir](#11--escribir)
		- [1.2- Comentarios](#12--comentarios)
		- [1.3- Concatenar](#13--concatenar)
		- [1.4- Constantes](#14--constantes)
		- [1.5- Variables](#15--variables)
		- [1.6- Constantes de Sistema](#16--constantes-de-sistema)
		- [1.7- Formularios](#17--formularios)
		- [1.8- Inyección de código HTML y JavaScript](#18--inyecci%c3%b3n-de-c%c3%b3digo-html-y-javascript)
		- [1.9- Recorrer arrays](#19--recorrer-arrays)
		- [1.10- Formatos de fecha](#110--formatos-de-fecha)
		- [1.11- Formatos de salida](#111--formatos-de-salida)
	- [2- Ficheros](#2--ficheros)
		- [2.1- Inclusión de ficheros](#21--inclusi%c3%b3n-de-ficheros)
		- [2.2- Ficheros externos](#22--ficheros-externos)
			- [Apertura](#apertura)
			- [Manejar punteros](#manejar-punteros)
			- [Lectura](#lectura)
			- [Escritura](#escritura)
			- [Otras funciones](#otras-funciones)
	- [3- Cookies y sesiones](#3--cookies-y-sesiones)
		- [3.1- Cookies](#31--cookies)
			- [Enviar](#enviar)
			- [Recibir](#recibir)
		- [3.2- Sesiones](#32--sesiones)
			- [Inicio de sesión y configuración](#inicio-de-sesi%c3%b3n-y-configuraci%c3%b3n)
			- [Creación de variables](#creaci%c3%b3n-de-variables)
			- [Recibir](#recibir-1)
	- [4- BD](#4--bd)
		- [4.1- Procedimental](#41--procedimental)
			- [Conexión](#conexi%c3%b3n)
			- [Consulta](#consulta)
		- [4.2- PDO (PHP data object)](#42--pdo-php-data-object)
			- [Conexión](#conexi%c3%b3n-1)
			- [Manejo de errores](#manejo-de-errores)
			- [Consulta](#consulta-1)
			- [Sentencias preparadas](#sentencias-preparadas)
				- [Crear](#crear)
				- [Enlazar](#enlazar)
				- [Ejecutar](#ejecutar)
				- [Recorrer](#recorrer)
			- [Cerrar la conexión](#cerrar-la-conexi%c3%b3n)
		- [4.2- POO (PHP data object)](#42--poo-php-data-object)

# PHP
PHP es una variación de HTML que contiene etiquetas especiales interpretadas por el servidor. Así cuando se envía la información al cliente (navegador), este recibe una página web sin instancias PHP, en la que no queda rastro del código interpretado, como si se tratase de una página HTML normal. Si se intentase abrir un archivo PHP directamente desde el cliente, las instancias no se interpretarían y serian obviadas o mostradas como texto, pero serían visibles en el código fuente.
```php
<?php 
	CÓDIGO
?>
```

## 1- Basics

### 1.1- Escribir
Para imprimir una cadena de texto o el contenido de una variable se usa la palabra `echo`, `print` o `print_r`.
```php
echo $variable;

print($variable);

print_r($variable);	//Imprime el contenido de elementos complejos (objetos, arrays)
```

### 1.2- Comentarios
Se comenta igual que en Java.
```php
// LÍNEA COMENTADA
/* TEXTO COMENTADO */
```

### 1.3- Concatenar
Se concatena con un punto `.` o con una coma `,`. Para concatenar valores numéricos solo se puede utilizar la coma.
```php
echo "Hola"."Mundo";	//HolaMundo
echo 1,2,3,4,5;			//12345
```

### 1.4- Constantes
Las constantes se definen con un método, asignando de golpe el nombre de la variable con su valor.
```php
define("nombre", "valor");
```
[Constantes](https://80.26.155.59/cursos/cursoPHP5/php13.php)

### 1.5- Variables
Las variables se definen con un operador de igual `=`. Por convención los nombres empiezan por `$`.
```php
$nombre = "Sergio";
```
Para destruir una variable usamos la función `unset()`.
```php
unset($nombre);
```
Comprobar el contenido:
* `isset($variable)`: Si está vacía la envía al servidor (no sabemos si el cliente la ha enviado vacía)
* `empty($variable)`: Si está vacía no la envía al servidor (sabemos si el cliente la ha enviado vacía)


[Practicando con variables y sus ámbitos](https://80.26.155.59/cursos/cursoPHP5/php14.php)
|
[Arrays bidimensionales](https://80.26.155.59/cursos/cursoPHP5/php27.php)

### 1.6- Constantes de Sistema
* `__FILE__`: Devuelve la ruta en la que se encuentra el archivo PHP desde el que se la llama.
* `__LINE__`: Indica la línea de código en la que se encuentra la llamada.
* `PHP_VERSION`: Devuelve la versión del servidor PHP.
* `PHP_OS`: Indica el Sistema operativo en el que se esta ejecutando el servidor.

### 1.7- Formularios
Los formularios envían una serie de datos en forma de array que se almacenan en una variable global. Según el método de envío se almacena en `$_GET` o en `$_POST`. Accedemos a cada campo de la siguiente forma: 
* `$_GET["nombreCampo"]`
* `$_POST["nombreCampo"]`
* `$_REQUEST["nombreCampo"]`: Accede a los datos de $_GET y $_POST

### 1.8- Inyección de código HTML y JavaScript
Al imprimir el texto introducido en formularios desde un PHP se vulnera al servidor, permitiendo ejecutar sentencias PHP o JavaScript. Para evitar la inyección de texto PHP creó una función `htmlspecialchars()` que se encarga de devolver el texto escapado para que no se pueda ejecutar si es malicioso.
```php
htmlspecialchars("TEXTO");
```

### 1.9- Recorrer arrays
Los arrays se recorren con métodos for (`for` y `foreach`). Los métodos `for` asignan a una variable un valor numérico que se autoincrementa en cada iteración hasta alcanzar la cantidad de elementos en el array, lo utilizamos como índice para acceder a cada uno de los valores del array.
```php
for ($i = 0; $i < count($a); $i++) {
	echo $array[$i], "<br/>";
}
```
Los métodos `foreach` asignan a una variable un valor de cada uno de los campos del array. Se puede obtener además otra variable a la que se le asignará el índice al que corresponde el valor.
```php
foreach ($array as $valor) {	//Arrays asociativos solo recorribles con este.
	echo $v, "<br/>";
}

foreach ($array as $indice => $valor) {
	echo "Indice ", $indice, " valor ", $valor, "<br/>";
}
```
### 1.10- Formatos de fecha
```php
$fecha = date('Y-m-j');
echo $fecha, "<br/>";
echo date("d-m-Y, strototime("12-11-1999"."- 1 year"));
```
[Funciones de fecha](https://80.26.155.59/cursos/cursoPHP5/php51.php)

### 1.11- Formatos de salida

## 2- Ficheros

### 2.1- Inclusión de ficheros
Para trabajar más cómodamente y separar los programas según la arquitectura MVC, PHP permite incluir ficheros. Esta inclusión se maneja como si el código dentro del fichero se encontrase en el archivo en el que se incluye.
```php
include("fichero.php");
require("fichero.php");			//El programa no compilará si no encuentra el fichero
include_once("fichero.php");	//Evita duplicidades
```
### 2.2- Ficheros externos

#### Apertura
Antes de trabajar con un fichero debemos asociar a una variable la ruta a su ubicación y el modo del que se le va a tratar:
```php
$f1 = fopen("fichero.txt", "modo")
```
Existen los siguientes modos:
<div style="display: none">
| Valor | Modo                                  | Puntero  |
| ----- | ------------------------------------- | -------- |
| r     | lectura                               | Comienzo |
| r+    | lectura y escritura                   | Comienzo |
| w     | creado y borrado, escritura           | Comienzo |
| w+    | creado y borrado, lectura y escritura | Comienzo |
| a     | creado y escritura                    | Final    |
| a+    | creado, lectura y escritura           | Final    |
</div>

| Valor | Creado | Borrado | Lectura | Escritura | Puntero  |
| ----- | :----: | :-----: | :-----: | :-------: | :------: |
| r     |        |         |    X    |           | Comienzo |
| r+    |        |         |    X    |     X     | Comienzo |
| w     |   X    |    X    |         |     X     | Comienzo |
| w+    |   X    |    X    |    X    |     X     | Comienzo |
| a     |   X    |         |         |     X     |  Final   |
| a+    |   X    |         |    X    |     X     |  Final   |

#### Manejar punteros
* `feof($f1)`: Devuelve verdadero si se ha alcanzado el final.
* `rewind($f1)`:Mueve el puntero al principio del fichero.
* `fseek($f1, $posición)`: Mueve el puntero a la posición indicada (en bytes).
* `ftell($f1)`: Devuelve la posición del puntero (en bytes).

#### Lectura
Podemos diferenciar la lectura de archivos según si han sido abiertos o no, si no han sido abiertos:
* `readfile($f1)`: Imprime el contenido del fichero sin necesidad de echo, y devuelve el tamaño del fichero en bytes.
* `file($f1)`: Devuelve un array escalar que contiene las filas del fichero.

Han sido abiertos en un modo que permite la lectura:
* `fpassthru($f1)`: Igual que `readfile()`.
* `fgets($f1, [$longitud])`: Devuelve un string desde la posición del fichero hasta eof, \n o la longitud indicada (en bytes).
* `fgetc($f1)`: Devuelve el caracter siguiente a la posición del puntero.

En los ejercicios almacenamos los campos de una base de datos separados por `|`, para obtener cada campo usamos la función `explode`, que devuelve un array escalar.
```php
$campos = explode($delimitador, $string);
```
#### Escritura
* `fwrite($f1, $texto, [$longitud])`: Añade el string al archivo hasta alcanzar el número de caracteres indicados. 
* `fputs($f1, $texto, [$longitud])`: Igual que `fwrite()`.

#### Otras funciones
* `fclose($f1)`: Cierra el fichero.
* `copy("rutaOriginal", "rutaCopia")`: Crea una copia de un fichero.
* `rename("rutaOriginal", "rutNueva")`: Cambia el nombre del archivo y lo mueve si es necesario, si ya existe lo sobrescribe.

[Todas las funciones](https://80.26.155.59/cursos/cursoPHP5/php55.php)

## 3- Cookies y sesiones
### 3.1- Cookies
Las cookies son variables que se almacenan en el cliente y están programadas para eliminarse pasado un tiempo.

#### Enviar
Se utiliza la función `setcookie()`, que creará una cookie con el nombre y valor indicado y se eliminará cuando se alcance la fecha introducida. Normalmente se usa `time()` mas un número para la caducidad (la fecha actual mas el tiempo deseado en segundos).
```php
setcookie("nombre", $valor, $caducidad);
```

#### Recibir
Se accede a los valores de las cookies como si se tratase de los campos de un formulario, salvo por que se usa la variable global `$_COOKIE`.
```php
echo $_COOKIE["nombre"];
```

[Cookies](https://80.26.155.59/cursos/cursoPHP5/php70.php)

### 3.2- Sesiones
Las sesiones son variables que se almacenan en el cliente y se borran cuando finaliza su sesión (finaliza el proceso).

#### Inicio de sesión y configuración
Se deben definir las opciones en el siguiente orden:
* `session_cache_limiter()`: Por defecto es `nocache`. //TODO, preguntar al profesor.
* `session_name("nombre")`: Establece el nombre de la sesión, por defecto es `PHPSESSID`.
* `session_start()`: Crea una sesión o conecta con la definida por `session_name()`.

#### Creación de variables
Se crearán mediante la variable superglobal `$_SESSION`. Accediendo a uno de sus índices se creará automáticamente.
```php
$_SESSION["nombre"] = $valor;
```

#### Recibir
Se accede a los valores de las variables como si se tratase de los campos de un formulario, salvo por que se usa la variable global `$_SESSION`. Si está definida pero no asignada devuelve `null`.
```php
echo $_SESSION["nombre"];
```

[Sesiones I](https://80.26.155.59/cursos/cursoPHP5/php71.php)
|
[Sesiones II](https://80.26.155.59/cursos/cursoPHP5/php72.php)

## 4- BD

### 4.1- Procedimental

#### Conexión
Se debe definir la conexión a la base de datos y almacenarla en una variable que utilizaremos como parámetro para indicar sobre que base de datos se deben de ejecutar las instrucciones. para ello utilizamos la función `mysqli_connect()`.
```php
$url = "localhost";
$user = "root";
$password = "";
$db = "alumnos";

$con = mysqli_connect($url, $user, $password, $db);
```

#### Consulta
Antes de realizar una consulta debemos definir en un string una sentencia SQL. Este string lo pasaremos como parámetro junto con la conexión a la función `mysqli_query()`, que devolverá `false` en caso de error o un objeto `mysqli_result` en el caso de las sentencias `SELECT`, `SHOW`, `DESCRIBE` o `EXPLAIN` satisfactorias. Para el resto de las sentencias devolverá `true`. Para acceder a los cursores almacenados en el objeto `mysqli_result` usaremos las funciones `mysqli_fetch_assoc()`, `mysqli_fetch_array()` o `mysqli_fetch_all()`, que devolverán un array asociativo, escalar o ambos.
```php
$alumnos = mysqli_query($con, "sql");
while ($alu = mysqli_fetch_assoc($alumnos)) {		//Devuelve un cursor
	echo $alu['nombre'] . " " . $alu['nota'];		//Muestra el cursor
}
```

### 4.2- PDO (PHP data object)

#### Conexión
Definimos la conexión creando un objeto PDO. En su constructor indicamos la información de conexión, usuario y contraseña. La información de conexión deba estar estructurado de una forma concreta: `TIPO:host=URL;dbname=NOMBRE`.
```php
$dsn= "mysql:host=localhost;dbname=dam2d"
$user = "root";
$password = "";

$con = new PDO($dsn, $user, $password);
```

#### Manejo de errores
Al crear la conexión activamos el modo de errores con `PDO::ATTR_ERRMODE` y lo establecemos en modo excepción con `PDO::ERRMODE_EXCEPTION` en el método `setAttribute()`. Capturamos la excepción y obtenemos el código de error con la función `errorInfo()` y el mensaje con `getMessage()`.
```php
try{
	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOEception $e){
	echo "Error " . $e->errorInfo() . ": " . $e->getMessage();
}
```

#### Consulta
Se utiliza la función `query()` para obtener un objeto `PDOStatement` que utilizaremos para obtener cursores con la función `fetch`. Estos cursores serán tanto asociativos como escalares.
```php
$alumnos = $con->query("sql");
while($alu=$alumnos->fetch()){					//Devuelve un cursor
	echo $alu["nombre"] . " " . $alu["nota"];	//Muestra el cursor
}
```
query para select y exec para delete, update e insert //TODO

#### Sentencias preparadas
##### Crear
Creamos la sentencia preparada con la función `prepare()`. La sentencia debe referir los valores que se introducirán posteriormente como texto que se buscará y sustituirá en el paso siguiente o sustituyéndolos por `?`.
```php
$sql = "SELECT * FROM nombreTabla where id=?";	//Valores: "nombreTabla", ?
$st = $con->prepare($sql)
```

##### Enlazar
Con la función `bindParam()` asignaremos los valores a la sentencia. en el primer parámetro introduciremos el nombre que hemos asignado al valor o la posición de `?` y en el segundo parámetro introduciremos el valor.
```php
$st->bindParam("nombreTabla", $nombre);
$st->bindParam(1, $id);
```

##### Ejecutar
Ejecutaremos la sentencia con el método `execute()`.
```php
$st->execute();
```

##### Recorrer
El método `fetch()` devuelve un cursor que será tanto asociativo como escalar, y el método `fetchAll()` devuelve un array que contiene todos los cursores.
```php
while($fila= $st->fetch()){
	echo $fila["nombre"] . " " . $fila["nota"];
}

$alumnos = $st->fetchAll();
```

#### Cerrar la conexión
Se puede cerrar la conexión mediante el método `close()` o asignado la variable el valor `null`.
```php
$con->close();

$con=null;
```

### 4.2- POO (PHP data object)
A partir de ahora accederemos a los valores de la base de datos mediante objetos. Para que una consulta nos devuelva un objeto en lugar de una array escalar o asociativo cambiaremos el argumento de la función `fetch()` (`PDO::FETCH_ASSOC`) por `PDO::FETCH_OBJ`.
```php
$st = $con->prepare($sql);
$st->execute();
$rs = $st->fetchAll(PDO::FETCH_OBJ);
```
Para acceder a los valores usaremos el operador flecha indicando el nombre del campo al que queremos acceder.
```php
$rs->nombre;	//Devuelve el valor nombre del registro
$rs->nota;		//Devuelve el valor nota del registro
```