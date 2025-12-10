<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo quack / {{ config('app.name') }}</title>
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
        <form action="/quacks" method="POST">
            <label>
                <span class="subtext">Nombre: </span><input type="text" name="display_name"
                    placeholder="Usuario de Quacker" required>
            </label>
            <textarea name="content" placeholder="Quack, quack, ¿qué pasa?" rows="3" cols="30" required></textarea>
            <div class="manage-btns">
                <button>¡Quack!</button>
                @csrf
                <a href="/quacks">Cancelar</a>
            </div>
        </form>
    </main>
</body>

</html>
