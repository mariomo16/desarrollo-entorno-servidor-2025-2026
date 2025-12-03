<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ '@' }}{{ $user->username }} / Quacker</title>
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
            max-width: 600px;
            margin: 40px auto;
            padding: 0 16px;
        }

        article {
            background-color: #192734;
            border: 1px solid #38444D;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 0 0 1px rgba(56, 68, 77, 0.1);
        }

        article h3 {
            margin-top: 0;
            margin-bottom: 10px;
            font-size: 18px;
            font-weight: 600;
        }

        article p {
            margin: 6px 0;
        }

        article a {
            color: #1D9BF0;
            text-decoration: none;
            font-weight: 500;
        }

        article a:hover {
            text-decoration: underline;
        }

        span {
            color: #AAB8C2;
            font-size: medium;
            float: right;
        }
    </style>
</head>

<body>
    <main>
        <article>
            <h3>{{ $user->displayname }} <span>{{ '@' }}{{ $user->username }} ({{ $user->created_at->format('d/m/Y') }})</span></h3>
            <p>{{ $user->email }}</p>
            <p><a href="/users">Volver</a></p>
        </article>
    </main>
</body>

</html>