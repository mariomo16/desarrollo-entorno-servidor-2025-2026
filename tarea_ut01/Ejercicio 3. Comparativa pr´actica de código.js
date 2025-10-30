const express = require('express');
const app = express();

// Ruta principal
app.get('/', (req, res) => {
  const date = new Date();
  const formattedDate = date.toLocaleString('es-ES', { timeZone: 'Europe/Madrid' });

  // Obtención de datos del navegador y la IP
  const userAgent = req.headers['user-agent'];
  const clientIp = req.headers['x-forwarded-for'] || req.connection.remoteAddress;

  // Enviar la respuesta con HTML dinámico
  res.send(`
    <!DOCTYPE html>
    <html>
    <head>
      <title>Mi Primera Página Dinámica</title>
    </head>
    <body>
      <h1>¡Hola Mundo desde el Servidor!</h1>
      <p><strong>Fecha y hora del servidor:</strong> ${formattedDate}</p>
      <p><strong>Tu navegador es:</strong> ${userAgent}</p>
      <p><strong>Tu IP es:</strong> ${clientIp}</p>
      <p>Esta página fue generada dinámicamente en el servidor.</p>
    </body>
    </html>
  `);
});