<?php
    require_once __DIR__ . '/../data/Database.php';
    require_once __DIR__ . '/../model/Ganga.php';
    require_once __DIR__ . '/../model/User.php';
    require_once __DIR__ . '/../model/Hashtag.php';

    class GangaController{

        public function getAllGangas(){
            // Si no hay sesión, redirigir al login
            if (!isset($_SESSION['user_nickname'])) {
                header('Location: index.php');
                exit;
            }

            $user = User::getById($_SESSION['user_id']);
            $gangas = Ganga::getAll();
            require_once  __DIR__ . '/../view/listado_gangas.php';
        }

        public function getFilteredGangas(){

            // Si no hay sesión, redirigir al login
            if (!isset($_SESSION['user_nickname'])) {
                header('Location: index.php');
                exit;
            }

            // Verificar si hay filtro de categoría
            if (isset($_GET['categoria']) && !empty($_GET['categoria'])) {
                $categoria = $_GET['categoria'];
                $gangas = Hashtag::getGangasByNombre($categoria);
                $user = User::getById($_SESSION['user_id']);
                require_once  __DIR__ . '/../view/filtrado_gangas.php';
            }

        }

        public function likeUser(){

            if (!isset($_SESSION['user_id'], $_GET['ganga_id'])) {
                header('Location: index.php');
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
            $redirect = $_SERVER['HTTP_REFERER'] ?? 'index.php?action=listado';
            header("Location: $redirect");
            exit;
        }
    }

    
?>
