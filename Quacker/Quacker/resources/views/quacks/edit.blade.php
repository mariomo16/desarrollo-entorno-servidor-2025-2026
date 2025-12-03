<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $quack->user->displayname }} en Quacker</title>
    <style>
        :root {
            background-color: #000000;
            font-family: sans-serif;
            --text-color: #E7E9EA;
            --twitter-color: #1A8BD7;
            --subtext-color: #71767B;
            --border-color: #2F3336;
            --edit-background-color: #1A1A1A;
            --gray-hover: #080808;
        }

        body {
            margin: 0;
            padding: 0;
        }

        main {
            max-width: 600px;
            margin: 0 auto;
            padding: 0 16px;
        }

        article {
            color: var(--text-color);
            border: 1px solid var(--border-color);
            border-top: none;
            padding: 10px;
        }

        .subtext {
            color: var(--subtext-color);
            margin-top: 0;
        }

        .displayname {
            margin-bottom: 0;
        }

        .returnBtn svg {
            color: var(--twitter-color);
            width: 40px;
            height: 40px;
        }

        .returnBtn svg:hover {
            background-color: var(--gray-hover);
            border-radius: 50%;
        }

        button {
            cursor: pointer;
            border-radius: 10px;
            padding: 5px 10px;
            border: none;
            color: var(--text-color);
            background-color: var(--twitter-color);
        }

        textarea {
            font-size: 1rem;
            font-family: 'Segoe UI';
            color: var(--text-color);
            width: 95.5%;
            height: 100px;
            padding: 10px;
            margin-bottom: 10px;
            border: 2px solid var(--border-color);
            border-radius: 5px;
            resize: none;
            background-color: var(--edit-background-color);
            transition: all 0.1s ease;
        }

        textarea:focus {
            outline: none;
            border-color: var(--twitter-color);
        }
    </style>
</head>

<body>
    <main>
        <article>
            <p class="returnBtn"><a href="/quacks"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                        fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5" />
                    </svg></a></p>
            <p class="displayname"><strong>{{ $quack->user->displayname }}</strong>
            </p>
            <p class="subtext"><span>{{ '@' }}{{ $quack->user->username }}</span></p>
            <form action="/quacks/{{ $quack->id }}" method="POST">
                <textarea name="content" placeholder="Escribe tu Quack">{{ $quack->content }}</textarea><br>
                <button>¡Quackea o muere!</button>
                @csrf
                @method('PATCH')
            </form>
        </article>
    </main>
</body>

</html>