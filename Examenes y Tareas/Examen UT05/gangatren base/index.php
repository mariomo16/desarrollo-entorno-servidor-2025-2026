<?php
    session_start();
    require_once __DIR__ . '/database/Database.php';
    require_once __DIR__ . '/model/Usuario.php';
    $db = new Database();

    $usuario = isset($_SESSION['usuario']) ? unserialize($_SESSION['usuario']) : null;
?>

<!DOCTYPE html>
<html lang="es">

<?php if (!$usuario): ?>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inicio de sesión</title>
        <link rel="stylesheet" href="gangatren.css">
    </head>

    <body>
        <main id="login-container">
            <h1>Iniciar sesión</h1>
            <form method="POST" action="login.php">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <br>
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
                <br>
                <button type="submit">Iniciar sesión</button>
            </form>
            O <a href="signup.php">regístrate aquí</a>
        </main>
    </body>

<?php else: ?>

    <?php
        require_once __DIR__ . '/model/Ganga.php';
        require_once __DIR__ . '/model/Categoria.php';
        $connection = $db->getConnection();
        if (isset($_GET['categoria_id']) && $_GET['categoria_id'] !== null) {
            $categoria_id = $_GET['categoria_id'];
            $categoria_query = $connection->prepare(OBTENER_CATEGORIA_POR_ID);
            $categoria_query->bindValue(':id', $categoria_id, SQLITE3_INTEGER);
            $categoria_result = $categoria_query->execute();
            $categoria_row = $categoria_result->fetchArray(SQLITE3_ASSOC);

            if (!$categoria_row) {
                $error = "Categoría no encontrada.";
            } else {
                $categoria = new Categoria($categoria_row['id'], $categoria_row['nombre']);
                $_SESSION['categoria'] = $categoria_id;
            }

            $gangas_categoria_query = $connection->prepare(OBTENER_GANGAS_POR_CATEGORIA_ID);
            $gangas_categoria_query->bindValue(':categoria_id', $categoria_id, SQLITE3_INTEGER);
            $result_gangas = $gangas_categoria_query->execute();
        } else {
            $result_gangas = $connection->query(OBTENER_TODAS_LAS_GANGAS);
            unset($_SESSION['categoria']);
        }
        $gangas = [];
        while ($row = $result_gangas->fetchArray(SQLITE3_ASSOC)) {
            $gangas[] = new Ganga($row['id'], $row['titulo'], $row['descripcion'], $row['precio']);
        }
    ?>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gangas</title>
        <link rel="stylesheet" href="gangatren.css">
    </head>
    <body>
        <header>
            <span style="flex: 1"></span>
            <h1>Bienvenido, <?= htmlspecialchars($usuario->getNickname()); ?></h1>
            <a href="logout.php">Cerrar sesión</a>
        </header>
        <main id="deals-container">
            <h2>Lista de Gangas <?= isset($categoria) ? 'en ' . htmlspecialchars($categoria->getNombre()) : ''; ?> (<?= count($gangas); ?>)</h2>
            <?php if (isset($categoria)) : ?>
                <p><a href="index.php">Limpiar filtro</a></p>
            <?php endif; ?>
            <?php foreach ($gangas as $ganga): ?>
                <?php
                    $categorias = [];
                    $categorias_query = $db->getConnection()->prepare(OBTENER_CATEGORIAS_POR_GANGA_ID);
                    $categorias_query->bindValue(':ganga_id', $ganga->getId(), SQLITE3_INTEGER);
                    $result_categorias = $categorias_query->execute();
                    while ($categoria = $result_categorias->fetchArray(SQLITE3_ASSOC)) {
                        $categorias[] = new Categoria($categoria['id'], $categoria['nombre'], $categoria['descripcion']);
                    }

                    $ganga_likes_query = $db->getConnection()->prepare(OBTENER_NUMERO_DE_LIKES_POR_GANGA_ID);
                    $ganga_likes_query->bindValue(':ganga_id', $ganga->getId(), SQLITE3_INTEGER);
                    $result_likes = $ganga_likes_query->execute();
                    $ganga_likes = $result_likes->fetchArray(SQLITE3_ASSOC)['like_count'];

                    $usuario_like_query = $db->getConnection()->prepare(USUARIO_HA_LIKEADO_GANGA);
                    $usuario_like_query->bindValue(':usuario_id', $usuario->getId(), SQLITE3_INTEGER);
                    $usuario_like_query->bindValue(':ganga_id', $ganga->getId(), SQLITE3_INTEGER);
                    $result_usuario_like = $usuario_like_query->execute();
                    $has_liked = $result_usuario_like->fetchArray(SQLITE3_ASSOC)['has_liked'];
                ?>
                <article class="ganga">
                    <strong><?= htmlspecialchars($ganga->getTitulo()); ?></strong> (<?= $ganga_likes; ?>)
                    <form id="like-form" method="POST" action="<?php echo "like.php"  ?>"  style="display:inline;">
                        <input type="hidden" name="ganga_id" value="<?= $ganga->getId(); ?>">
                        <?php if ($has_liked): ?>
                            <button type="submit" name="action" value="dislike">&#129035;</button>
                        <?php else: ?>
                            <button type="submit" name="action" value="like">&#129033;</button>
                        <?php endif; ?>
                    </form>
                    
                    <br>
                    <hr>
                    <p><?= htmlspecialchars($ganga->getDescripcion()); ?></p>
                    <p><strong>Precio:</strong> <?= htmlspecialchars($ganga->getPrecio()); ?>€</p>
                    <p>Categorías:
                        <?php foreach ($categorias as $categoria): ?>
                            <span class="categoria"><a href="index.php?categoria_id=<?= htmlspecialchars($categoria->getId()); ?>" title="<?= htmlspecialchars($categoria->getDescripcion()) ?>"><?= '#' . htmlspecialchars($categoria->getNombre()) ?></a></span>
                        <?php endforeach; ?>
                    </p>
                </article>
            <?php endforeach; ?>
        </main>
    </body>

<?php endif; ?>

</html>