<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Registro</title>
</head>

<body>
    <section>
        <h1>Regístrate</h1>

        <?php if ($error): ?>
            <p style="color:red;"><?php echo $error; ?></p>
        <?php endif; ?>

        <form method="POST">
            <label>Nickname:</label>
            <input type="text" name="nickname" required><br><br>

            <label>Email:</label>
            <input type="email" name="email" required><br><br>

            <label>Contraseña:</label>
            <input type="password" name="password" required><br><br>

            <input type="submit" value="Registrarse"><br><br>
            <a href="index.php?action=login">Volver al inicio</a>
        </form>
    </section>
</body>

</html>