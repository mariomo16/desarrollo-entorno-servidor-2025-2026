<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show</title>
</head>

<body>
    <h1>{{ $zulo->titulo }}</h1>
    <p>Ubicacion: {{ $zulo->ubicacion }}</p>
    <p>descripcion: {{ $zulo->descripcion }}</p>
    <p>Precio: {{ $zulo->precio }}€ / mes</p>
    <p>Superficie: {{ $zulo->superficie }} metros cuadrados</p>
    <hr>
    <p>Datos del Especulador</p>
    <p>Nombre: {{ $zulo->especulador->nombre }}</p>
    <p>Apellidos: {{ $zulo->especulador->apellidos }}</p>
    <p>Email: {{ $zulo->especulador->email }}</p>
    <a href="#">Ver mas zulos de este especulador</a>
    <br>
    <a href="{{ route('index.index') }}">Volver al listado</a>
</body>

</html>
