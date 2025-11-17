<?php
$tituloWeb = "Muerte a Mercadona";
$encabezado1 = "Muerte a Mercadona";
$encabezado2 = '"Ofertas" de hoy';

$precioPequeña = 7;
$ofertaPequeña = 10;
$precioMediana = 10;
$tamanyoPequeña = 20;
$tamanyoMediana = 30;
$numeroPI = pi();
$areaPequeña = $numeroPI * (($tamanyoPequeña / 2) ** 2) * 2;
$areaMediana = $numeroPI * (($tamanyoMediana / 2) ** 2);
$cantidadPizzaEuroPequeña = $areaPequeña / $ofertaPequeña;
$cantidadPizzaEuroMediana = $areaMediana / $precioMediana;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $tituloWeb ?></title>
</head>

<body>
    <h1><?= $encabezado1 ?></h1>
    <h2><?= $encabezado2 ?></h2>
    <p>¡Solamente hoy 2 pizzas pequeñas (<?= $tamanyoPequeña ?>cm de diámetro) por <?= $ofertaPequeña ?>€!</p>
    <p>Precio pizza mediana (<?= $tamanyoMediana ?>cm de diámetro) por <?= $precioMediana ?>€</p><br>

    <p>Cantidad de pizza (pequeña) por euro: <?= intval($cantidadPizzaEuroPequeña) ?>cm2/euro</p>
    <p>Cantidad de pizza (mediana) por euro: <?= intval($cantidadPizzaEuroMediana) ?>cm2/euro</p>
</body>

</html>