<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="{{ route('index.index') }}" method="post">
        @csrf
        @method('POST')
        <label>Título:
            <input type="text" name="titulo" required>
        </label>
        <br>
        <label>Descripcion:
            <input type="text" name="descripcion" required>
        </label>
        <br>
        <label>Ubicacion:
            <input type="text" name="ubicacion" required>
        </label>
        <br>
        <label>Precio:
            <input type="text" name="precio" required>
        </label>
        <br>
        <label>Superficie:
            <input type="number" name="superficie" required>
        </label>
        <br>
        <br>
        <button type="submit">enviar</button>
    </form>
</body>

</html>
