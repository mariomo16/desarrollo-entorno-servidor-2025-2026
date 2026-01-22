<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Zulos</title>
</head>

<body>
    <a href="{{ route('index.create') }}">Publicar nuevo zulo</a>
    @foreach ($zulos as $zulo)
        <h1>{{ $zulo->titulo }}</h1>
        <p>Ubicacion: {{ $zulo->ubicacion }}</p>
        <p>Precio: {{ $zulo->precio }}€ / mes</p>
        <p>Superficie: {{ $zulo->superficie }} metros cuadrados</p>
        <p>Contacto: {{ $zulo->especulador->email }}</p>
        <a href="{{ route('index.show', $zulo) }}">Ver mas detalles</a>
    @endforeach
</body>

</html>
