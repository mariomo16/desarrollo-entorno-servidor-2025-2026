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
    </style>
</head>

<body>
    <main>
        <form method="POST" action="/quacks">
            @csrf
            <label>
                <span class="subtext">Nombre: </span><input type="text" name="display_name" placeholder="Pato Quackero"
                    required>
                @error('display_name')
                    <p style="color: red">{{ $message }}</p>
                @enderror
            </label>
            <textarea name="content" placeholder="Quack, quack, ¿qué pasa?" rows="3" cols="30" required></textarea>
            @error('content')
                <p style="color: red">{{ $message }}</p>
            @enderror
            <div class="resource-actions">
                <a href="/quacks" class="cancel">Cancelar</a>
                <button type="submit">¡Quack!</button>
            </div>
        </form>
    </main>
</body>

</html>
