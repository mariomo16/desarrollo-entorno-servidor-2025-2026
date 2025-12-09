<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quack {{ $quack->id }} / {{ config('app.name') }}</title>
    @vite(['resources/css/app.css'])
    <style>
        article p.quack-content {
            font-size: 17px;
            line-height: 24px;
            margin: 5px 0;
        }

        form {
            display: inline;
        }
    </style>
</head>

<body>
    <main>
        <article>
            <p>{{ $quack->display_name }}</p>
            <p><span class="subtext">{{ '@' }}{{ $quack->display_name }}</span></p>
            <p class="quack-content">{{ $quack->content }}</p>
            <p><span class="subtext">{{ $quack->created_at->isoFormat('h:mm a · D MMM YYYY') }}</span></p>
            <div class="manage-btns">
                <a href="/quacks">Volver</a>
                <a href="/quacks/{{ $quack->id }}/edit">Editar</a>
                <form method="POST">
                    @csrf
                    @method('DELETE')
                    <button>Eliminar</button>
                </form>
            </div>
        </article>
    </main>
</body>

</html>
