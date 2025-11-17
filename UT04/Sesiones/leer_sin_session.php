<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leer sin session</title>
</head>
<body>
    <h1>Leer sin sesión</h1>
    <?php
    
        if (isset($_SESSION['nombre']) && isset($_SESSION['email'])) {
            $nombre = $_SESSION['nombre'];
            $email = $_SESSION['email'];

            echo "<p>Nombre desde sesión: $nombre</p>";
            echo "<p>Email desde sesión: $email</p>";
        } else {
            echo "<p>No hay datos en la sesión. Por favor, rellena el <a href='formulario_con_session.php'>formulario con sesión</a>.</p>";
        }
    ?>
</body>
</html>