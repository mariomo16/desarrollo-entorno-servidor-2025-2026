<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar usuario: {{ '@' }}{{ $user->username }} / {{ config('app.name') }}</title>
    @vite(['resources/css/app.css'])
    <style>
        main {
            border: none;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <main>
        <form action="/users/{{ $user->id }}" method="POST">
            <label>
                <span class="subtext">Nombre: </span><input type="text" name="display_name" placeholder="Nombre"
                    value="{{ $user->display_name }}">
            </label>
            <label>
                <span class="subtext">Nombre de usuario: </span><input type="text" name="username"
                    placeholder="Nombre" value="{{ $user->username }}">
            </label>
            <label>
                <span class="subtext">Correo electrónico: </span><input type="text" name="email"
                    placeholder="Nombre" value="{{ $user->email }}">
            </label>
            <div class="manage-btns">
                <button>Aceptar</button>
                @csrf
                @method('PATCH')
                <a href="/users">Cancelar</a>
            </div>
        </form>
    </main>
</body>

</html>
