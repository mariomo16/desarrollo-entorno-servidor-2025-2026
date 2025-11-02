<?php
if (!isset($_COOKIE['categorias'])) {
    $categorias = ['deportes' => 0, 'tecnologia' => 0, 'cocina' => 0];
    setcookie('categorias', json_encode($categorias), time() + 86400, '/');
    $intereses_guardados = (array) json_decode($_COOKIE['categorias']);
}

$articulos = [
    'deportes' => 'Janja Garnet gana (otra vez) el campeonato mundial en boulder y lead',
    'tecnologia' => '1X Technologies presenta su robot de limpieza doméstica',
    'cocina' => '¿Proteína animal? Aquí tienes las 10 mejores alternativas vegetales'
];

$categoria_actual = $_GET['categoria'] ?? 'general';

if (isset($_COOKIE['categorias'])) {
    $categorias = (array) json_decode($_COOKIE['categorias']);

    if ($categoria_actual === 'deportes' || $categoria_actual === 'tecnologia' || $categoria_actual === 'cocina') {
        $categorias[(string) $categoria_actual] += 1;
        setcookie('categorias', json_encode($categorias), time() + 86400, '/');
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Artículo de <?= $categoria_actual; ?></title>
</head>

<body style="font-family: sans-serif;">

    <h1 style="text-transform: capitalize;"><?= $categoria_actual; ?></h1>

    <p><?= $articulos[$categoria_actual] ?? 'Contenido del artículo.'; ?></p>

    <hr>
    <a href="index.php">Volver a la portada</a>

    <h3>Cookie 'perfil_intereses'</h3>
    <p style="word-break: break-all;">Aún no sabemos nada de ti</p> <!-- esto hay que rellenarlo -->
</body>

</html>