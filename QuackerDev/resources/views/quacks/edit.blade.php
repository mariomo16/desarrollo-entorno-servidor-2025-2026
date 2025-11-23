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
    </style>
</head>

<body>
    <main>
        <form action="/quacks/{{ $quack->id }}" method="POST">
            <label>
                Nick: <input type="text" name="nickname" placeholder="Nombre de usuario" value="{{ $quack->nickname }}">
            </label><br>
            <textarea name="contenido" placeholder="Escribe tu Quack" rows="3"
                cols="30">{{ $quack->contenido }}</textarea><br>
            <button>¡Quackea o muere!</button>
            @csrf
            @method('PATCH')
        </form>
    </main>
</body>

</html>