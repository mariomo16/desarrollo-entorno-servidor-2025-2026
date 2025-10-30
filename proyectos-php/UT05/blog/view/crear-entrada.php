<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear entrada</title>
</head>

<body>
    <form action="index.php?action=crearEntrada" method="POST">
        <label for="titulo">Titulo:</label>
        <input type="text" name="titulo" id="" required> <br />
        <label for="contenido">Contenido:</label>
        <textarea name="contenido" id="contenido" required></textarea> <br />
        <input type="submit" value="Guardar entrada">
    </form>
</body>

</html>