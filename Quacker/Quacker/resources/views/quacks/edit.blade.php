<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quack {{ $quack->id }} / {{ config('app.name') }}</title>
    @vite(['resources/css/app.css'])
    <style>
        main {
            border: none;
            margin-top: 20px;
        }

        div.manage-btns a {
            float: right;
        }
    </style>
</head>

<body>
    <main>
        <form action="/quacks/{{ $quack->id }}" method="POST">
            <label>
                <span class="subtext">Nombre: </span><input type="text" name="display_name"
                    placeholder="Usuario de Quacker" value="{{ $quack->display_name }}" maxlength="50" required>
            </label>
            <textarea name="content" placeholder="Quack, quack, ¿qué pasa?" maxlength="280" required>{{ $quack->content }}</textarea>
            <div class="manage-btns">
                <button>¡Quack!</button>
                @csrf
                @method('PATCH')
                <a href="/quacks">Cancelar</a>
            </div>
        </form>
    </main>
</body>

</html>
