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

        p {
            display: inline;
        }
    </style>
</head>

<body>
    <main>
        <form method="POST" action="/users">
            @csrf
            <label>
                <span class="subtext">Nombre: </span><input type="text" name="display_name" placeholder="Nombre" value="{{ old('display_name') }}">
                @error('display_name')
                    <p style="color: red">{{ $message }}</p>
                @enderror
            </label>
            <label>
                <span class="subtext">Nombre de usuario: </span><input type="text" name="username"
                    placeholder="Nombre de usuario">
                @error('username')
                    <p style="color: red">{{ $message }}</p>
                @enderror
            </label>
            <label>
                <span class="subtext">Correo electrónico: </span><input type="email" name="email"
                    placeholder="Correo electrónico">
                @error('email')
                    <p style="color: red">{{ $message }}</p>
                @enderror
            </label>
            <label>
                <span class="subtext">Contraseña: </span><input type="password" name="password"
                    placeholder="Contraseña">
                @error('password')
                    <p style="color: red">{{ $message }}</p>
                @enderror
            </label>
            <div class="resource-actions">
                <a href="/users" class="cancel">Cancelar</a>
                <button>Completar registro</button>
            </div>
        </form>
    </main>
</body>

</html>
