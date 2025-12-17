<?php
require_once 'Database.php';
require_once 'User.php';

session_start();

// Inicializar BD
new Database();

$error = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $user = User::login($email, $password);

    if ($user) {
        // Guardar usuario en sesión
        $_SESSION['user_id'] = $user->getId();
        $_SESSION['user_nickname'] = $user->getNickname();

        // Redirigir al listado de gangas
        header('Location: listado_gangas.php');
        exit;
    } else {
        $error = 'Email o contraseña incorrectos';
    }
}
?>
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

    <form method="POST">
        <label>Email:</label>
        <input type="email" name="email" required><br><br>

        <label>Contraseña:</label>
        <input type="password" name="password" required><br><br>

        <input type="submit" value="Iniciar sesión">
        <br><br>
        <a href="register.php">O regístrate aquí</a>
    </form>
</section>

</body>
</html>
