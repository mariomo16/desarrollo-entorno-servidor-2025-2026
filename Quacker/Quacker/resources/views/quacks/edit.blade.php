<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar quack {{ $quack->id }} / {{ config('app.name') }}</title>
    @vite(['resources/css/app.css'])
    <style>
        main {
            border: none;
            margin-top: 20px;
        }

        div.resource-actions {
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
            <div class="resource-actions">
                <button>¡Quack!</button>
                @csrf
                @method('PATCH')
                <a href="/quacks" class="cancel"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                        fill="currentColor" class="bi bi-x-square" viewBox="0 0 16 16">
                        <path
                            d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                        <path
                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                    </svg></a>
            </div>
        </form>
    </main>
</body>

</html>
