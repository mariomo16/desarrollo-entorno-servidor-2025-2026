<?php

declare(strict_types=1);

const API_URL = "https://whenisthenextmcufilm.com/api";

function get_data(string $url): array
{
    $result = file_get_contents($url);
    $data = json_decode($result, true);
    return $data;
}


function get_until_message(int $days): string
{
    $daysleft = "";
    return $daysleft;
}


$data = get_data(API_URL);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data["title"]; ?></title>
</head>

<body>
    <main>
        <hgroup>
            <h1>¡<?= $data["title"]; ?> se estrena en <?= $data["days_until"]; ?> días!</h1>
            <hr>
            <p>Fecha de estreno: <?= $data["release_date"]; ?> </p>
            <p>Tipo de producción: <?= $data["type"]; ?> </p>
            <p>¿Que va despues? <a href=""><?= $data["following_production"]["title"]; ?></a></p>
        </hgroup>
        <section>
            <img src="<?= $data["poster_url"]; ?>" width="300" alt="Poster de <?= $data["title"]; ?>"
                style="border-radius: 16px">
        </section>
    </main>
</body>

</html>


<style>
    :root {
        color-scheme: light dark;
        font-family: Arial, Helvetica, sans-serif;
    }

    body {
        display: grid;
        place-content: center;
    }

    hgroup {
        text-align: center;
    }

    a {
        color: lightskyblue;
    }

    a:hover {
        color: blue;
    }

    section {
        text-align: center;
    }

    img {
        margin: 0 auto;
    }
</style>