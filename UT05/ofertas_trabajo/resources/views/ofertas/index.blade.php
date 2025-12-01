<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ofertas de Trabajo</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
            text-align: left;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <th>Título</th>
            <th>Empresa</th>
            <th>Descripción</th>
            <th>Detalles</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
        @foreach($ofertas as $oferta)
        <tr>
            <td>{{ $oferta->titulo }}</td>
            <td>{{ $oferta->empresa }}</td>
            <td>{{ $oferta->descripcion }}</td>
            <td><a href="/ofertas/{{ $oferta->id }}">Ver detalles</a></td>
            <td><a href="/ofertas/{{ $oferta->id }}/edit">Editar</a></td>
            <td>
                <form method="POST" action="/ofertas/{{ $oferta->id }}">
                    @method('DELETE')
                    @csrf
                    <button>Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>