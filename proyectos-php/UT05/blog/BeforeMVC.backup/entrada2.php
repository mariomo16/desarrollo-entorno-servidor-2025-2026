<?php

require_once 'Entrada.php';

$id = $_GET["id"];
$entrada = Entrada::find($id);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrada</title>
</head>

<body>
    <h1><?= $entrada->titulo ?></h1>
    <p><?= $entrada->contenido ?></p>
</body>

</html>