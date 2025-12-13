<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear quashtag / {{ config('app.name') }}</title>
    @vite(['resources/css/app.css'])
    <style>
        main {
            border: none;
            margin-top: 20px;
        }

        p {
            font-size: 20px;
            text-align: center;
        }

        input {
            font-size: 20px;
            width: 100%;
            padding: 2px;
            outline: none;
            border: 2px solid var(--color-border);
            border-radius: 5px;
            transition: all 0.2s ease;
        }

        input:focus {
            border-color: var(--color-twitter);
        }

        div.manage-btns {
            float: right;
        }
    </style>
</head>

<body>
    <main>
        <p>Crea tu Quashtag</p>
        <br>
        <form action="/quashtags" method="POST">
            @csrf
            <input type="text" name="name" placeholder="🦆MejorQue🐤" required></input>
            <div class="manage-btns">
                <a href="/quashtags" class="cancel">Cancelar</a>
                <button type="submit">¡Quack!</button>
            </div>
        </form>
    </main>
</body>

</html>
