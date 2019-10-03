<!--
Crea dos documentos llamados respectivamente color1.php y color2.php.
En el primero de ellos incluye un formulario en el que -mediante un menú de opciones– se pueda elegir uno de entre cinco colores (especifica como value el código hexadecimal de cada uno de ellos).
Al enviar los datos, deberá cargarse la página color2.php con el color de fondo correspondiente a la opción seleccionada en el formulario.
-->

<html>
	<head>
		<title>Ejercicio08</title>
	</head>
	<body>
		<form action="./Ejercicio08_2.php" method="POST" target="_blank">	
			<select name="color">
				<option value="#0000ff">Azul</option>
				<option value="#ff0000">Rojo</option>
				<option value="#00ff00">Verde</option>
				<option value="#ffffff">Blanco</option>
				<option value="#000000">Negro</option>
			</select>
			
			<input type="submit">
		<form>
	</body>
</html>