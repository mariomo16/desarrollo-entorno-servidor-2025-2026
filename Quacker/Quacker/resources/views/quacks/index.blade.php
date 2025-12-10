<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quacks / {{ config('app.name') }}</title>
    @vite(['resources/css/app.css'])
    <style>
        main article:last-child {
            border-bottom: none;
        }

        form {
            display: inline;
        }
    </style>
</head>

<body>
    <main>
        @foreach ($quacks as $quack)
            <article>
                <p><b>{{ $quack->display_name }}</b> <span class="subtext">{{ '@' }}{{ $quack->display_name }}
                        ·
                        {{ $quack->created_at->diffForHumans() }}</span></p>
                <p>{{ $quack->content }}</p>
                <div class="manage-btns">
                    <a href="/quacks/{{ $quack->id }}">Mostrar más</a>
                    <a href="/quacks/{{ $quack->id }}/edit">Editar</a>
                    <form action="/quacks/{{ $quack->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="delete">Eliminar</button>
                    </form>
                </div>
            </article>
        @endforeach
    </main>
    <div class="menu-btns">
        <a href="/quacks/create">➕</a>
        <a href="/users">👤</a>
        <a href="/quashtags">#️⃣</a>
        <a href="/">🏠</a>
    </div>
</body>

</html>
