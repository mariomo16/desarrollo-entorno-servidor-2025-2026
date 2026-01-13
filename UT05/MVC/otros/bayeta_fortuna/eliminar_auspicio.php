<?php
    require_once 'Database.php';
    require_once 'Auspicio.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
        new Database();
        $auspicio = new Auspicio($_POST['id'], '', '');
        $auspicio->delete();
    }

    header('Location: admin.php');+
    exit();
?>