<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar {{ '@' }}{{ $user->username }} / Quacker</title>
    <style>
        :root {
            background-color: #15202B;
            color: #E7E9EA;
            font-family: sans-serif;
        }

        body {
            margin: 0;
            padding: 0;
        }

        main {
            max-width: 400px;
            margin: 60px auto;
            padding: 0 16px;
        }

        form {
            background-color: #22303C;
            border: 1px solid #38444D;
            padding: 10px 12px;
            border-radius: 8px;
            display: flex;
            flex-direction: column;
        }

        form input {
            padding: 10px 12px;
            margin-bottom: 8px;
            border-radius: 8px;
            border: 1px solid #38444D;
            background-color: #22303C;
            color: #E7E9EA;
            font-size: 14px;
            outline: none;
            transition: border-color 0.2s, background-color 0.2s;
        }

        form input::placeholder {
            color: #8899A6;
        }

        form input:focus {
            border-color: #1D9BF0;
            background-color: #2A3B47;
        }

        form button {
            background-color: #1D9BF0;
            color: #fff;
            border: none;
            border-radius: 20px;
            padding: 10px 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s;
            margin-top: 8px;
        }

        form button:hover {
            background-color: #1A8CD8;
        }

        form a {
            color: #1D9BF0;
            text-decoration: none;
        }

        form a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <main>
        <form action="/users/{{ $user->id }}" method="POST">
            <label>
                Nombre de usuario: <input type="text" name="username" placeholder="Nombre de usuario"
                    value="{{ $user->username }}" required>
            </label>
            <label>
                Nombre: <input type="text" name="displayname" placeholder="Nombre"
                    value="{{ $user->displayname }}" required>
            </label>
            <label>
                Correo electrónico: <input type="email" name="email" placeholder="Correo electrónico"
                    value="{{ $user->email }}" required>
            </label>
            <button>Aplicar cambios</button><br>
            @csrf
            @method('PATCH')
            <a href="/users">Cancelar</a>
        </form>
    </main>
</body>

</html>