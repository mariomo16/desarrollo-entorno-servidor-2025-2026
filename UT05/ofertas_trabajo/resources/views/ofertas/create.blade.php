<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Creación de Oferta de Trabajo</title>
</head>
<body>
    <form action="/ofertas" method="post">
        @csrf
        <label for="titulo">Título del Trabajo:</label>
        <input type="text" id="titulo" name="titulo" required><br><br>

        <label for="empresa">Empresa:</label>
        <input type="text" id="empresa" name="empresa" required><br><br>

        <label for="descripcion">Descripción:</label><br>
        <textarea id="descripcion" name="descripcion" rows="4" cols="50" required></textarea><br><br>

        <input type="submit" value="Crear Oferta de Trabajo">
    </form>
</body>
</html>