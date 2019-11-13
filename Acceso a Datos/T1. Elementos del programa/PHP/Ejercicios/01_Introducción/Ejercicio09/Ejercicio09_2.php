<!--
Crea dos documentos llamados respectivamente formulario1.php y visor1.php. En el primero de ellos incluye un formulario que permita recoger datos personales y académicos de tus alumnos, utilizando todos los tipos de campos de formulario que conozcas. Los datos insertados en ese formulario deberán ser visualizados después de su envío con cualquier configuración de register_globals y con cualquier versión PHP– a través del documento visor1.php. Utiliza los recursos estéticos –fondos, colores, tipografía, etcétera– que estimes oportunos para una correcta presentación
-->

<html>
	<head>
		<title>Ejercicio09</title>
		<style>
		</style>
	</head>
	<body>
		<?php
			echo "Te llamas ".$_POST["nombre"]." ".$_POST["apellidos"].
			", naciste el ".$_POST["fechaNacimiento"].
			", eres ".$_POST["sexo"]." y hablas";
				if(isset($_POST["idiomaES"])){echo $_POST["idiomaES"];}
				if(isset($_POST["idiomaEN"])){echo $_POST["idiomaEN"];}
				if(isset($_POST["idiomaFR"])){echo $_POST["idiomaFR"];}
				if(isset($_POST["idiomaDE"])){echo $_POST["idiomaDE"];}
				if(isset($_POST["idiomaCH"])){echo $_POST["idiomaCH"];}
				if(isset($_POST["idiomaJP"])){echo $_POST["idiomaJP"];}
			echo ". Además ".$_POST["informacion"];
		?>
	</body>
</html>


