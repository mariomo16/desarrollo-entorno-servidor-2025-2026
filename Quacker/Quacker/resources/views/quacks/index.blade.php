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

        article:hover {
            cursor: pointer;
            background-color: var(--color-background-hover);
        }

        article p b:hover {
            text-decoration: underline;
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
                        <button>Eliminar</button>
                    </form>
                </div>
            </article>
        @endforeach
    </main>
    <div class="menu-btn active">
        <a href="/quacks/create">➕</a>
    </div>
    <div class="menu-btn second">
        <a href="/users">👤</a>
    </div>
    <div class="menu-btn third">
        <a href="/quashtags">#️⃣</a>
    </div>
</body>

</html>
