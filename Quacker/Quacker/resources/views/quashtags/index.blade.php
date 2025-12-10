<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quashtags / Quacker</title>
    @vite(['resources/css/app.css'])
    <style>
        main article:last-child {
            border-bottom: none;
        }
    </style>
</head>

<body>
    <main>
        @foreach ($quashtags as $quashtag)
            <article>
                <p>🦆{{ $quashtag->name }} <span class="subtext">ID: {{ $quashtag->id }}</span></p>
                <div class="manage-btns">

                    <form action="/quashtags/{{ $quashtag->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button>Eliminar</button>
                    </form>
                </div>
            </article>
        @endforeach
    </main>
    <div class="menu-btn">
        <a href="/quashtags/create">➕</a>
        <a href="/users">👤</a>
        <a href="/quacks">🦆</a>
    </div>
</body>

</html>
