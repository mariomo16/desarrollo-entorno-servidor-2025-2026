<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios con arrays</title>
</head>

<body>
    <h1>Ejercicios con arrays</h1>
    <h2>Ejercicio 1</h2>
    <?php
    $frase = "Es el vecino el que elige al alcalde y es el alcalde el que quiere que sean los vecinos el alcalde";
    $frase_separada = explode(" ", $frase);
    print_r($frase_separada);
    ?>

    <h2>Ejercicio 2</h2>
    <?php
    $paises = ["España", "Estados Unidos", "Alemania", "Polonia", "Francia"];
    echo "<p> $paises[2] </p>"
    ?>
    <h2>Ejercicio 3</h2>
    <?php
    $alumno = ["nombre" => "Mario", "apellidos" => "Morales Ortega", "edad" => 23, "nre" => 1745008];
    echo "<p>Nombre: $alumno[nombre], Apellidos: $alumno[apellidos], Edad: $alumno[edad], NRE: $alumno[nre]</p>";
    ?>

    <h2>Ejercicio 4</h2>
    <?php
    $tasas = ["USD" => 1, "EUR" => 0.85, "JPY" => 151, "ARS" => 1361.32];
    $moneda_origen = "USD";
    $dinero_a_convertir = 70;
    $moneda_destino = "ARS";
    $resultado = ($dinero_a_convertir / $tasas[$moneda_origen]) * $tasas[$moneda_destino];
    echo "<p> $dinero_a_convertir $moneda_origen = $resultado $moneda_destino</p>"
    ?>
</body>

</html>