<!--
Escribe un script que construya una pequeña página web en la que aparezca el texto "Estás utilizando la versión: 5.5.9-1ubuntu4.29 de PHP" (incluidas las comillas y extrayendo el número de versión de la constante predefinida correspondiente). Trata de que todas las etiquetas HTML que utilices estén recogidas en variables PHP, de manera que no exista ninguna línea en el código fuente de la página que esté fuera de las etiquetas <? ... ?>
-->

<?php 
echo "
<html>
	<head>
		<title>Ejercicio06</title>
	</head>
	<body>
		<p>Estás utilizando la versión: ".PHP_VERSION."-".PHP_OS." de PHP</p>
	</body>
</html>";
?>