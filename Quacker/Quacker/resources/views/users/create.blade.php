<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear usuario / {{ config('app.name') }}</title>
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
        <form action="/users" method="POST">
            <label>
                <span class="subtext">Nombre: </span><input type="text" name="display_name" placeholder="Nombre">
            </label>
            <label>
                <span class="subtext">Nombre de usuario: </span><input type="text" name="username"
                    placeholder="Nombre de usuario">
            </label>
            <label>
                <span class="subtext">Correo electrónico: </span><input type="email" name="email"
                    placeholder="Correo electrónico">
            </label>
            <label>
                <span class="subtext">Contraseña: </span><input type="password" name="password"
                    placeholder="Contraseña">
            </label>
            <div class="manage-btns">
                <button>Completar registro</button>
                @csrf
                <a href="/users">Cancelar</a>
            </div>
        </form>
    </main>
</body>

</html>
