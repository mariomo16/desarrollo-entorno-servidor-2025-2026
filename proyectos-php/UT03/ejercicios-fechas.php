<?php
define("VALIDACION_ERROR", "<SPAN STYLE='color:red'>DNI NO VALIDO")
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios con fechas</title>
</head>

<body>
    <h1>Ejercicios con fechas</h1>
    <h2>Ejercicio 1</h2>
    <?php
    $horas_totales = 10000;
    $dias = (int) $horas_totales / 3;
    $resto_horas = $horas_totales % 3;
    $dia_hoy = date('d');
    $mes_hoy = date('m');
    $anio_hoy = date('Y');
    $hora_ahora = date('H');

    $dia_objetivo = mktime($hora_ahora + $resto_horas, 0, 0, $mes_hoy, $dia_hoy + $dias, $anio_hoy);
    $fecha_final = date('d/m/Y', $dia_objetivo);
    echo "<p>Sere un experto en piano el día $fecha_final</p>"
    ?>

    <h2>Ejercicio 2</h2>
    <?php
    $fecha_salida = mktime(0, day: 17, month: 9, year: 2013);
    $fecha_actual = mktime(0, day: $dia_hoy, month: $mes_hoy, year: $anio_hoy);
    $diferencia = $fecha_actual - $fecha_salida;
    echo "<p>Han pasado $diferencia segundos</p>";

    $dias_transcurridos = $diferencia / (60 * 60 * 24);
    echo "<p>Han pasado $dias_transcurridos dias</p>";

    $meses_transcurridos = $dias_transcurridos / 30;
    $anios_transcurridos = $meses_transcurridos / 12;
    echo "<p>Han pasado $meses_transcurridos meses</p>";
    echo "<p>Han pasado $anios_transcurridos años</p>";

    $anios_transcurridos = (int) ($meses_transcurridos / 12);
    $meses_transcurridos = (int) ($meses_transcurridos % 12);
    $dias_transcurridos = (int) ($dias_transcurridos % 30);
    echo "<p>Han pasado $anios_transcurridos años, $meses_transcurridos meses y $dias_transcurridos días</p>";
    ?>

    <h2>Ejercicio 3</h2>
    <?php
    $futuro = mktime(0, day: $dia_hoy + 100, month: $mes_hoy + 100, year: $anio_hoy + 100);
    echo "<p>El futuro será ",  date('d/m/Y', $futuro), ", un ", date('l', $futuro), "</p>";
    ?>
</body>

</html>