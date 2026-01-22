<?php

require_once 'controller/FraseController.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        FraseController::show($id);
    } elseif (isset($_GET['autor'])) {
        $autor = urldecode($_GET['autor']);
        FraseController::autor($autor);
    } elseif (isset($_GET['all'])) {
        FraseController::index();
    } else
        FraseController::random();
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['texto'])) {
        $texto = $_POST['texto'];
        FraseController::texto($texto);
    }
}