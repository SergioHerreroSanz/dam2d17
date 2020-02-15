# TEMA 5. Confección de informes

## 5.1- Introducción

Al planear la creación de una aplicación una de las consideraciones más importantes es la posibilidad de inserción de informes. Los informes de una aplicación se pueden dividir en dos grandes grupos desde el punto de vista del diseño y la inclusión sobre la propia aplicación. Van a ser informes incrustados e informes no incrustados. Un informe incrustado es un informe que se ha importado a un proyecto o que ha sido creado dentro de él. Cuándo se incrusta un informe dentro de un proyecto automáticamente se genera una clase contenedora para el informe. Cuándo se importa o se crea el informe en el proyecto la clase contenedora va a tener el mismo nombre que el propio informe y esta clase va a representar el informe dentro de todo el ámbito del proyecto. Cuándo esto ocurre todo el código del proyecto va a interactuar con la clase del informe en vez de hacerlo con el propio archivo del informe en sí.

En el caso de que sea una aplicación compilada tanto el informe cómo su clase contenedora se incrustarán en el ensamblado. Lo mismo ocurriría en cualquier otro recurso, módulo, paquete o clase del proyecto.

En VS hay una clase contenedora denominada `ReportDocument` y en Java existen varias cómo `JasperReports`.

Por otra parte, herramientas muy utilizadas en ofimática cómo por ejemplo Microsoft Access nos permite generar también informes incrustados.

- Informes incrustados
- Informes no incrustados

Un informe no incrustado es aquel externo al proyecto. Van a existir muchas formas de tener acceso a dicho informe y cargarlo dentro de nuestro proyecto. Se podrá habilitar la iteración con el informe mediante programación pero siempre será un informe externo.

A un informe no incrustado siempre se va a tener acceso externamente a través de diferentes formas cómo por ejemplo:

1. El informe puede estar en una unidad de disco duro en una ruta de directorio de archivo.
2. El informe puede estar dispuesto cómo servicio web de informes y exponerse en formato HTML o XML.
3. El informe puede formar parte de un grupo de informes expuestos a través de herramientas externas cómo por `CrystalReports`, que es un generador de informes de gran influencia dentro del mercado profesional. Este nos va a permitir generar informes no incrustados.

Nunca se importan informe No incrustados en un proyecto, por lo tanto tampoco se va a generar ninguna clase contenedora del informe. En su lugar lo que ocurrirá es que se va a cargar el informe no incrustado en uno de los modelos de objetos en tiempo de ejecución. Es decir cuándo se está llamando a la funcionalidad del informe.

Si se desea simplificar la implementación del proyecto es preferible utilizar informes incrustados.

Los informes estructurados van a tener menos archivos con los que trabajar y no será necesario preocuparse en qué ruta están situadas dichos archivos. Además, esta solución es aconsejable siempre y cuándo los informes no se expongan a modificaciones tras el compilado del proyecto.

Los informes no estructurados son mas sencillos y seguros pero por contra requieren de más trabajo. La ventaja es que podremos modificar su diseño sin tener que volver a compilar todo el proyecto. En el caso de que los informes se deban modificar regularmente va a ser mejor utilizar informes no estructurados para facilitar su acceso y la modificación de estos, de forma que no tengamos que preocuparnos de tener que compilar dos ensamblados cada vez que hagamos modificaciones sobre los informes.

> Los informes estructurados pueden tener un límite en su tamaño.
>
> Un informes estructurados de mucho tamaño va a ser utilizado cómo un informes no estructurados
>
> Los informes no estructurados van a tener ventajas de escalabilidad.

## 5.2- Estructura general. Secciones

- Encabezado del informe:

  Se va a imprimir una sola vez al inicio del informe y puede contener información cómo el logo de la empresa, fechas, número del informe, etc.

- Encabezado de página:

  En esta sección es en la que se escribe en cada pagina información relativa a la empres. Puede contener anotaciones generales como por ejemplo si es una factura, la dirección del cliente, el nombre de la factura, etc.

- Encabezado del informe:

  En esta sección es donde vamos a alojar los campos del origen de datos, es decir, almacenaremos las filas o registros que generaran la información del informe.

- Pie de informe:

  Es una seccion que se va a imprimir una sola vez al finalizar el informe. Una utilización común parra esta seccione es la de imprimir datos totales generales, promedios, etc.

- Pie de página:

  Es la sección en la que se imprime al final de cada página y es utilizada normalmente para dar datos de paginación, datos totales por página, etc.

Aunque no se deben contener obligatoriamente todas las secciones, si será aconsejable mantener una estructura y orden x secciones, ya que esto nos va a posibilitar la reutilización de esta estructura para otros informes.

Los datos que aparecen en el informe finalizado van a depender de las opciones de organización, en particular, los datos del informe van a variar dependiendo de las secciones en las que desee insertar objetos de datos. Por ejemplo, si se inserta un objeto gráfico en el encabezado del informe, el gráfico aparecerá una única vez al principio del informe, y organizará los datos que contenga el informe.

## 5.3- Informes con agrupamiento. Recuentos parciales

Los informes van a necesitar separar los datos en diferentes grupos. Así será mas fácil la lectura del propio informe y el análisis de sus datos. Podremos agrupar los datos del informe de manera que muestren relaciones jerárquicas, y así al agrupar los datos se va a ordenar la información según su relación entre ambos campos. En los datos en los que se utilicen en el informe deberá haber una información jerárquica establecida. Las pautas que podremos seguir en las agrupaciones serán:

- Para que el programa reconozca una relación entre los campos principal y secundario, ambos deben pertenecer al mismo tipo de datos.
- Los datos del campo principal deben ser un subconjunto de los datos del campo secundario.
- Para que el novel superior de la jerarquía aparezca en el informe el valor debe aparecer en los datos secundarios.
- No puede existir una lógica circular en los datos, es decir, A no podrá estar relacionado con B si B esta relacionado con C y C a su vez Esta relacionado con A.

Por ejemplo, si se desea mostrar una estructura jerárquica por ssssssss podremos ordenar

usando el campo de datos que muestra a quien informa el empleado. Otro agrupamiento sería hacer un listado por departamentos siendo el campo principal el id de departamento y el secundario los empleados que sssssssss a él.

## 5.4- Filtrado de datos

Se van a poder definir filtros en una región de datos para seleccionar o excluir partes del conjunto de datos de dicha región.

Los filtros limitan los datos que se muestran al usuario tras la recuperación de todos los datos. Dado que se recupera el conjunto completo de datos y luego se filtra cuando se genera el informe, es posible que en informe no sea tan bueno como cuando el informe recibe datos filtrados de la base de datos.

De esta forma, en los agrupamientos puede ser interesante el filtrado de datos como por ejemplo el listado de empleados por departamentos que obtuvieron un mínimo de ventas o pertenezcan a una determinada ciudad.

## 5.5- Encabezados y pies

Se podrán insertar encabezados y pies de página poniendo la información en dichas secciones. Algunas pautas importantes que debemos seguir son:

- La información que aparezca será solo en la primera página del informe cuando vaya a la sección encabezado del informe
- La información que aparecerá solo en la última página del informe deberá ir en el pie de informe.
- La información que aparecerá al principio de cada página del informe irá en la sección encabezado de página.
- La información que aparecerá al final de cada página del informe irá en el pie de página.

Podremos usar texto, campos o fórmulas en estas secciones tal y como podremos hacer en la sección de detalles.

## 5.6- Numeración de líneas, recuentos totales

Cuando calculamos un resumen o totalizamos los datos hay que dividir en grupos y realizar la operación especificada sobre los valores de cada grupo

- Campo que deseamos resumir o totalizar
- Tipo de operación que se va a realizar con ese campo (media, subtotales, etc.)
- Campo que va a desencadenar un nuevo grupo siempre que cambie su valor, como por ejemplo modificaciones del IVA.
- Orden de clasificación

## 5.7- Valores calculados

Para insertar un subtotal de un campo numérico algunas herramientas suelen traer asistentes para facilitar la creación de campos calculados. Se podrán generar valores calculados. Para ello habrá que crear un campo de formula y ponerlo en el informe, como por ejemplo trayendo las fechas de pedido y de recibo de la base de datos y calculando el número de días que han transcurrido.

En otros casos como python, será necesario generar mediante código la obtención de dichos resultados para incluirlos en el informe final, incluso podremos utilizar el lenguaje SQL para que determinados valores sean obtenidos a través de las 'queries'

## 5.8- Subinformes

Un subinforme va a ser un informe contenido dentro de otro. Se va a generar de la misma forma que los informes ordinarios y pueden tener la mayoría de las características de un informe. Las únicas diferencias que tendremos serán:

- Va a estar incluido como un objeto dentro de un informe principal.
- El subinforme puede colocarse en cualquier sección del informe y, el subinforme completo será impreso en dicha sección.
- Un subinforme no podrá contener a otro subinforme.
- No va a tener las secciones de encabezado de página ni de pie de página.

Habrá 4 casos en los que se deberán utilizar los subinformes:

- Para combinar informes no relacionados en un único informe.
- Para coordinar datos que no se puedan enlazar de otro modo.
- Para poder presentar diferentes vistas de los mismos datos dentro de un único informe.
- Para realizar una o varias búsquedas desde un campo no indexado en un campo de búsqueda.

## qqq- mover a practica

El componente de datos es el componente que vamos a usar para obtener datos de la base de datos. Lo primero que haremos será asignar la fuente de datos cogiendo la cadena de conexión de un 'App.config' de nuestros proyectos de Visual Studio. Tendremos que tener en cuenta el nombre del servidor que va a representar la máquina donde esta la instancia del servidor sql y la Base de datos a la que vamos a conectarnos.
