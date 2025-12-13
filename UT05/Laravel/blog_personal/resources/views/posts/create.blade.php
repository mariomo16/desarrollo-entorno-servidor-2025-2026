<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="POST">
        <label>
            Nombre: <input type="text" name="name" required>
        </label><br><br>
        <textarea name="post" cols="60" rows="20" required></textarea><br>
        <button>Crear</button>
        @csrf
        @method('PATCH')
    </form>
</body>

</html>
