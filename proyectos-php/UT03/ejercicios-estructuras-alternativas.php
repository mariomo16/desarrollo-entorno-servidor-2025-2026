<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios con estructuras alternativas</title>
</head>

<body>
    <h1>Ejercicios con estructuras alternativas</h1>
    <h2>Ejercicio 1</h2>
    <?php
    $edad = $_GET["edad"];
    $estado;

    if ($edad < 18) $estado = "menor de edad";
    if ($edad >= 18 && $edad <= 65) $estado = "mayor de edad";
    if ($edad > 65) $estado = "jubilada";

    echo "<p>Es una persona $estado</p>";
    ?>

    <h2>Ejercicio 2</h2>
    <?php
    $numero = $_GET["numero"];
    $parImpar;

    if ($numero % 2 == 0) {
        $parImpar = "par";
    } else {
        $parImpar = "impar";
    }
    echo "<p>El número es $parImpar</p>";
    ?>
    <h2>Ejercicio 3</h2>
    <?php
    $nota = $_GET["nota"];
    $calificacion;
    if ($nota >= 0 && $nota <= 4) {
        $calificacion = "insuficiente";
    }
    if ($nota == 5) {
        $calificacion = "suficiente";
    }
    if ($nota == 6) {
        $calificacion = "bien";
    }
    if ($nota == 7 || $nota == 8) {
        $calificacion = "notable";
    }
    if ($nota == 9 || $nota == 10) {
        $calificacion = "sobresaliente";
    }
    echo "<p>Tu calificacion es de $calificacion</p>";
    ?>

    <h2>Ejercicio 4</h2>
    <?php 
    
    ?>
</body>

</html>