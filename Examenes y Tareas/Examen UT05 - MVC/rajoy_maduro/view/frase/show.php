<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todas las frases</title>
</head>

<body>
    <?php if (isset($frase) && $frase): ?>
        <h1>Frase de <?= htmlspecialchars($frase->getAutor()); ?></h1>
        <p>"<?= htmlspecialchars($frase->getTexto()); ?>"</p>
        <a href="index.php?autor=<?= urlencode($frase->getAutor()) ?>">Ver más frases de
            <?= htmlspecialchars($frase->getAutor()) ?></a><br>
    <?php else: ?>
        <p>No se encontraron frases.</p>
    <?php endif; ?>

    <?php if (isset($autor) || isset($id) || isset($texto)): ?>
        <a href="index.php?all">Limpiar filtro</a><br>
    <?php endif; ?>
    <a href="index.php">Volver a la página principal</a><br>
</body>

</html>