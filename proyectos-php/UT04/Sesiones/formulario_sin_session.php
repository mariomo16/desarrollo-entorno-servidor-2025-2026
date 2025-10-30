<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario sin sesión</title>
</head>
<body>
    <h1>Formulario sin sesión</h1>
    <form method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <input type="submit" value="Enviar">
    </form>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = $_POST["nombre"];
            $email = $_POST["email"];
            
            echo "<h1>Datos recibidos</h1>";
            echo "<p>Nombre: $nombre</p>";
            echo "<p>Email: $email</p>";

            $_SESSION['nombre'] = $nombre;
            $_SESSION['email'] = $email;
            
            echo "<p>Ahora click <a href='leer_sin_session.php'>aquí</a> para ir a la página sin sesión.</p>";
        }
    ?>

</body>
</html>