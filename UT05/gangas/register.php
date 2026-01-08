<?php
require_once 'Database.php';
require_once 'User.php';

session_start();
new Database();

$error = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nickname = $_POST['nickname'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($nickname && $email && $password) {
        try {
            $user = new User(null, $nickname, $email, $password);
            $user->register();

            // Login automático tras registro
            $_SESSION['user_id'] = $user->getId();
            $_SESSION['user_nickname'] = $user->getNickname();

            header('Location: login.php');
            exit;
        } catch (Exception $e) {
            $error = 'El email ya está registrado';
        }
    } else {
        $error = 'Todos los campos son obligatorios';
    }
}
?>
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
        <a href="login.php">Volver al inicio</a>
    </form>
</section>

</body>
</html>
