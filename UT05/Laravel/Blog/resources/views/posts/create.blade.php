<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear post / {{ config('app.name') }}</title>
</head>

<body>
    <form action="/posts" method="POST">
        <label>
            Nombre:
            <input type="text" name="name">
        </label><br><br>
        <textarea name="content" cols="60" rows="10"></textarea>
        <button>Enviar</button>
        @csrf
    </form>
</body>

</html>
