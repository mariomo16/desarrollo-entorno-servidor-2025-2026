<?php

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    setcookie("color", $_POST["color"]);
    header("Refresh:0");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COOKIES</title>
    <style>
        body {
            background-color:
                <?= $_COOKIE["color"]; ?>
            ;
        }
    </style>
</head>

<body>
    <form action="color-fondo.php" method="post">
        <label for="color">Selecciona tu color</label>
        <select name="color">
            <?php if ($_COOKIE["color"] == "red"): ?>
                <option selected value="red">Rojo</option>
                <option value="green">Verde</option>
                <option value="blue">Azul</option>
            <?php elseif ($_COOKIE["color"] == "green"): ?>
                <option value="red">Rojo</option>
                <option selected value="green">Verde</option>
                <option value="blue">Azul</option>
            <?php elseif ($_COOKIE["color"] == "blue"): ?>
                <option value="red">Rojo</option>
                <option value="green">Verde</option>
                <option selected value="blue">Azul</option>
            <?php endif; ?>
        </select>
        <input type="submit" value="Cambiar color">
    </form>
</body>

</html>