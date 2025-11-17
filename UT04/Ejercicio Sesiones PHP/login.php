<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (!empty($username) && !empty($password)) {
        $_SESSION['username'] = $username;
        header("Location: welcome.php");
        exit;
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login.php</title>
</head>

<body>
    <form action="login.php" method="post">
        <label for="username">Nombre de usuario:</label>
        <input type="text" name="username"><br><br>
        <label for="password">Contraseña:</label>
        <input type="password" name="password"><br><br>
        <input type="submit" value="Iniciar sesión">
    </form>
</body>

</html>