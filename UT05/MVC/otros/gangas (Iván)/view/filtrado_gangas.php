<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Gangas</title>
</head>
<body>
    <div style="display: flex; justify-content: space-between;">
        <h1>Bienvenido, <?php echo htmlspecialchars($_SESSION['user_nickname']); ?></h1>
        <p><a href="index.php">Cerrar sesión</a></p>
    </div>

    <section>
        <h2>Listado de Gangas</h2>
        <a href="index.php?action=listado">Limpiar filtros</a>

        <?php foreach ($gangas as $ganga): ?>
            <?php $hasLiked = $user->hasLiked($ganga->getId()); ?>
            <div class="ganga">
                <h3><?php echo htmlspecialchars($ganga->getTitulo()); ?></h3>
                <p><?php echo htmlspecialchars($ganga->getDescripcion()); ?></p>
                <p>Precio: €<?php echo number_format($ganga->getPrecio(), 2); ?></p>
                <span>(<?= $ganga->countLikes() ?>)</span>

                <a href="index.php?action=like&ganga_id=<?= $ganga->getId() ?>">
                    <img
                        src="./img/<?= $hasLiked ? 'down.png' : 'up.png' ?>"
                        alt="like"
                        width="15"
                        style="cursor:pointer;"
                    >
                </a>

                <div class="hashtags">
                    <?php foreach ($ganga->getHashtags() as $hashtag): ?>
                        <a href="index.php?action=filtrado&categoria=<?php echo urlencode($hashtag); ?>">
                            <span>#<?php echo htmlspecialchars($hashtag); ?></span>
                        </a>
                    <?php endforeach; ?>
                </div>

        <?php endforeach; ?>
    </section>

</body>
</html>