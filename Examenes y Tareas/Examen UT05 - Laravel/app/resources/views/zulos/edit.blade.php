<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
</head>

<body>
    <form action="{{ route('index.index', $zulo) }}" method="post">
        @csrf
        @method('PATCH')
        <label>Título:
            <input type="text" name="titulo" value="{{ $zulo->titulo }}" required>
        </label>
        <br>
        <label>Ubicacion:
            <input type="text" name="titulo" value="{{ $zulo->ubicacion }}" required>
        </label>
        <br>
        <label>Precio:
            <input type="text" name="titulo" value="{{ $zulo->precio }}" required>
        </label>
        <br>
        <label>Superficie:
            <input type="text" name="titulo" value="{{ $zulo->superficie }}" required>
        </label>
        <button type="submit"></button>
    </form>
</body>

</html>
