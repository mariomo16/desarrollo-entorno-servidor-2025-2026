<?php

session_start();

require_once './controller/SessionController.php';
require_once './controller/GangaController.php';

$session_controller = new SessionController;
$ganga_controller = new GangaController;

$action = $_GET['action'] ?? 'gangas';
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    switch ($action) {
        case 'gangas':
            $ganga_controller->gangas();
            break;

        case 'gangasCategoria':
            $ganga_controller->gangasCategoria();
            break;

        case 'login':
            $session_controller->vistaLogin();
            break;

        case 'logout':
            $session_controller->logout();
            break;

        case 'signup':
            require_once './view/signup.php';
            break;

        default:
            # code...
            break;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    switch ($action) {
        case 'like':
            $ganga_controller->like();
            break;

        case 'login':
            $session_controller->login();
            break;

        case 'signup':
            require_once './view/signup.php';
            break;

        default:
            # code...
            break;
    }
}