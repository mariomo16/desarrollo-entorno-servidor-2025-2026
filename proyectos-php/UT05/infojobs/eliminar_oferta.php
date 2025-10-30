<?php
require_once 'Database.php';
require_once 'OfertaTrabajo.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;
    if ($id) {
        OfertaTrabajo::delete($id);
    }
}

header('Location: index.php');
exit;