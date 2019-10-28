<!--
Escribe un script en el que una misma variable tome dos valores distintos sin utilizar ninguna función. Luego añade al script una función que presente ese mismo nombre de variable con un valor distinto de los anteriores, comprobando que esta última opción no modificó el último valor de aquellos
-->

<html>
	<head>
		<title>Ejercicio05</title>
	</head>
	<body>
		<?php
			$num = 1;
			$num = 2;
			
			function funcion(){
				$num = 3;
				echo "La variable local vale ".$num;
			}
			
			funcion();
			echo "La variable global vale ".$num;
		?>
	</body>
</html>