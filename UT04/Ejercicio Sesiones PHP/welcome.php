<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    header("Location: logout.php");
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $_SESSION['username']; ?></title>
</head>

<body>
    <h1>¡Bienvenido, <?= $_SESSION['username']; ?>!</h1>
    <form action="welcome.php" method="post">
        <button type="submit" name="logout">Cerrar sesión</button>
    </form>
</body>

</html>