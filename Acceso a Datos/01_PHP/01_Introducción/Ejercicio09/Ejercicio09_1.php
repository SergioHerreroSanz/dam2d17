<!--
Crea dos documentos llamados respectivamente formulario1.php y visor1.php. En el primero de ellos incluye un formulario que permita recoger datos personales y académicos de tus alumnos, utilizando todos los tipos de campos de formulario que conozcas. Los datos insertados en ese formulario deberán ser visualizados después de su envío –con cualquier configuración de register_globals y con cualquier versión PHP– a través del documento visor1.php. Utiliza los recursos estéticos –fondos, colores, tipografía, etcétera– que estimes oportunos para una correcta presentación
-->

<html>
	<head>
		<title>Ejercicio09</title>
	</head>
	<body>
		<form action="./Ejercicio09_2.php" method="POST" target="_blank">
			<label id="nombre">Nombre</label>
			<input type="text" for="nombre" name="nombre">
			<br>
			<label id="apell">Apellidos</label>
			<input type="text" for="apell" name="apellidos">
			<br>
			<label id="nac">Fecha de nacimiento<label>
			<input type="date" for="nac" name="fechaNacimiento">
			<br>
			<label id="sexo">Sexo<label><br>
			<input type="radio" value="hombre" for="sexo" name="sexo" checked>Hombre</input>
			<input type="radio" value="mujer" for="sexo" name="sexo">Mujer</input>
			<br>
			<label id="idiomas">¿Qué idiomas hablas?<label><br>
			<input type="checkbox" for="idiomas" value=" español" name="idiomaES" checked>Español<br>
			<input type="checkbox" for="idiomas" value=" ingles" name="idiomaEN">Inglés<br>
			<input type="checkbox" for="idiomas" value=" francés" name="idiomaFR">Francés<br>
			<input type="checkbox" for="idiomas" value=" alemán" name="idiomaDE">Alemán<br>
			<input type="checkbox" for="idiomas" value=" chino" name="idiomaCH">Chino<br>
			<input type="checkbox" for="idiomas" value=" japonés" name="idiomaJP">Japonés
			<br>
			<label id="info">Más información</label>
			<input type="textArea" for="info" name="informacion">
			<br>
			<input type="submit">
		</form>
	</body>
</html>