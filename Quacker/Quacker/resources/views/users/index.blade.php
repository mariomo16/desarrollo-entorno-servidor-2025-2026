<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios / {{ config('app.name') }}</title>
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
        @foreach ($users as $user)
            <article>
                <p><b>{{ $user->display_name }}</b> <span class="subtext">{{ '@' }}{{ $user->username }}</span>
                </p>
                <div class="manage-btns">
                    <a href="/users/{{ $user->id }}">Perfil</a>
                    <a href="/users/{{ $user->id }}/edit">Editar perfil</a>
                    <form action="/users/{{ $user->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="delete">Eliminar</button>
                    </form>
                </div>
            </article>
        @endforeach
    </main>
    <div class="menu-btns">
        <a href="/users/create">➕</a>
        <a href="/quacks">🦆</a>
        <a href="/quashtags">#️⃣</a>
        <a href="/">🏠</a>
    </div>
</body>

</html>
