<?php
$nombre = "Mario Morales";
$edad = 22;
$altura = 1.72;
$es_estudiante = true;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pruebas con variables y tipos de datos</title>
</head>

<body>
    <h1>Pruebas con variables y tipos de datos</h1>
    <p>Mi nombre es <?= var_dump($nombre); ?></p>
    <p>Mi edad es <?= var_dump($edad); ?></p>
    <p>Mi altura es <?= var_dump($altura); ?></p>
    <p>Soy estudiante: <?= var_dump($es_estudiante); ?></p>

    <p>Mi edad en entero es <?= (int)$edad; ?></p>
    <p>Mi edad es <?= var_dump($edad); ?></p>
    <p>Mi edad en entero es <?= intval($edad); ?></p>
    <p>Mi edad es <?= var_dump($edad); ?></p>
    <p>Mi edad en entero es <?= settype($edad, "integer"); ?></p>
    <p>Mi edad es <?= var_dump($edad); ?></p>
    <br>

    <p><?= PHP_VERSION; ?></p>
    <p><?= PHP_OS; ?></p>
    <p><?= __FILE__; ?></p>
    <p><?= __DIR__; ?></p>
    <p><?= __LINE__; ?></p>
</body>

</html>