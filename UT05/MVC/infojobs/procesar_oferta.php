<?php

session_start();

require_once 'OfertaTrabajo.php';

if (
    !isset($_SESSION['csfr_token']) ||
    !isset($_POST['csfr_token']) ||
    $_SESSION['csfr_token'] != $_POST['csrf_token']
) {
    echo "<h1> ¿A donde vas, máquina?</h1>";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once 'OfertaTrabajo.php';

    $descripcion = $_POST['descripcion'];
    $salario = $_POST['salario'];
    $empresa = $_POST['empresa'];
    $ubicacion = $_POST['ubicacion'];

    $oferta = new OfertaTrabajo(null, $descripcion, $salario, $empresa, $ubicacion);
    $oferta->save();

    header('Location: index.php');
    exit();
} else {
    header('Location: formulario_ofertas.php');
    exit();
}