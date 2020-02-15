# T5. Desarrollo de componentes

## 5.1 Introducción

En este tema vamos a ver la creación de módulos para Odoo. Vamos a dividir el capítulo en dos partes bien diferenciadas. En la primera veremos el lenguaje de programación Python con sus características y la forma de utilizarlo, y en la segunda parte nos vamos a centrar en la creación de módulos y cual será su integración en un sistema funcional de Odoo.

Python es el lenguaje con el que esta programado Odoo, por lo que resulta imprescindible un conocimiento básico de este lenguaje para poder programar módulos para el sistema.

En esta primera parte vamos a abordar el lenguaje desde un enfoque práctico, centrándonos exclusivamente en aquellas partes del lenguaje que nos vayan a hacer falta. Odoo hace uso de la versión 3 de Python.

En la segunda parte veremos cual es el proceso de creación de módulos al igual que los procesos esenciales de la programación de estos. Como ya vimos, la metodología nos determina la forma en la que debemos proceder para generar un módulo. Nos va a indicar como realizar el análisis y el diseño para poder programar dicho modulo. Lo primero que tenemos que hacer es analizar el problema que tenemos determinando que es lo que queremos resolver, que datos son necesarios y cuales son las relaciones entre dichos datos. A parte de eso tendremos que tener control sobre el almacenamiento de esos datos con sus relaciones.

Para este análisis podremos usar tantas técnicas como sean necesarias, pero lo fundamental es que tengamos claro y por escrito el qué queremos hacer y como lo vamos a realizar.

## 5.2 El lenguaje de programación Python

Python surge en los años 90 en respuesta a una serie de necesidades plantadas por su desarrollador. Guido Van Rossum quería un lenguaje capaz de utilizarse para la programación de los servidores web y que fuera ante todo limpio y multiplataforma, que fuera además un lenguaje interpretado y orientado a objetos, incorporando los paradigmas de programación tradicional en un único lenguaje. Como curiosidad, comentar que el nombre del lenguaje viene del grupo de cómicos Monty Python y que es el lenguaje de infraestructura base en YouTube y Google lo usa como uno de sus 4 lenguajes base.

### 5.2.1 Comenzando con Python

Python es un lenguaje interpretado multiplataforma cuyo lenguaje se convierte en código objeto. Se generaran unos ficheros con extensiones .puc o .pyo la primera vez que se ejecute. Lo bueno de Python es que une lo mejor de los dos mundos, es decir, la flexibilidad de los lenguajes de script y la velocidad de un lenguaje compilado.

Python permite no declarar las variables para usarlas tal como ocurre en JavaScript aunque si que es obligatorio inicializarlas a algún valor a diferencia de algunos lenguajes orientados a objetos que las inicializan a un valor por defecto antes de su inicialización. Al no especificar el tipo de dato que se va a almacenar en una variable, esta podrá tener cualquier tipo de dato en cualquier momento, determinándose es tiempo de ejecución el tipo de esta. Las variables no son convertidas de forma automática de un tipo a otro, siendo necesaria una conversión por 'casting' para dicho uso. De forma que así un contenido numérico será transformado a texto antes de imprimirse. Python no permite asignaciones en línea como las asignaciones que se hacen en java.

```py
[a=b=c=3]
```

```java
if((a=nextRecord())!=null)
```

Es un lenguaje un lenguaje a objetos en el que define todo como a un objeto, incluso las funciones son declaradas como un objeto que definen atributos. Python permite la creación de clases y objetos e implementa la herencia, pero no limita el acceso a las propiedades y métodos que definamos.

Una característica muy importante de este lenguaje, que además suele provocar problemas al comienzo de su uso es la utilización de sangrado en su código. En Python no existen mecanismos de definición de bloques explícitos como pueda ocurrir en otros lenguajes como C o JavaScript. En Python el concepto de bloque se va a crear con el sangrado obligatorio del código, y además, un bloque va a comenzar con el caracter ':', y todo lo que deba ejecutarse dentro deberá estar sangrado con una serie de espacios en blanco. Toma mucha importancia el número de espacios en blanco que usemos, ya que deberán de tener ese mismo número de espacios todas las líneas del bloque, si no es así nos generará un error. Un fallo muy común es confundir el tabulador con el espacio.

Por último, comentar que existen diferentes implementaciones de Python según el lenguaje base que se haya utilizado. Así pues, CPython está escrito en C, JPython está escrito en Java, IronPython está escrito en C#. De todas estas versiones, quizás la mas recomendad es la versión de C por su madurez o estabilidad.

### 5.2.2- Tipos de datos básicos

La representación numérica utiliza valores enteros simples y enteros largos (3 para simples y 3L para largos), diferenciándose ambos en el valor máximo que pueden almacenar. Python también permite la notación tradicional octal (0o77 para v3 y 077 para v2). También podemos utilizar notación hexadecimal (0x25), decimal/coma flotante (25.45) y números complejos (2+7i). Lo único que hay que tener en cuenta es que el valor máximo de cada tipo dependerá de la implementación subyacente del intérprete y de la plataforma en la que se ejecute.

Los números en coma flotante se usan para representar valores decimales, siendo la precisión mínima expresada por Python en el estándar IEEE 754, significando que los valores estarán comprendidos entre $± 2^{-126}$ y $(2-2^{-23})×2^{127}$

Para aquellas situaciones para las que necesitemos mayor precisión utilizaremos el tipo decimal. Este tipo es un objeto específico de python que debe ser importado, proporcionando precisión de hasta 28 decimales. Los números decimales los podemos definir utilizando la notación científica si es necesario, y por último, comentar que el tipo complejo nos permite utilizar valores con parte real y parte imaginaria, operando de forma natural dichos números.

$2+3i$

Los operadores numéricos de los que dispondremos son:

| Operador | Valor           |
| :------- | :-------------- |
| `+`      | Suma            |
| `-`      | Resta           |
| `*`      | Multiplicación  |
| `/`      | División        |
| `//`     | División entera |
| `**`     | Exponenciación  |
| `%`      | Módulo          |

Para el tratamiento de bits tendremos los siguientes operadores:

| Operador | Valor                         |
| :------- | ----------------------------- |
| `&`      | And                           |
| `|`      | Or                            |
| `^`      | Xor                           |
| `~`      | Not                           |
| `<<`     | Desplazamiento a la izquierda |
| `>>`     | Desplazamiento a la derecha   |

Ya comentamos que para python todos los elementos son objetos, por lo que los tipos numéricos también lo son. Los números incorporan una serie de funciones matemáticas avanzadas como por ejemplo la función o el método raíz (`sqrt()`) o el método de logaritmo (`log10()`) En la pagina web de Python dispondremos la documentación de toda la librería matemática.

El siguiente tipo básico es el booleano. Lo vamos a utilizar para describir expresiones condicionales, y almacenaran expresamente el valor verdadero o falso (`true` o `false`). Para este tipo tenemos una serie de comandos especiales de comparación.

| Operador | Función       |
| :------- | :------------ |
| `and`    | Y             |
| `or`     | O             |
| `not`    | Negación      |
| `=`      | Igualdad      |
| `!=`     | Desigualdad   |
| `>`      | Mayor         |
| `>=`     | Mayor o igual |
| `<`      | Menor         |
| `<=`     | Menor o igual |

Las cadenas es el último de los tipos básicos de los que dispone Python. Podremos representar una cadena mediante comillas simples `'` o mediante comillas dobles `"`, pero nunca deberemos de mezclar las notaciones. Dentro de ambas notaciones será posible insertar caracteres especiales, mediante el uso de la barra invertida `\`, de forma que por ejemplo, `\t` va a representar el tabulador, `\n` nueva línea, y `\r` retorno de carro. Si no deseamos que la contrabarra se interprete junto al siguiente caracter antepondremos al caracter la definición de la cadena antes de las comillas (`\\`).

Por último, si nuestra cadena esta formada por caracteres UTF8, utilizaremos el caracter `u` como predecesor. Un mecanismo que tenemos como de definición de cadenas es el uso de 3 comillas simples al principio y al final de la cadena, De esta forma podremos partir una cadena en varias líneas, interpretando así los retornos de carro que introduzcamos.

Podremos utilizar el operador asterisco para crear una copia un numero de veces determinado de la cadena que queramos hacer. Las cadenas son también objetos por lo que se incorpora para su uso algunas funciones útiles, por ejemplo:

- `capitalize()`: Va a devolver una cadena con la primera letra en mayúscula
- `center(num)`: Centrará la cadena en el número de caracteres que le indiquemos usando espacios en blanco
- `ljust(num)` y `rjust(num)`: Van a justificar el texto a la izquierda y a la derecha respectivamente
- `count(subcadena)` va a devolver la cantidad de veces que aparece subcadena en la cadena.
- `find(subcadena)`: Va a devolver la primera posición en la que se encuentre la subcadena
- `upper()`: Convierte la cadena a mayúsculas
- `lower()`: Convierte la cadena a minúsculas
- `strip()`: Elimina los espacios en blanco en los extremos de la cadena
- `split(caracter)`: Va a dividir la cadena en subcadenas utilizando el caracter introducido como parámetro
- `splitlines()`: Va a dividir según el número de líneas
- `len(cadena)`: Devuelve el número de caracteres que contiene la cadena, además podremos utilizar esta función con cualquier objeto
- `join(cadena)`: Va a unir dos cadenas
- `format(valores)`: Formatea la cadena de entrada según los valores que se pasan

### 5.2.3- Diccionarios

Durante la programación existen situaciones en las que necesitamos acceder a un conjunto de información a través de una clave en vez de una posición. Este tipo de estructuras de denominan 'diccionarios' o 'tablas hash'. Python los incorpora como tipo base, su utilización es la siguiente: La declaración se realiza mediante llaves `{}` separando cada registro por una coma, y la clave de su valor por `:`. Una vez creada tendremos acceso a cada uno de los elementos mediante la notación de corchetes `[]`, introduciendo el valor de la clave utilizada en la definición, y nunca utilizaremos el valor de posición. Se utilizarán claves de los tipos básicos numéricos o cadenas, teniendo en cuenta además que la clave es sensible a capitalización. La clave no se podrá repetir ni variar una vez creada, aunque su contenido va a poder ser modificado en cualquier momento mediante la asignación por corchetes.

```py
valorDiccionario = {"clave1": "valor1", "clave2": "valor2"}

valorDiccionario{clave}
```

### 5.2.4- Listas

Vamos a usar el tipo de datos listas para aquellas estructuras tipo tabla que son dinámicas. La definición de una lista se realiza encerrando entre corchetes `{}` los valores que necesitamos almacenar, siendo estos de cualquier tipo posible, incluso otras tablas o diccionarios.

```py
list1=["Valor1", 2, 2+4j]
```

El acceso y modificación del contenido de las posiciones de la lista se va a realizar mediante un índice numérico, empezando dichos valores desde 0.

Los índices en las listas en python no tienen porque ser solo positivos, se pueden utilizar además valores negativos indicando que se empieza a contar desde el final.

```py
list1[-1]   //2+4j
list2
```

Además al conseguir varios elementos consecutivos de la lista como una nueva lista, se realiza con un proceso sencillo, indicando los índices inicial y final a conseguir. Dichos índices estarán separados por `:`. Este mecanismo también permite utilizar negativos. en caso de que no establezcamos ningún orden va a pasar desde el primero hasta el último.

Para las listas vamos a definir solo dos operadores, el operador concatenación `+` y el operador repetición `*`. Como ya dijimos las listas son dinámicas, por lo que puede variar el numero de elementos que lo constituye durante la ejecución del programa. Para implementar este mecanismo se ha dotado de una serie de métodos que lo permiten. Para aumentar los componentes tendremos 3 funciones:

- `append(valor)`: Añade el valor pasado al final de la tabla, de forma que incrementa el último índice.
- `insert(valor)`: Permite insertar en una posición un valor, de forma que desplaza el resto una posición hacia delante.
- `extends(lista)`: Concatena a la lista actual la lista que se le pase por parámetro, de forma que crea una nueva lista con todos sus valores. Este método, además, implementa la misma funcionalidad que el operador concatenación, pero de una forma mucho mas eficiente.

Para disminuir los componentes de una lista disponemos también de varios métodos:

- `pop([índice])`: Extraerá el último elemento de la lista si no se proporciona un índice. Si se proporciona un índice se extraerá el elemento en su posición.
- `remove(valor)`: Quitará el primer elemento de la lista que concuerde con el valor pasado. En caso de que no encuentre dicho valor devolverá un error.

Las listas tienen un orden predefinido, que es el que se encuentra al recorrer una lista desde la posición inicial a la final, de forma ascendente. Como el orden es importante en las listas, existen un par de métodos para realizar búsquedas sobre los contenidos:

- `index(valor)`: Devolverá la posición en la lista del valor pasado. Si no se encuentra devolverá un error.
- `in`: Esta palabra clave se usa para determinar si un valor se encuentra en alguna posición `a in list1`

Para terminar las listas hay una función que nos da la posibilidad de aplicar una operación a cada elemento de la lista a la vez que determinamos si dicho componente formará parte de la nueva lista

```py
varEle * 2 for varEle in listaValores if varEle%2!=0
```

Para cada elemento varEle que este en listaValores que sea impar, lo devolverá multiplicado por dos.

### 5.2.5- Tuplas

En python las tuplas se interpretan como listas inmutables tanto en tamaño como en contenido. Esta función va a permitir que sean mas ligeras que las listas y mucho más eficientes, por contra van a ser invariables. Para definir una tupla cambiaremos los corchetes de las listas por paréntesis `()`

```py
tVal1 = ("valor1", 2, 2+4j)
```

Accederemos de la misma manera que accedemos a las listas, es decir, utilizando corchetes.

```py
tVal1[1]
```

Tendremos que evitar usar la asignación de esta forma ya que no está permitido. Otra característica que comparte con las listas es el uso de los índices para seleccionar un elemento o un rango.

Las tuplas al ser objetos fijos no tienen los métodos que nos permiten modificar el contenido, solo tenemos presente el método `index(valor)` que va a devolver la posición del elemento que nos concuerde con el valor pasado.

Las listas y las tuplas son tipos de datos similares en cuanto a funcionamiento, por lo que será fácil crear una a partir de otra. Así, si tenemos una lista, con la llamada a la función `tuple(lista)` conseguiremos formar una tupla desde la lista pasada como parámetro. Si necesitamos una lista a partir de una tupla, llamaremos a la función `list(tupla)` a la que pasaremos una tupla como parámetro, así conseguiremos una lista modificable.

### 5.2.6 Variables

Una de las características en el entorno de python tomadas de JavaScript es la no obligatoriedad de definir una variable para su uso. Cuando se requiere utilizar una variable nueva simplemente le asignaremos un valor, y a partir de ese punto, la valor estará accesible para el programa. Si bien no es imprescindible su definición, la diferencia con JavaScript es el hecho de que es estrictamente necesario inicializar la variable antes de utilizarla. El lenguaje nos permite inicialmente asignarle a la variable un valor numérico para posteriormente poderle asignar una cadena de texto. Podremos hacer esto sin ningún problema ya que será el intérprete el que en tiempo de ejecución determine el tipo de dato.

Podemos definir dos tipos de variables según el ámbito en el que estén visibles.

- Globales: Tienen valor a lo largo de todo el programa, funciones o clases que definamos
- Locales: Tienen sentido solo dentro del bloque en el que se hayan declarado, como por ejemplo dentro de funciones.

Es factible usar el mismo valor en una variable global y en una variable global, el efecto es que la variable local dentro de la función enmascarará a la global siendo esta únicamente accesible.

Ya comentamos que no está permitida la asignación en línea como en otros lenguajes de programación, pero usando las tuplas podremos hacer una función parecida. Las tuplas nos van a permitir la reasignación entre si siendo factible que en la parte izquierda de un asignación aparezca una tupla de n elementos y en la parte derecha de la asignación aparezca otra tupla con la misma cantidad de elementos. El resultado es que cada elemento de la tupla izquierda va a tener asignado un valor de la tupla derecha.

Para imprimir por pantalla con un formato predeterminado una variable usaremos lo que se denomina 'cadena de formato'. A la función `print()` le pasaremos una cadena que especificará como deseamos imprimir las variables, pudiendo indicar la posición, tipo y formato de cada una de ellas a través de los caracteres de formato. La sintaxis de la cadena de formato es similar a la función de C `sprintf()` utilizando caracteres especiales que darán formato. Para separar la cadena de formato de los correspondientes valores a usar utilizaremos el caracter `%` seguido de una letra.

A la hora de imprimir con la función `print()` tenemos que señalar un par de características. Cuando separamos los valores por comas se imprimirá automáticamente un espacio entre ellos, sin embargo, cuando utilicemos el operador concatenación tendremos que añadir nosotros el espacio. Por otra parte es obligatorio convertir a cadena mediante la función `str()` [hasta 2.7].

Un problema que nos vamos a encontrar es la utilización de los caracteres acentuados y la ñ. aunque por defecto el código fuente se escriba en formato UTF8 la función d entrada `raw_input()` se configura de manera general, siendo imprescindible codificar los caracteres al lenguaje adecuado antes de imprimirlos usando la función `encode(normaISO)`. [Referencia](https://docs.python.org/2/library/sys.html).

En el lenguaje C se implementan las variables de sistema `argV` y `argC`. Bajo Python se ha seguido una nomenclatura similar creando una lista llamada `argV` que nos dará acceso a todos los parámetros que nos pasen desde el sistema. Para poder utilizarlo tendremos que importarlo con la cláusula `import sys`.

### 5.2.7- Controles de flujo

En Python no existen elementos para determinar el final de un bloque. Para establecer el contenido de dicho bloque se deberá sangrar el código con el mismo numero de espacios o tabuladores, de forma que todas las líneas que pertenezcan a dicho bloque tendrán el mismo sangrado, añadiendo además diferentes niveles de sangrado según el número de bloque necesitemos anidar. Para abandonar un bloque se eliminará dicho sangrado alineándolo con la sentencia que ha creado el bloque.

#### 5.2.7.1- Sentencias condicionales

##### If

Para realizar un determinado numero de sentencias en función de una condición utilizamos la clausula `if`. En su variante mas simple carece de la parte `else` y se ejecutarán todas las líneas cuando se cumpla la condición. La forma de usarla cuando se cumpla la parte `else` es ejecutándose la parte inmediatamente seguida a 'else' cuando la condición no se cumpla. Hay que destacar que en python carece de la clausula condicional `switch` o `case`, en su defecto tenemos la cláusula `elif`. Utilizaremos la estructura 'elif' tantas veces como sea necesario para simular la instrucción 'case'.

```py
if opcion = 1
    #CODIGO
elif opcion = 2
    #CODIGO
elif opcion = 3
    #CODIGO
elif opcion = 4
    #CODIGO
elif opcion = 5
    #CODIGO
elif opcion = 6
    #CODIGO
else
    #DEFAULT
```

Al igual que en otros lenguajes Python permite una estructura similar al operador condicional `?:`. En el siguiente ejemplo se imprimirá 0 si el valor.

```py
print("Cero" if (val == 0) else "Distinto de 0")    #Python 2.7
# TODO: Python 3
```

##### Bucles

###### For

Los bucles son las siguientes estructuras a ver. Para recorrer un objeto iterable como listas o tuplas se utilizan las estructuras `for`, que asignará a una variable uno de los elementos del objeto iterable y ejecutará las sentencias al comienzo de cada vuelta.

```py
for varElemento in ObjetoIterable
    #CODIGO
```

Aunque Python no tiene bucles clásico tipo C se puede simular fácilmente creando una lista con los valores numéricos deseados para posteriormente recorrer dicha lista con la estructura presentada. Para formar la lista se debe utilizar la función `range(inicio, final, [salto])` de forma que nos crea el conjunto de elementos a recorrer en vez de hacerlo a mano.
Una ultima construcción del bucle 'for' respecto a la sentencia 'if' nos va a permitir filtrar valores de listas.

```py
[elemento for elemento in lista if len(elemento) > 1]
```

Vamos a generar una nueva lista con los objetos que cumplan la condición, en este caso con aquellos objetos cuya longitud sea mayor de 1.

###### While

El siguiente bucle a conocer es el bucle `while`, aunque el bucle 'do while' no existe.

#### 5.2.7.2- Funciones para gestión de listas

Alguna de las funciones útiles que tendremos para la gestión de las listas de forma que nos permitan leerlas y modificarlas van a ser:

- `map(función, lista)`: Aplicara la función definida por el usuario a cada uno de los elementos, creando así una lista.
- `filter(función, lista)`: Creará una nueva lista únicamente con aquellos elementos que tras pasarlos a la función definida devuelva un valor verdadero.
- `reduce(función, lista)`: Opera dos a dos sobre los componentes de la lista hasta que obtiene un único resultado final reutilizando los resultados intermedios.
- `getattr(objeto, nombreMétodo)`: Ya hemos mencionado anteriormente que para python todo es un objeto, según esta característica decíamos que cualquier tipo básico es un objeto. Teniendo en cuenta a los métodos implementados por un objeto se puede conseguir en cualquier momento una referencia a una función. Con esta función obtendremos un puntero a dicho método en ese objeto. Podremos llamarlo añadiendo paréntesis y los parámetros necesarios.

#### 5.2.7.3- Operadores lógicos y funciones lambda

Hay ciertas características de los operadores lógicos importantes a comentar. En primer lugar los operadores lógicos funcionan en cortocircuito, es decir, cuando se ha determinado completamente el sentido de una expresión condicional no se seguirá evaluando el resto de la expresión. También hay que comentar que la representación del valor falso en python no es un valor único, sino un conjunto de valores que se pueden interpretar como tal. Esos valores son:

- `""`: Cadena vacía
- `()` Tupla vacía
- `{}`: Diccionario vacío
- `[]`: Lista vacía
- `0`: Cero
- `None`

El resto de valores se interpretaran como verdadero no estando determinado que valor se va a determinar en cada caso.

Con los conocimientos sobre los operadores lógicos podremos implementar de una manera mas eficiente el operador condicional `?:`, que esta presente en otros lenguajes de programación. Será de la siguiente forma:

```py
expresionBooleana and valorSiVerdadero or valorSiFalso
```

Esta construcción fallará únicamente en el caso en el que ValorSiVerdadero devuelve algún valor interpretable como falso, en cuyo caso los valores podrían convertirse en una lista y evitar el error.

Aparece una construcción tomada de los lenguajes funcionales llamada función lambda. Esta construcción nos va a permitir construir una función simple en el lugar que la necesitemos sin tener que definirla previamente.

```py
(lambda x: x*2)(3)
```

Pasado el parámetro 3 a la función en línea x*2 obteniendo en este caso el valor 12

### POO

Python recoge lo mejor de los lenguajes existentes y lo reutiliza para su beneficio. Además de ser un lenguaje estructurado es además un lenguaje orientado a objetos, de forma que incorpora la mayoría de los paradigmas de dicho lenguaje de programación. Para definir una clase utilizaremos la palabra reservada `class` seguida de el nombre deseado de la clase seguido de `:`. Todo el contenido de la clase llevará el sangrado oportuno. Cada método perteneciente a dicha clase va a ser creado como una función general, utilizando las características que hemos visto hasta ahora. Los métodos `getTipo()` y `setTipo()` son utilizados para establecer el valor de las propiedades tipo definidas en el constructor.

```py
_init__(self.tipo())
```

A la hora de definir métodos para una clase la única particularidad que debemos tener en cuenta es que el primer parámetro de cada método será un objeto. Será un objeto introducido por el intérprete cuando se llame. En caso del constructor dicho objeto es un nuevo objeto, en el resto de casos será el objeto que representa a si mismo.

La creación de propiedades se debe hacer en el constructor, dando valor a todas las propiedades que necesitamos en el objeto `self` que se pasa. El uso de las clases es similar al de cualquier lenguaje de programación orientada a objetos, definiendo una variable y asignando el valor. Para ello pasaremos entre paréntesis los valores del construcción excepto el parámetro 'self'.

##### Herencia

El concepto de herencia se implementa acompañando al nombre de las clases de las que hereda, separadas por comas y encerrándolas entre paréntesis. Como la herencia conlleva trasvases de métodos y propiedades estas deberán ser inicializadas adecuadamente, de forma que el constructor de la clase hija llame al constructor de la clase padre de forma que inicialicemos primero el contenido de la clase padre y a continuación de la clase nuestra.

##### Sobrecarga

Python no permite la sobrecarga de los métodos de un padre, entonces va a utilizar la última condición que encuentre. No podremos llamar a diferentes métodos sssssss del tipo de la variable ya que esto esta prohibido. El último sssss de la programación orientada a objetos es ssss. Este punto en python es muy simple ya que no existe ningún tipo de protección, todo va a ser público y accesible. En principio python va a definir como métodos y propiedades privados a todo aquello que empiece por dos guiones bajos `__`, pero el mecanismo interior del intérprete será renombrar dicho intérprete anteponiendo el nombre de la clase seguido del objeto, de forma que aquella propiedad supuestamente privada nos va a dar una excepción al intentar acceder directamente a ella. Si por contra utilizamos la propiedad en nombre de la clase tendremos acceso a ella.
