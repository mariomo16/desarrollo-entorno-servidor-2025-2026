<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Listado de Gangas</title>
</head>

<body>
    <div style="display: flex; justify-content: space-between;">

        <h1>Bienvenido, <?php echo htmlspecialchars($_SESSION['user_nickname']); ?></h1>
        <p><a href="index.php?action=login">Cerrar sesión</a></p>
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

                <a href="index.php?action=like&ganga_id=<?= $ganga->getId() ?>">
                    <img src="./img/<?= $hasLiked ? 'down.png' : 'up.png' ?>" alt="like" width="15" style="cursor:pointer;">
                </a>


                <div class="hashtags">
                    <?php foreach ($ganga->getHashtags() as $hashtag): ?>
                        <a href="index.php?action=filtrado_gangas&categoria=<?= urlencode($hashtag) ?>">
                            #<?= htmlspecialchars($hashtag) ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </section>
</body>

</html>