<!--
Crea un documento con el e incluye en él un formulario que permita introducir valores numéricos en dos campos de texto. Al enviarlo (puedes usar el mismo documento para el formulario y para la visualización de resultados) deberán aparecer los resultados de: sumar, restar, multiplicar y dividir ambos números. Deberá aparecer también el resultado (redondeado por exceso) de elevar la suma de ambos números a la cuarta potencia y la raíz quinta del cubo de la suma de ambos números.
-->

<html>

<head>
	<title>Ejercicio11</title>
</head>

<body>
	<?php
	if (!empty($_POST)) {
		$suma = $_POST["num1"] + $_POST["num2"];
		$resta = $_POST["num1"] - $_POST["num2"];
		$multiplicacion = $_POST["num1"] * $_POST["num2"];
		$division = $_POST["num1"] / $_POST["num2"];
		$raro1 = ceil(sqrt($suma));
		$raro2 = ceil(pow(pow($suma, 2), 1 / 5));

		echo 'Suma: ' . $suma;
		echo '<br>';
		echo 'Resta: ' . $resta;
		echo '<br>';
		echo 'Multiplicación: ' . $multiplicacion;
		echo '<br>';
		echo 'División: ' . $division;
		echo '<br>';
		echo 'Suma de ambos números a la cuarta potencia: ' . $raro1;
		echo '<br>';
		echo 'Raíz quinta del cubo de la suma de ambos números: ' . $raro2;
	} else {
		include("form.php");
	}
	?>
</body>

</html>