<?php
require_once 'Database.php';
require_once 'Ganga.php';
require_once 'User.php';

session_start();

new Database();
// Conectar a la base de datos
$db = Database::getConnection();

// Si no hay sesión, redirigir al login
if (!isset($_SESSION['user_nickname'])) {
    header('Location: login.php');
    exit;
}

$user = User::getById($_SESSION['user_id']);

$gangas = Ganga::getAll();
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

        <?php foreach ($gangas as $ganga): ?>
            <?php $hasLiked = $user->hasLiked($ganga->getId()); ?>

            <div class="ganga">
                <h2><?= htmlspecialchars($ganga->getTitulo()) ?></h2>
                <p><?php echo htmlspecialchars($ganga->getDescripcion()); ?></p>
                <p>Precio: €<?php echo number_format($ganga->getPrecio(), 2); ?></p>
                <span>(<?= $ganga->countLikes() ?>)</span>

                <a href="like.php?ganga_id=<?= $ganga->getId() ?>">
                    <img src="./img/<?= $hasLiked ? 'down.png' : 'up.png' ?>" alt="like" width="15" style="cursor:pointer;">
                </a>


                <div class="hashtags">
                    <?php foreach ($ganga->getHashtags() as $hashtag): ?>
                        <a href="filtrado_gangas.php?categoria=<?= urlencode($hashtag) ?>">
                            #<?= htmlspecialchars($hashtag) ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </section>
</body>

</html>