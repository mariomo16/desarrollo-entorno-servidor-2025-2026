<?php
    require_once 'Database.php';
    require_once 'Hashtag.php';
    require_once 'User.php';

    session_start();
    
    // Inicializar base de datos
    new Database();

    $db = Database::getConnection();
    // Si no hay sesión, redirigir al login
    if (!isset($_SESSION['user_nickname'])) {
        header('Location: login.php');
        exit;
    }

    // Verificar si hay filtro de categoría
    if (isset($_GET['categoria']) && !empty($_GET['categoria'])) {
        $categoria = $_GET['categoria'];
        $gangas = Hashtag::getGangasByNombre($categoria);
        $user = User::getById($_SESSION['user_id']);
    } else {
        // Por seguridad, si no hay categoría, puedes redirigir o mostrar todas
        $gangas = Ganga::getAll();
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Gangas</title>
</head>
<body>

    <div style="display: flex; justify-content: space-between;">

        <h1>Bienvenido, <?php echo htmlspecialchars($_SESSION['user_nickname']); ?></h1>

        <p><a href="login.php">Cerrar sesión</a></p>

    </div>


    <section>
        <h2>Listado de Gangas</h2>

        <a href="listado_gangas.php">Limpiar filtros</a>

        <?php foreach ($gangas as $ganga): ?>
            <?php $hasLiked = $user->hasLiked($ganga->getId()); ?>
            <div class="ganga">
                <h2><?php echo htmlspecialchars($ganga->getTitulo()); ?></h2>
                <p><?php echo htmlspecialchars($ganga->getDescripcion()); ?></p>
                <p>Precio: €<?php echo number_format($ganga->getPrecio(), 2); ?></p>
                <span>(<?= $ganga->countLikes() ?>)</span>

                <a href="like.php?ganga_id=<?= $ganga->getId() ?>">
                    <img
                        src="./img/<?= $hasLiked ? 'down.png' : 'up.png' ?>"
                        alt="like"
                        width="15"
                        style="cursor:pointer;"
                    >
                </a>

                <div class="hashtags">
                    <?php foreach ($ganga->getHashtags() as $hashtag): ?>
                        <a href="filtrado_gangas.php?categoria=<?php echo urlencode($hashtag); ?>">
                            <span>#<?php echo htmlspecialchars($hashtag); ?></span>
                        </a>
                    <?php endforeach; ?>
                </div>

        <?php endforeach; ?>
    </section>

</body>
</html>