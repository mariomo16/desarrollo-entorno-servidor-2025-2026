<?php

class GangaController
{
    public function gangas()
    {
        require_once __DIR__ . '/../database/Database.php';
        require_once __DIR__ . '/../model/Usuario.php';
        require_once __DIR__ . '/../model/Ganga.php';
        require_once __DIR__ . '/../model/Categoria.php';

        $usuario = isset($_SESSION['usuario']) ? unserialize($_SESSION['usuario']) : null;
        if (!$usuario) {
            header('Location: index.php?action=login');
            exit;
        }

        unset($_SESSION['categoria']);
        $db = new Database();
        $connection = $db->getConnection();

        if (isset($_GET['categoria_id']) && $_GET['categoria_id'] !== null) {
            $categoria_id = $_GET['categoria_id'];
            $categoria_query = $connection->prepare(OBTENER_CATEGORIA_POR_ID);
            $categoria_query->bindValue(':id', $categoria_id, SQLITE3_INTEGER);
            $categoria_result = $categoria_query->execute();
            $categoria_row = $categoria_result->fetchArray(SQLITE3_ASSOC);

            if (!$categoria_row) {
                $error = "Categoría no encontrada.";
            } else {
                $categoria = new Categoria($categoria_row['id'], $categoria_row['nombre']);
                $_SESSION['categoria'] = $categoria_id;
            }

            $gangas_categoria_query = $connection->prepare(OBTENER_GANGAS_POR_CATEGORIA_ID);
            $gangas_categoria_query->bindValue(':categoria_id', $categoria_id, SQLITE3_INTEGER);
            $result_gangas = $gangas_categoria_query->execute();
        } else {
            $result_gangas = $connection->query(OBTENER_TODAS_LAS_GANGAS);
            unset($_SESSION['categoria']);
        }
        $gangas = [];
        while ($row = $result_gangas->fetchArray(SQLITE3_ASSOC)) {
            $gangas[] = new Ganga($row['id'], $row['titulo'], $row['descripcion'], $row['precio']);
        }

        foreach ($gangas as $ganga) {
            $categorias = [];
            $categorias_query = $db->getConnection()->prepare(OBTENER_CATEGORIAS_POR_GANGA_ID);
            $categorias_query->bindValue(':ganga_id', $ganga->getId(), SQLITE3_INTEGER);
            $result_categorias = $categorias_query->execute();
            while ($categoria = $result_categorias->fetchArray(SQLITE3_ASSOC)) {
                $categorias[] = new Categoria($categoria['id'], $categoria['nombre'], $categoria['descripcion']);
            }

            $ganga_likes_query = $db->getConnection()->prepare(OBTENER_NUMERO_DE_LIKES_POR_GANGA_ID);
            $ganga_likes_query->bindValue(':ganga_id', $ganga->getId(), SQLITE3_INTEGER);
            $result_likes = $ganga_likes_query->execute();
            $ganga_likes = $result_likes->fetchArray(SQLITE3_ASSOC)['like_count'];

            $usuario_like_query = $db->getConnection()->prepare(USUARIO_HA_LIKEADO_GANGA);
            $usuario_like_query->bindValue(':usuario_id', $usuario->getId(), SQLITE3_INTEGER);
            $usuario_like_query->bindValue(':ganga_id', $ganga->getId(), SQLITE3_INTEGER);
            $result_usuario_like = $usuario_like_query->execute();
            $has_liked = $result_usuario_like->fetchArray(SQLITE3_ASSOC)['has_liked'];
        }

        require_once './view/gangas.php';
    }

    public function gangasCategoria()
    {
        require_once __DIR__ . '/../database/Database.php';
        require_once __DIR__ . '/../model/Usuario.php';
        require_once __DIR__ . '/../model/Ganga.php';
        require_once __DIR__ . '/../model/Categoria.php';

        $usuario = isset($_SESSION['usuario']) ? unserialize($_SESSION['usuario']) : null;
        if (!$usuario) {
            header('Location: index.php?action=login');
            exit;
        }

        $db = new Database();
        $connection = $db->getConnection();

        if (isset($_GET['categoria_id']) && $_GET['categoria_id'] !== null) {
            $categoria_id = $_GET['categoria_id'];
            $categoria_query = $connection->prepare(OBTENER_CATEGORIA_POR_ID);
            $categoria_query->bindValue(':id', $categoria_id, SQLITE3_INTEGER);
            $categoria_result = $categoria_query->execute();
            $categoria_row = $categoria_result->fetchArray(SQLITE3_ASSOC);

            if (!$categoria_row) {
                $error = "Categoría no encontrada.";
            } else {
                $categoria = new Categoria($categoria_row['id'], $categoria_row['nombre']);
                $_SESSION['categoria'] = $categoria_id;
            }

            $gangas_categoria_query = $connection->prepare(OBTENER_GANGAS_POR_CATEGORIA_ID);
            $gangas_categoria_query->bindValue(':categoria_id', $categoria_id, SQLITE3_INTEGER);
            $result_gangas = $gangas_categoria_query->execute();
        } else {
            $result_gangas = $connection->query(OBTENER_TODAS_LAS_GANGAS);
            unset($_SESSION['categoria']);
        }
        $gangas = [];
        while ($row = $result_gangas->fetchArray(SQLITE3_ASSOC)) {
            $gangas[] = new Ganga($row['id'], $row['titulo'], $row['descripcion'], $row['precio']);
        }

        foreach ($gangas as $ganga) {
            $categorias = [];
            $categorias_query = $db->getConnection()->prepare(OBTENER_CATEGORIAS_POR_GANGA_ID);
            $categorias_query->bindValue(':ganga_id', $ganga->getId(), SQLITE3_INTEGER);
            $result_categorias = $categorias_query->execute();
            while ($categoria = $result_categorias->fetchArray(SQLITE3_ASSOC)) {
                $categorias[] = new Categoria($categoria['id'], $categoria['nombre'], $categoria['descripcion']);
            }

            $ganga_likes_query = $db->getConnection()->prepare(OBTENER_NUMERO_DE_LIKES_POR_GANGA_ID);
            $ganga_likes_query->bindValue(':ganga_id', $ganga->getId(), SQLITE3_INTEGER);
            $result_likes = $ganga_likes_query->execute();
            $ganga_likes = $result_likes->fetchArray(SQLITE3_ASSOC)['like_count'];

            $usuario_like_query = $db->getConnection()->prepare(USUARIO_HA_LIKEADO_GANGA);
            $usuario_like_query->bindValue(':usuario_id', $usuario->getId(), SQLITE3_INTEGER);
            $usuario_like_query->bindValue(':ganga_id', $ganga->getId(), SQLITE3_INTEGER);
            $result_usuario_like = $usuario_like_query->execute();
            $has_liked = $result_usuario_like->fetchArray(SQLITE3_ASSOC)['has_liked'];
        }

        require_once __DIR__ . '/../view/gangas.php';
    }

    public function like()
    {
        require_once __DIR__ . '/../database/Database.php';
        require_once __DIR__ . '/../model/Usuario.php';
        $db = new Database();
        $connection = $db->getConnection();

        $ganga_id = $_POST['ganga_id'] ?? null;
        $action = $_POST['action'] ?? null;
        $usuario = isset($_SESSION['usuario']) ? unserialize($_SESSION['usuario']) : null;

        if ($usuario !== null && $ganga_id !== null && $action !== null) {
            $query = $connection->prepare($action === 'like' ? USUARIO_DA_LIKE_A_GANGA : USUARIO_DA_DISLIKE_A_GANGA);
            $query->bindValue(':usuario_id', $usuario->getId(), SQLITE3_INTEGER);
            $query->bindValue(':ganga_id', $ganga_id, SQLITE3_INTEGER);
            $query->execute();
        }

        $location = isset($_SESSION['categoria']) ? "index.php?action=like&categoria_id=" . $_SESSION['categoria'] : "index.php";

        header("Location: $location");
        exit();
    }
}