<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
</head>

<body>
    <p>Nombre: <?= $usuario->nombre ?>, Email: <?= $usuario->email ?></p>
    <?php foreach ($entradas as $ruta => $entrada): ?>
        <h1><?= strtoupper($entrada->titulo) ?></h1>
        <p><a href="index.php?action=mostrarEntrada&id=<?= $ruta ?>">Leer entrada</a></p>
    <?php endforeach; ?>
    <p><a href="index.php?action=crearEntradas">Crear nueva entrada</a></p>
</body>

</html>