<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frases de M.Rajoy y N.Maduro</title>
</head>

<body>
    <h1>Frase aleatoria <a href="index.php">&#128472;</a></h1>
    <p></strong> "<?= htmlspecialchars($frase->getTexto()); ?>"</p>
    <p><em>- <?= htmlspecialchars($frase->getAutor()); ?></em></p>
    <a href="index.php?id=<?= $frase->getId(); ?>">Ver frase</a><br>
    <a href="index.php?autor=<?= urlencode($frase->getAutor()) ?>">Ver más frases de
        <?= htmlspecialchars($frase->getAutor()) ?></a><br>
    <a href="index.php?all">Ver todas las frases</a><br><br>
    <form action="index.php" method="post">
        <label for="texto">Búsqueda por contenido:</label>
        <input type="text" id="texto" name="texto">
        <button type="submit">Buscar</button>
    </form>
</body>

</html>