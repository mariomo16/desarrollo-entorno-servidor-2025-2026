<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Creación de Oferta de Trabajo</title>
</head>
<body>
    <form action="/ofertas/{{ $oferta->id }}" method="post">
        @csrf
        @method('PATCH')
        <label for="titulo">Título del Trabajo:</label>
        <input type="text" id="titulo" name="titulo" value="{{ $oferta->titulo }}" required><br><br>

        <label for="empresa">Empresa:</label>
        <input type="text" id="empresa" name="empresa" value="{{ $oferta->empresa }}" required><br><br>

        <label for="descripcion">Descripción:</label><br>
        <textarea id="descripcion" name="descripcion" rows="4" cols="50" required>{{ $oferta->descripcion }}</textarea><br><br>

        <input type="submit" value="Crear Oferta de Trabajo">
    </form>
</body>
</html>