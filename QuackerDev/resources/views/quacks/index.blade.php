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

        button {
            border-radius: 20px;
            padding: 5px 10px;
            border: none;
            background-color: #1D9BF0;
            font-size: 1em;
            color: #FFFFFF;
            cursor: pointer;
        }

        button:hover {
            background-color: #1A8CD8;
        }

        div.quackea {
            position: fixed;
            top: 20px;
            left: 20px;
            transition: all 0.2s ease;
        }

        div.quackea:hover {
            transform: scale(1.1);
        }

        div.quackea p {
            font-size: 2rem;
            background-color: #1D9BF0;
            padding: 10px;
            border-radius: 20px;
            cursor: pointer;
        }

        div.quackea p:hover {
            background-color: #1A8CD8;
        }

        div.quackea a {
            text-decoration: none;
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
        @foreach ($quacks as $quack)
            <article>
                <h3>{{ $quack->nickname }}<span class="date"> ·
                        {{ $quack->created_at->diffForHumans(['locale' => 'es', 'short' => true]) }}</span></h3>
                <p>{{ $quack->contenido }}</p>
                <p><a href="/quacks/{{ $quack->id }}">Ver más detalles</a></p>
                <form action="/quacks/{{ $quack->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button>Eliminar</button>
                </form>
                <p><a href="/quacks/{{ $quack->id }}/edit">Editar</a></p>
            </article>
        @endforeach
    </main>
    <div class="quackea">
        <p><a href="/quacks/create">🦆</a></p>
    </div>
</body>

</html>