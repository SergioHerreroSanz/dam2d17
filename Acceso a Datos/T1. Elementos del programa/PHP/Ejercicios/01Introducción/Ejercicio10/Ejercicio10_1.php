<!--
Con criterios similares en cuanto a estética y funcionalidad a los del ejercicio anterior, te proponemos que crees dos nuevos documentos con nombres formulario2.php y visor2.php. En este caso el formulario deberá poder recoger el nombre y apellidos de un alumno hipotético al que debemos formularle dos preguntas. La primera de ellas con cuatro posibles respuestas entre las que deba elegir como válida una de ellas. La segunda, también con cuatro respuestas, deberá permitir marcar las respuestas correctas que pueden ser: todas, ninguna, o algunas de ellas.
El alumno debería poder insertar sus datos personales en el formulario y elegir las respuestas a las preguntas formuladas. Al pulsar en el botón de envío, los datos del alumno y las respuestas elegidas deben visualizarse a través del documento visor2.php.
-->


<html>
	<head>
		<title>Ejercicio10</title>
	</head>
	<body>
		<form action="./Ejercicio10_2.php" method="POST" target="_blank">
			<label id="nombre">Nombre</label>
			<input type="text" for="nombre" name="nombre">
			<br>
			<label id="apell">Apellidos</label>
			<input type="text" for="apell" name="apellidos">
			<br>
			<label id="pregunta1">¿Cuál de estas memorias de almacenamiento es la más rápida?<label><br>
			<input type="radio" for="pregunta1" value="cpu" name="pregunta1">CPU L1<br>
			<input type="radio" for="pregunta1" value="ram" name="pregunta1">RAM<br>
			<input type="radio" for="pregunta1" value="ssd" name="pregunta1">SSD<br>
			<input type="radio" for="pregunta1" value="hdd" name="pregunta1">HDD<br>
			<br>
			<label id="pregunta2">¿Qué idiomas hablas?<label><br>
			<input type="checkbox" for="pregunta2ES" value="español" name="pregunta2">Español<br>
			<input type="checkbox" for="pregunta2EN" value="ingles" name="pregunta2">Inglés<br>
			<input type="checkbox" for="pregunta2FR" value="francés" name="pregunta2">Francés<br>
			<input type="checkbox" for="pregunta2DE" value="alemán" name="pregunta2">Alemán<br>
			<br>
			<input type="submit">
		</form>
	</body>
</html>	