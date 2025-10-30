<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios con arrays multidimensionales</title>
</head>

<body>
    <h1>Ejercicios con arrays multidimensionales</h1>

    <h2>Ejercicio 1</h2>
    <?php
    $alumnos = [
        ["nombre" => "Mario", "apellidos" => "Morales Ortega", "cursos" => ["Despliegue de aplicacines web", "Desarrollo de aplicaciones web en entorno servidor"]],
        ["nombre" => "Ilya", "apellidos" => "Osypov", "cursos" => ["Diseño de interfaces web"]],
        ["nombre" => "Perico", "apellidos" => "de los palotes", "cursos" => ["Desarrollo de aplicaciones web en entorno cliente", "Desarrollo de aplicaciones web en entorno servidor"],]
    ];
    echo "<p>" . $alumnos[1]["nombre"] . " " . $alumnos[1]["apellidos"] . " " . $alumnos[1]["cursos"][0] . "</p>";
    ?>

    <h2>Ejercicio 2</h2>
    <?php
    $matriz = [[]];
    ?>
</body>

</html>