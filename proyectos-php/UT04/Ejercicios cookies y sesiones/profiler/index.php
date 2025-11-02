<?php
/**
 * index.php - 
 *
 * @description 
 * @author Mario Morales Ortega (1745008)
 * @version 0.1.0
 * @created 2025-11-02
 * @modified 2025-11-02
 * @see https://github.com/mariomo16/desarrollo-entorno-servidor-2025-2026/tree/main/proyectos-php/UT04/Ejercicios%20cookies%20y%20sesiones/profiler
 */

$intereses_guardados = isset($_COOKIE['categorias']) ? (array) json_decode($_COOKIE['categorias']) : null;

if (!empty($intereses_guardados)) {
    $categoria_favorita = array_keys($intereses_guardados, max($intereses_guardados))[0];
    $recomendacion = "Vemos que te interesa mucho la categoría de <strong>$categoria_favorita</strong>. ¡Aquí tienes más!";
} else {
    $recomendacion = "Aún no sabemos nada de ti";
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Portal de Noticias</title>
</head>

<body style="font-family: sans-serif;">

    <h1>Nuestro Portal</h1>

    <div style="background: #eee; padding: 15px; border-radius: 5px; margin-bottom: 20px;">
        <h3>Recomendado para ti</h3>
        <p><?= $recomendacion; ?></p>
        <?php if ($categoria_favorita): ?>
            <a href="articulo.php?categoria=<?= $categoria_favorita; ?>">
                Ver más de <?= $categoria_favorita; ?>
            </a>
        <?php endif; ?>
    </div>

    <h2>Artículos Disponibles</h2>
    <ul>
        <li><a href="articulo.php?categoria=deportes">Artículo de Deportes</a></li>
        <li><a href="articulo.php?categoria=tecnologia">Artículo de Tecnología</a></li>
        <li><a href="articulo.php?categoria=cocina">Artículo de Cocina</a></li>
    </ul>

    <hr>
    <a href="reset.php">(Borrar mi perfil de intereses)</a>
</body>

</html>