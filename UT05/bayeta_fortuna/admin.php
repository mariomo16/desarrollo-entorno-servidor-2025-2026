<?php
    require_once 'Database.php';
    require_once 'Auspicio.php';

    new Database();
    $auspicios = Auspicio::getAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auspicios</title>
</head>
<body>
    <h1>LIsta de Auspicios</h1>
    <ul>
        <?php foreach ($auspicios as $auspicio): ?>
            <li>
                <strong><?= htmlspecialchars($auspicio->getAutor()) ?>:</strong>
                <?= htmlspecialchars($auspicio->getDescripcion()) ?>
                <form method="POST" action="eliminar_auspicio.php" style="display.inline;">
                    <input type="hidden" name="id" value="<?= htmlspecialchars($auspicio->getId()) ?>">
                    <button type="submit">Eliminar</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
    <p><a href="index.php">Volver a la Bayeta de la Fortuna</a></p>
</body>
</html>