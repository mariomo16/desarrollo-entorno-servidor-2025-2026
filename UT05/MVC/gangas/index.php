<?php

require_once './database/Database.php';
require_once './model/User.php';

session_start();
new Database();

require_once './controllers/SessionController.php';
require_once './controllers/GangaController.php';

$action = $_GET['action'] ?? 'listado_gangas';

switch ($action) {
    case 'listado_gangas':
        GangaController::listar();
        break;

    case 'filtrado_gangas':
        GangaController::filtrar();
        break;

    case 'like':
        GangaController::like();
        break;

    case 'login':
        SessionController::login();
        break;

    case 'register':
        SessionController::register();
        break;

    default:
        echo 'Esta página no existe';
        break;
}
