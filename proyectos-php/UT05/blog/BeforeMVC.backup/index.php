<?php

require_once "Entrada.php";

$ficheros_entradas = glob('*.json');
$entradas = [];

foreach ($ficheros_entradas as $fichero) {
    $entradas[$fichero] = Entrada::find($fichero);
    // array_push($entradas, $fichero);
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
</head>

<body>
    <?php foreach ($entradas as $ruta => $entrada): ?>
        <h1><?= $entrada->titulo ?></h1>
        <p><a href="entrada2.php?id=<?= $ruta ?>">Leer entrada</a></p>
    <?php endforeach; ?>
    <p><a href="crear-entrada.php">Crear nueva entrada</a></p>
</body>

</html>