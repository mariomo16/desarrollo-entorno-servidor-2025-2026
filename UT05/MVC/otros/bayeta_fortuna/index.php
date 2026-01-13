<?php
    require_once 'Database.php';
    require_once 'Auspicio.php';

    new Database();
    $auspicio = Auspicio::getRandom();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Bayeta de la Fortuna</title>
    <style>
        body{
            font-family: Arial, sans-serif;
        }

        header{
            text-align: center;
            margin: 0;
            padding: 0;
        }

        main {
            max-width: 600px;
            margin: 20px auto;
        }

        section {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        h1 {
            margin-top: -20px;
            color: #333;
        }
    </style>
</head>
<body>
    <header>
        <img src="imgs/bayeta_fortuna.png" width="20%">
        <h1>La Bayeta de la Fortuna</h1>
    </header>
    <main>
        <section>
            <?php if ($auspicio): ?>
                <h2>Auspicio del día</h2>
                <p><strong>Autor:</strong> <?= htmlspecialchars($auspicio->getAutor()); ?></p>
                <p><q><?php echo htmlspecialchars($auspicio->getDescripcion());?></q></p>
            <?php else: ?>
                <p>No hay auspicios disponibles</p>
            <?php endif; ?>
        </section>
        <footer>Pulsa aquí para spoilearte todos los auspicios: <a href="admin.php">Admin</a></footer>
    </main>
</body>
</html>