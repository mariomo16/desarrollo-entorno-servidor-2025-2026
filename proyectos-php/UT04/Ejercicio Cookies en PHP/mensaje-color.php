<?php

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    setcookie("color", $_POST["color"]);
    echo "<h1 style=\"color: " . $_COOKIE["color"] . "\">Has seleccionado el color " . $_COOKIE["color"] . "</h1>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COOKIES</title>
</head>

<body>
    <form action="index.php" method="post">
        <label for="color">Selecciona tu color</label>
        <select name="color">
            <option value="red">Rojo</option>
            <option value="green">Verde</option>
            <option value="blue">Azul</option>
        </select>
        <input type="submit" value="Cambiar color">
    </form>
</body>

</html>