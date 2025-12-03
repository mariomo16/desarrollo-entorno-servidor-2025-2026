<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios / Quacker</title>
    <style>
        :root {
            font-family: sans-serif;
            background-color: #000000;
            --text-color: #E7E9EA;
            --twitter-color: #1A8BD7;
            --subtext-color: #71767B;
            --border-color: #2F3336;
            --gray-hover: #080808;
            --delete-color: #787A7A;
            --delete-hover: #F4212E;
        }

        body {
            margin: 0;
            padding: 0;
        }

        main {
            max-width: 600px;
            margin: 0px auto;
            padding: 0 16px;
        }

        article {
            color: var(--text-color);
            border: 1px solid var(--border-color);
            border-top: none;
            padding: 10px;
            transition: all 0.2s ease;
        }

        article:hover {
            background: var(--gray-hover);
        }


        span {
            color: var(--subtext-color);
            font-weight: normal;
        }

        .quackOptions {
            display: inline-block;
            margin-bottom: 20px;
            padding: 0;
        }

        .quackOptions a {
            text-decoration: none;
            color: var(--twitter-color);
            padding: 0 5px;
        }

        .quackOptions a:hover {
            text-decoration: underline;
        }

        button {
            cursor: pointer;
            border-radius: 10px;
            padding: 5px 10px;
            border: none;
            color: var(--text-color);
            background-color: var(--delete-color);
            transition: all 0.2s ease;
        }

        button:hover {
            background-color: var(--delete-hover);
        }

        div.createUser {
            position: fixed;
            top: 20px;
            left: 20px;
            transition: all 0.2s ease;
        }

        div.createUser:hover {
            transform: scale(1.1);
        }

        div.createUser p {
            background-color: var(--twitter-color);
            padding: 10px;
            border-radius: 50%;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <main>
        <div class="createUser">
            <p><a href="/users/create"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                        fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                        <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                        <path fill-rule="evenodd"
                            d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5" />
                    </svg></a></p>
        </div>
        @foreach ($users as $user)
            <article>
                <h3>{{ $user->displayname }}
                    <span>{{ '@' }}{{ $user->username }}
                </h3>
                <p class="quackOptions"><a href="/users/{{ $user->id }}">Mostrar más</a></p>
                <p class="quackOptions"><a href="/users/{{ $user->id }}/edit">Editar</a></p>
                <form action="/users/{{ $user->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button>Eliminar</button>
                </form>
            </article>
        @endforeach
    </main>
</body>

</html>