<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ofertas de Trabajo</title>
</head>
<body>
    <table>
        <tr>
            <th>Título</th>
            <th>Empresa</th>
            <th>Descripción</th>
        </tr>
        <tr>
            <td>{{ $oferta->titulo }}</td>
            <td>{{ $oferta->empresa }}</td>
            <td>{{ $oferta->descripcion }}</td>
        </tr>
    </table>
</body>
</html>