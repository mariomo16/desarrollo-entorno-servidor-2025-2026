<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesion</title>
</head>

<body>
    <form action="/login" method="POST">
        <label>
            Correo electrónico: <input type="text" name="email" required>
        </label><br>
        <label>
            Contraseña: <input type="password" name="password">
        </label><br>
        <button>Iniciar sesion</button>
        @csrf
    </form>
</body>

</html>
