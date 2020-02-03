# Introducción a Windows Presentation Foundation

## Visual Studio IDE

WPF es el marco de interfaz de usuario que crea aplicaciones de cliente, permitiendo el uso de recursos, controles, gráficos, datos, etc. Es un subconjunto del framework de .net. WPF hará uso del Lenguaje de Marcado de Aplicaciones Extensible (XAML) para proporcionar un modelo **declarativo** para la programación de aplicaciones. EL objetivo de esto es separar el aspecto de la aplicación del desarrollo de su comportamiento.
Visual Studio es un IDE de Microsoft utilizado para el desarrollo de todo tipo de aplicaciones para la plataforma
_ Cuadro de herramientas: Almacena todos los controles que podemos utilizar.
_ Explorador de servidores \* Explorador de soluciones: Muestra todos los archivos de nuestro proyecto, incluyendo librerías externas

## 1- Estructura de una aplicación

### 1.1- Lenguaje declarativo (XAML)

Debemos destacar que en XAML todos los nombres de elementos/atributos son sensibles a mayúsculas y minúsculas, y los valores de estos deben escribirse entre comillas dobles. La función del atributo XMLNS (XML Namespace) es la de declarar los espacios de nombres XML. La función del atributo CLR-NameSpace será la de hacer referencia a los espacios de nombres CLR declarados dentro del ensamblado. Fragmentos de código que encontraremos en las aplicaciones WPF declaran dos espacios de nombre concretos.

[http://schemas.microsoft.com/wimfx/2006/xaml/presentation](http://schemas.microsoft.com/wimfx/2006/xaml/presentation)
[http://schemas.microsoft.com/winfx/2006/xaml](http://schemas.microsoft.com/wimfx/2006/xaml/presentation)

Va a abarcar todas las clases WPF incluyendo la de los controles que utilizaremos para construir nuestros interfaces de usuario. Esel espacio de nombre XAML para el lenguaje XAML. Va a contener varios elementos XAML que nos van a permitir interpretar los documentos de una forma u otra. A este espacio de nombres se le asigna el prefijo X, lo cual significa que para hacer referencia a los elementos de dicho espacio de nombres hay que utilizar dicho prefijo, y son construcciones de programación que se usan con frecuencia en el código XML (x:class, x:Name, x:Type).

### 2.2- Código Subyacente (Code behind)

la función del código subyacente va a ser la de responder a eventos y manipular los objetos declarativos de XML. A parte de eso, va a contener todo el código de la lógica de negocio. Va a utilizarlo mediante el modelo MVC (Modelo Vista Controlador).
