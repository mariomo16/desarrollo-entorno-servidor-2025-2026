<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leer con sesión</title>
</head>
<body>
    <h1>Leer con sesión</h1>
    <?php
    
        if (isset($_SESSION['nombre']) && isset($_SESSION['email'])) {
            $nombre = $_SESSION['nombre'];
            $email = $_SESSION['email'];

            echo "<p>Nombre desde sesión: $nombre</p>";
            echo "<p>Email desde sesión: $email</p>";
        } else {
            echo "<p>Esto no debería imprimirse o me pondré muy triste (has cerrado el navegador
            o esperado 24 minutos)</p>";
        }
    ?>
</body>
</html>