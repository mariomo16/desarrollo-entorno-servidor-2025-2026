<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login de usuario</title>
</head>

<body>
    <form action="/login" method="post">
        @csrf
        <label for="email">Email:</label>
        <input type="email" name="email" placeholder="Introduce tu email" value="{{ old('email') }}">
        @error('email')
            <span style="color: red">{{ $message }}</span>
        @enderror
        <br><br>
        <Label for="password">Contraseña:</Label>
        <input type="password" name="password" required>
        @error('password')
            <span style="color: red">{{ $message }}</span>
        @enderror
        <br><br>
        <button type="submit">Iniciar sesión</button>
        @error('error_validacion')
            <p style="color: red">{{ $message }}</p>
        @enderror
    </form>
</body>

</html>
