<!--
Con criterios similares en cuanto a estética y funcionalidad a los del ejercicio anterior, te proponemos que crees dos nuevos documentos con nombres formulario2.php y visor2.php. En este caso el formulario deberá poder recoger el nombre y apellidos de un alumno hipotético al que debemos formularle dos preguntas. La primera de ellas con cuatro posibles respuestas entre las que deba elegir como válida una de ellas. La segunda, también con cuatro respuestas, deberá permitir marcar las respuestas correctas que pueden ser: todas, ninguna, o algunas de ellas.
El alumno debería poder insertar sus datos personales en el formulario y elegir las respuestas a las preguntas formuladas. Al pulsar en el botón de envío, los datos del alumno y las respuestas elegidas deben visualizarse a través del documento visor2.php.
-->

<html>
	<head>
		<title>Ejercicio10</title>
		<style>
		</style>
	</head>
	<body>
		<?php
			echo "<p>Te llamas ".$_POST["nombre"]." ".$_POST["apellidos"].".</p>";
			echo "<p>Has elegido la opción ".$_POST["pregunta1"]."</p>";
			
			if(empty($_POST("pregunta2") and $_POST("pregunta2") and $_POST("pregunta2") and $_POST("pregunta2"){
				echo("<p>No has elegido ninguna opción.</p>");
			} else {
				echo("<p>Has elegido ");			
				
				for($i=0; $i < count($pregunta2); $i++){
					echo(" ".$pregunta2[$i]);
				}
				
				echo(".</p>");
			}
		?>
	</body>
</html>