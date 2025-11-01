<?php
    $nombre = '';
    $email = '';
?>
<!DOCTYPE html>
<html lang="es">
<head><title>Registro - Paso 1</title></head>
<body>
    <h1>Paso 1: Datos Personales</h1>
    <form method="POST">
        <label>Nombre:</label>
        <input type="text" name="nombre" value="<?= htmlspecialchars($nombre); ?>" required>
        <br>
        <label>Email:</label>
        <input type="email" name="email" value="<?= htmlspecialchars($email); ?>" required>
        <br>
        <button type="submit">Siguiente</button>
    </form>
</body>
</html>