<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar post</title>
</head>

<body>
    <main>
        <form action="/posts/{{ $post->id }}" method="POST">
            <label>Nombre: <input type="text" name="name" value="{{ $post->name }}"></label><br><br>
            <textarea name="content" cols="60" rows="10">{{ $post->content }}</textarea>
            <button>Editar</button>
            @csrf
            @method('PATCH')
        </form>
    </main>
</body>

</html>
