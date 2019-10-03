<!--
Crea dos documentos llamados respectivamente color1.php y color2.php.
En el primero de ellos incluye un formulario en el que -mediante un menú de opciones– se pueda elegir uno de entre cinco colores (especifica como value el código hexadecimal de cada uno de ellos).
Al enviar los datos, deberá cargarse la página color2.php con el color de fondo correspondiente a la opción seleccionada en el formulario.
-->

<html>
	<head>
		<title>Ejercicio08</title>
		<style>
			body{
				background-color: <?php echo $_POST["color"];?>;
			}
		</style>
	</head>
	<body>
	</body>
</html>