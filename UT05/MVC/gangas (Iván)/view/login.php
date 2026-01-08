<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio de sesión</title>
</head>
<body>

<section>
    <h1>Iniciar sesión</h1>

    <?php if ($error): ?>
        <p style="color:red;"><?php echo $error; ?></p>
    <?php endif; ?>

    <form action="index.php?action=logearse" method="POST">
        <label>Email:</label>
        <input type="email" name="email" required><br><br>

        <label>Contraseña:</label>
        <input type="password" name="password" required><br><br>

        <input type="submit" value="Iniciar sesión">
        <br><br>
        <a href="index.php?action=register">O regístrate aquí</a>
    </form>
</section>

</body>
</html>
