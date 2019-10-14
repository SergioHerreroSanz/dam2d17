<!--
Crea un documento con el e incluye en él un formulario que permita introducir valores numéricos en dos campos de texto. Al enviarlo (puedes usar el mismo documento para el formulario y para la visualización de resultados) deberán aparecer los resultados de: sumar, restar, multiplicar y dividir ambos números. Deberá aparecer también el resultado (redondeado por exceso) de elevar la suma de ambos números a la cuarta potencia y la raíz quinta del cubo de la suma de ambos números.
-->

<html>
	<head>
		<title>Ejercicio11</title>
	</head>
	<body>
		<form action="./Ejercicio11.php" method="POST">
			<label id="num1">Primer número</label>
			<input type="text" for="num1" name="num1">
			<br>
			<label id="num2">Segundo número</label>
			<input type="text" for="num2" name="num2">
			<br>
			<input type="submit">
		</form>
		<hr>
		<?php
			echo $_POST["num1"];
			echo $_POST["num2"];
		?>
	</body>
</html>	