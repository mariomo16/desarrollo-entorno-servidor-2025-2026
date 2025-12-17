<?php

$action = $_GET['action'] ?? 'listado_gangas';

require_once 'Database.php';
require_once 'User.php';
session_start();
new Database();

switch ($action) {
    case 'listado_gangas':
        require_once 'Ganga.php';

        // Conectar a la base de datos
        $db = Database::getConnection();

        // Si no hay sesión, redirigir al login
        if (!isset($_SESSION['user_nickname'])) {
            header('Location: index.php?action=login');
        }

        $user = User::getById($_SESSION['user_id']);
        $gangas = Ganga::getAll();

        require_once 'listado_gangas.php';
        break;

    case 'filtrado_gangas':
        require_once 'Hashtag.php';

        $db = Database::getConnection();
        // Si no hay sesión, redirigir al login
        if (!isset($_SESSION['user_nickname'])) {
            header('Location: index.php?action=login');
        }

        // Verificar si hay filtro de categoría
        if (isset($_GET['categoria']) && !empty($_GET['categoria'])) {
            $categoria = $_GET['categoria'];
            $gangas = Hashtag::getGangasByNombre($categoria);
            $user = User::getById($_SESSION['user_id']);
        } else {
            // Por seguridad, si no hay categoría, puedes redirigir o mostrar todas
            $gangas = Ganga::getAll();
        }

        require_once 'filtrado_gangas.php';
        break;

    case 'like':
        if (!isset($_SESSION['user_id'], $_GET['ganga_id'])) {
            header('Location: index.php?action=login');
            exit;
        }

        $user = User::getById($_SESSION['user_id']);
        $ganga_id = (int) $_GET['ganga_id'];

        // Toggle like
        if ($user->hasLiked($ganga_id)) {
            $user->unlikeGanga($ganga_id);
        } else {
            $user->likeGanga($ganga_id);
        }

        // Volver a la página anterior (listado o filtrado)
        $redirect = $_SERVER['HTTP_REFERER'] ?? 'index.php?action=listado_gangas';
        header("Location: $redirect");
        break;

    case 'login':
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

        require_once 'login.php';
        break;

    case 'register':
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

        require_once 'register.php';
        break;

    default:
        echo 'Esta página no existe';
        break;
}
