<?php

class GangaController
{
    public static function listar(): void
    {
        require_once './model/Ganga.php';

        // Conectar a la base de datos
        $db = Database::getConnection();

        // Si no hay sesión, redirigir al login
        if (!isset($_SESSION['user_nickname'])) {
            header('Location: index.php?action=login');
        }

        $user = User::getById($_SESSION['user_id']);
        $gangas = Ganga::getAll();

        require_once './view/listado_gangas.php';
    }

    public static function filtrar(): void
    {
        require_once './model/Hashtag.php';

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

        require_once './view/filtrado_gangas.php';
    }

    public static function like()
    {
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
    }
}
