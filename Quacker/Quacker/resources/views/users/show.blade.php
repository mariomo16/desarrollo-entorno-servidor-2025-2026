<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $user->display_name }} ({{ '@' }}{{ $user->username }}) / {{ config('app.name') }}</title>
    @vite(['resources/css/app.css'])
    <style>
        article p:first-child {
            font-size: 20px;
            line-height: 24px;
            font-weight: bolder;
        }

        article p.user-content {
            line-height: 12px;
            margin-bottom: 5px;
        }

        form {
            display: inline;
        }
    </style>
</head>

<body>
    <main>
        <article>
            <p>{{ $user->display_name }}</p>
            <p><span class="subtext">{{ '@' }}{{ $user->username }}</span></p>
            <br>
            <p class="user-content"><span class="subtext">Correo electrónico: {{ $user->email }}</span></p>
            <p class="user-content"><span class="subtext">Se unió en {{ $user->created_at->isoFormat('MMMM') }} de
                    {{ $user->created_at->isoFormat('YYYY') }}</span></p>
            <div class="manage-btns">
                <a href="/users">Volver</a>
                <a href="/users/{{ $user->id }}/edit">Editar perfil</a>
                <form action="/users/{{ $user->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button>Eliminar</button>
                </form>
            </div>
        </article>
    </main>
</body>

</html>
