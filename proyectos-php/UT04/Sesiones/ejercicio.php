<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio Sesiones en PHP</title>
</head>

<body>
    <h1>Ejercicio Sesiones en PHP</h1>
    <h2>Ejercicio 1</h2>
    <?php
    // hola que tal estamos
    session_start();
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['contador'])) {
        $_SESSION['contador'] = 0;
    } elseif (isset($_SESSION['contador'])) {
        $_SESSION['contador'] = 1;
    } else {
        $_SESSION['contador']++;
    }
    ?>
    <?= $_SESSION['contador'] ?>
    <form method="post">
        <button type="submit">Reiniciar contador</button>
    </form>

</body>

</html>