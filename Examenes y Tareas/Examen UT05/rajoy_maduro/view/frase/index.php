<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todas las frases</title>
</head>

<body>
    <?php if (isset($frases) && $frases): ?>
        <h1>
            <?php if (isset($texto)): ?>
                Resultados de la búsqueda (<?= htmlspecialchars($texto) ?>)
            <?php elseif (isset($autor)): ?>
                Frases de <?= htmlspecialchars($autor) ?>
            <?php else: ?>
                Todas las frases
            <?php endif; ?>
        </h1>
        <ul>
            <?php foreach ($frases as $frase): ?>
                <li>
                    "<?= htmlspecialchars($frase->getTexto()); ?>"
                    <?php if (!isset($_GET['autor'])): ?>
                        - <em><?= htmlspecialchars($frase->getAutor()); ?></em>.
                    <?php endif; ?>
                    <a href="index.php?id=<?= $frase->getId(); ?>">Ver frase</a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No se encontraron frases.</p>
    <?php endif; ?>

    <?php if (isset($autor) || isset($id) || isset($texto)): ?>
        <a href="index.php?all">Limpiar filtro</a><br>
    <?php endif; ?>
    <a href="index.php">Volver a la página principal</a><br><br>
    <form action="index.php" method="post">
        <label for="texto">Búsqueda por contenido:</label>
        <input type="text" id="texto" name="texto">
        <button type="submit">Buscar</button>
    </form>
</body>

</html>