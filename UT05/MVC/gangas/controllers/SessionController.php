<?php

class SessionController
{
    public static function login(): void
    {
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
                header('Location: index.php?action=listado_gangas');
                exit;
            } else {
                $error = 'Email o contraseña incorrectos';
            }
        }

        require_once './view/login.php';
    }

    public static function register(): void
    {
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

                    header('Location: index.php?action=login');
                } catch (Exception $e) {
                    $error = 'El email ya está registrado';
                }
            } else {
                $error = 'Todos los campos son obligatorios';
            }
        }

        require_once './view/register.php';
    }
}
