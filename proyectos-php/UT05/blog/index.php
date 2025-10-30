<?php

require_once __DIR__ . '/controller/EntradaController.php';
$controller = new EntradaController::getInstance();

$action = $_GET['action'] ?? 'mostrarEntradas';

switch ($action) {
    case 'crearEntradas':
        $controller->crearEntrada();
        break;
    case 'crearEntrada':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titulo = $_POST['titulo'];
            $contenido = $_POST['contenido'];

            $entrada = $controller->guardarEntrada($titulo, $contenido);
            header("Location: index.php?action=mostrarEntradas");
            exit();
        }
        break;
    case 'mostrarEntrada':
        $id = $_GET['id'];
        $controller->mostrarEntrada($id);
        break;
    default:
        $controller->mostrarEntradas();
        break;
}