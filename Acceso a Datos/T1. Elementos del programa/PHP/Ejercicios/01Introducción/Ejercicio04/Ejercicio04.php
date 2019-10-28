<!--
Escribe un script en el que se definan dos constantes, una numérica y otra de cadena y en el que –mediante la las opciones print y echo– aparezca en la página web resultante un comentario sobre el tipo de cada una de ellas seguido de su valor. Intenta conseguir que los elementos concatenados aparezcan en la presentación separados por un espacio.
-->

<html>
	<head>
		<title>Ejercicio04</title>
	</head>
	<body>
		<?php
			$num = 5;
			define("txt", "texto");
		
			echo "Variable numérica: ".$num."<br>";
			print("Constante String: ".txt."<br>");
		?>
	</body>
</html>