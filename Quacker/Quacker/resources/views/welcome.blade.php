<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido a {{ config('app.name') }} 🦆</title>
    @vite(['resources/css/app.css'])
    <style>
        body {
            margin: 0 auto;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        nav a {
            font-size: 2em;
            margin: 20px 20px;
            padding: 10px 0;
            transition: all 0.2s ease;
        }

        nav a:hover {
            color: var(--color-twitter);
        }

        footer {
            position: fixed;
            bottom: 10px;
            width: 100%;
            text-align: center;
        }
    </style>
</head>

<body>
    <nav>
        <a href="/users">Usuarios 👤</a>
        <a href="/quacks">Quacks 🦆</a>
        <a href="/quashtags">Quashtags #️⃣</a>
    </nav>
    <footer>
        <p><span class="subtext">Alberto, Alfonso & Mario</span></p>
    </footer>
</body>

</html>
