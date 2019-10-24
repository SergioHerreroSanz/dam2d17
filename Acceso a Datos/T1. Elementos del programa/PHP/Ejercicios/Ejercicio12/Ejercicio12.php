<!--
    Modifica el ejercicio11.php de forma que los resultados obtenidos al realizar los cálculos aparezcan con un espacio como separador de miles, un punto como separador de decimales y cuatro cifras decimales.
-->

<html>

<head>
    <title>Ejercicio12</title>
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

        echo 'Suma: ' . number_format($suma, 4, ' ', '.');
        echo '<br>';
        echo 'Resta: ' . number_format($resta, 4, ' ', '.');
        echo '<br>';
        echo 'Multiplicación: ' . number_format($multiplicacion, 4, ' ', '.');
        echo '<br>';
        echo 'División: ' . number_format($division, 4, ' ', '.');
        echo '<br>';
        echo 'Suma de ambos números a la cuarta potencia: ' . number_format($raro1, 4, ' ', '.');
        echo '<br>';
        echo 'Raíz quinta del cubo de la suma de ambos números: ' . number_format($raro2, 4, ' ', '.');
    } else {
        include("form.php");
    }
    ?>
</body>

</html>