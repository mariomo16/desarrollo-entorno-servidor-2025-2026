<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quacks</title>
    <style>
        body {
            font-family: sans-serif;
            background-color: #F7F9F9;
        }

        main {
            width: 80%;
            margin: 0 auto;
        }

        article {
            background-color: #FFFFFF;
            border: 1px solid #CFD9DE;
            color: #0F1419;
            padding: 10px;
            margin: 20px 0;
            border-radius: 8px;
        }

        .date {
            font-size: 0.9em;
            color: #536471;
        }

        article p a {
            color: #1D9BF0;
            text-decoration: none;
        }

        article p a:hover {
            color: #1A8CD8;
        }
    </style>
</head>

<body>
    <main>
        <article>
            <h3>{{ $quack->nickname }}<span class="date"> ·
                    {{ $quack->created_at->diffForHumans(['locale' => 'es', 'short' => true]) }}</span></h3>
            <p>{{ $quack->contenido }}</p>
            <p><a href="/quacks">Volver</a></p>
        </article>
    </main>
</body>

</html>