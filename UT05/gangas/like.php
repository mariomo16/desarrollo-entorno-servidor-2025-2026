<?php
    require_once 'Database.php';
    require_once 'User.php';

    session_start();
    new Database();

    if (!isset($_SESSION['user_id'], $_GET['ganga_id'])) {
        header('Location: login.php');
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
    $redirect = $_SERVER['HTTP_REFERER'] ?? 'listado_gangas.php';
    header("Location: $redirect");
    exit;
