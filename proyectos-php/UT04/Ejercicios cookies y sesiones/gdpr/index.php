<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio de Consentimiento GDPR</title>
    <style>
        body { font-family: sans-serif; padding-bottom: 150px; }
        .cookie-banner {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background: #222;
            color: white;
            padding: 20px;
            text-align: center;
            box-shadow: 0 -2px 5px rgba(0,0,0,0.2);
            z-index: 1000;
        }
        .cookie-banner p { margin: 0 0 15px 0; }
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
    <p style="color: green;">
        <strong>Consentimiento: OTORGADO.</strong><br>
        Te estamos "rastreando". Has visitado esta página ???? veces desde que aceptaste.
    </p>

    <p style="color: red;">
        <strong>Consentimiento: PENDIENTE.</strong><br>
        NO te estamos "rastreando" (la cookie 'tracker_actividad' no se creará ni actualizará).
    </p>

    <div class="cookie-banner">
        <p>Usamos cookies para rastrear tu actividad y mejorar tu experiencia. ¿Aceptas?</p>
        <a href="index.php?consent=accept" class="boton-aceptar">Aceptar Cookies</a>
    </div>

</body>
</html>