<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios con bucles</title>
</head>

<body>
    <h1>Ejercicios con bucles</h1>

    <h2>Ejercicio 1</h2>
    <?php
    for ($i = 1; $i <= 100; $i++) {
        if ($i % 2 == 0) {
            echo "<span>$i </span>";
        }
    }
    ?>

    <h2>Ejercicio 2</h2>
    <?php
    $numero = 0;
    $siguiente = 1;
    while ($numero + $siguiente < 1000) {
        $numero += $siguiente;
        $siguiente++;
        echo "<span> $numero </span>";
    }
    ?>

    <h2>Ejercicio 3</h2>
    <?php
    $meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
    foreach ($meses as $mes => $valor) {
        echo "<h2>$valor</h2>";
    }
    ?>

    <h2>Ejercicio 4</h2>
    <?php
    $n = $_GET["n"];

    ?>

    <table border=1>
        <?php for ($i = 1; $i <= $n; $i++): ?>
            <tr>
                <?php for ($j = 1; $j <= $n; $j++): ?>
                    <td>
                        <?= $i, "*", $j, "=", $i * $j ?>
                    </td>
                <?php endfor; ?>
            </tr>
        <?php endfor; ?>
    </table>
</body>

</html>