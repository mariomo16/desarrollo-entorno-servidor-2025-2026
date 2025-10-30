<?php

require_once __DIR__ . '/controller/PerfilController.php';
$controller = new PerfilController();

$action = $_GET['action'];
$username = $_GET['username'];

switch ($action) {
    case 'mostrarPerfil': 
            
}