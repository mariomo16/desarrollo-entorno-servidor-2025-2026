<?php
require_once __DIR__ . "/controller/GangaController.php";
require_once __DIR__ . "/controller/UserController.php";

session_start();

new Database();

$db = Database::getConnection();

$gangaController = new GangaController();
$userController = new UserController();

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $action = $_GET["action"] ?? "login";

    switch ($action) {
        case "login":
            $userController->getLogin();
            break;
        case "register":
            $userController->getRegister();
            break;
        case "listado":
            $gangaController->getAllGangas();
            break;
        case "filtrado":
            $gangaController->getFilteredGangas();
            break;
        case "like":
            $gangaController->likeUser();
            break;

        default:
            echo "Error 404";
            break;
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $action = $_GET["action"];

    switch ($action) {
        case "logearse":
            $userController->loginUser();
            break;
        case "addUser":
            $userController->addUser();
            header("Location: index.php");
            exit();
            break;
        default:
            echo "Error 404";
            break;
    }
}

?>
