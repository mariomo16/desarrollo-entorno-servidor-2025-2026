<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todos los posts</title>
</head>

<body>
    <main>
        @foreach ($posts as $post)
            <article>
                <p>{{ $post->name }}</p>
                <p>{{ $post->content }}</p>
                <a href="/posts/{{ $post }}">Mostrar más</a>
                <a href="/posts/{{ $post }}/edit">Editar</a>
                <form action="/posts/{{ $post->id }}" method="POST">
                    <button>Borrar</button>
                    @csrf
                    @method('DELETE')
                </form>
            </article>
        @endforeach
    </main>
</body>

</html>
