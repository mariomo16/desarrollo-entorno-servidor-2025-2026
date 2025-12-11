<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts / {{ config('app.name') }}</title>
</head>

<body>
    <main>
        @auth
            <a href="">Cerrar sesion</a>
        @endauth
        @guest
            <a href="/login">Iniciar sesion</a>
        @endguest
        @foreach ($posts as $post)
            <article>
                <p>{{ $post->user->name }}</p>
                <p>{{ $post->content }}</p>
            </article>
            <form action="/posts/{{ $post->id }}" method="POST">
                <button>Eliminar</button>
                @csrf
                @method('DELETE')
            </form>
        @endforeach
    </main>
</body>

</html>
