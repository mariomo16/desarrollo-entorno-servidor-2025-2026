<?php

    session_start();
    require_once __DIR__ . '/database/Database.php';
    require_once __DIR__ . '/model/Usuario.php';
    $db = new Database();
    $connection = $db->getConnection();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $ganga_id = $_POST['ganga_id'] ?? null;
        $action = $_POST['action'] ?? null;
        $usuario = isset($_SESSION['usuario']) ? unserialize($_SESSION['usuario']) : null;

        if ($usuario !== null && $ganga_id !== null && $action !== null) {
            $query = $connection->prepare($action === 'like' ? USUARIO_DA_LIKE_A_GANGA : USUARIO_DA_DISLIKE_A_GANGA);
            $query->bindValue(':usuario_id', $usuario->getId(), SQLITE3_INTEGER);
            $query->bindValue(':ganga_id', $ganga_id, SQLITE3_INTEGER);
            $query->execute();
        }
    }
    
    $location = isset($_SESSION['categoria']) ? "index.php?categoria_id=" . $_SESSION['categoria'] : "index.php";

    header("Location: $location");
    exit();

?>