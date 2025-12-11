<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver post</title>
</head>

<body>
    <main>
        <article>
            <p>{{ $post->name }}</p>
            <p>{{ $post->content }}</p>
        </article>
    </main>
</body>

</html>
