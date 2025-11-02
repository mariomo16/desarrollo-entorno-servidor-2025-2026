<?php

/**
 * index.php - GDPR Cookie Consent
 *
 * @description Ejercicio de Consentimiento GDPR y contador de visitas
 * @author Mario Morales Ortega (1745008)
 * @version 1.0.2
 * @created 2025-11-02
 * @modified 2025-11-02
 * @see https://github.com/mariomo16/desarrollo-entorno-servidor-2025-2026/tree/main/proyectos-php/UT04/Ejercicios%20cookies%20y%20sesiones/gdpr
 */

// Comando para pruebas: eliminar cookies desde la consola del navegador
// document.cookie = "tracker_actividad=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";

// Procesar el consentimiento del usuario según el parámetro GET
switch ($_GET["consent"]) {
    case 'accept':
        // Primera visita con consentimiento: crear la cookie con valor inicial
        if (empty($_COOKIE["tracker_actividad"])) {
            setcookie("tracker_actividad", 1, -0, "/");
        } else {
            // Visitas posteriores: incrementar el contador de la cookie existente
            // Referencia: https://stackoverflow.com/questions/6487564/how-do-you-update-a-cookie-in-php
            setcookie("tracker_actividad", $_COOKIE["tracker_actividad"] += 1, -0, "/");
        }
        
        // Obtener el valor actual del contador (usar 1 si la cookie aún no está disponible en esta petición)
        // Esto lo hago porque si muestro directamente $_COOKIE["tracker_actividad"] las visitas se guardan pero la primera no se muestra
        $contador = $_COOKIE["tracker_actividad"] ?: 1;
        // Mostrar mensaje de confirmación con el número de visitas
        $mensaje_cookies = "<p style=\"color: green;\"><strong>Consentimiento: OTORGADO.</strong><br>Te estamos \"rastreando\". Has visitado esta página " . $contador . " veces desde que aceptaste.</p>";
        break;

    default:
        // Usuario no ha dado consentimiento: mostrar mensaje informativo
        $mensaje_cookies = "<p style=\"color: red;\"><strong>Consentimiento: PENDIENTE.</strong><br>NO te estamos \"rastreando\" (la cookie 'tracker_actividad' no se creará ni actualizará).</p>";
        break;
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Ejercicio de Consentimiento GDPR</title>
    <style>
        body {
            font-family: sans-serif;
            padding-bottom: 150px;
        }

        .cookie-banner {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background: #222;
            color: white;
            padding: 20px;
            text-align: center;
            box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.2);
            z-index: 1000;
        }

        .cookie-banner p {
            margin: 0 0 15px 0;
        }

        .cookie-banner a.boton-aceptar {
            background: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <h1>Bienvenido</h1>
    <p>Este es el contenido principal de la web.</p>
    <p>Recarga esta página (F5) para ver cómo funcionan las cookies.</p>

    <hr>

    <h2>Estado de Rastreo</h2>
    <?= $mensaje_cookies; // Mostrar el estado actual del rastreo ?>
    <?php if ($_GET["consent"] !== "accept"): // Si no hay consentimiento, mostrar el banner de cookies ?>
        <div class="cookie-banner">
            <p>Usamos cookies para rastrear tu actividad y mejorar tu experiencia. ¿Aceptas?</p>
            <a href="index.php?consent=accept" class="boton-aceptar">Aceptar Cookies</a>
        </div>
    <?php endif; ?>

</body>

</html>