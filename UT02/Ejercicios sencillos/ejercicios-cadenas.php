<?php
$nombre = "Mario";
$primerApellido = "Morales";
$segundoApellido = "Ortega";
$ciudad = "Murcia";
$anioNacimiento = 2002;

$cadenaTexto = "Hola, soy Mario Morales Ortega, vivo en Cieza.";
?>
<!doctype html>

<head>
    <title>Ejercicios PHP: Cadenas de texto</title>
</head>

<body>

    <h1>Ejercicios sobre operaciones con cadenas de texto (PHP)</h1>

    <p>Implementa las soluciones en este mismo archivo dentro de las secciones PHP indicadas.</p>

    <section>
        <h2>Ejercicio 1 — Concatenación y formato</h2>
        <p>Declara varias variables de tipo string (nombre, apellido, ciudad) y:</p>
        <ul>
            <li>Concaténalas con distintos métodos (operador ., interpolación doble comillas).</li>
        </ul>
        <?php
        $concatenacion = $nombre . " $primerApellido vive en " . $ciudad . "."
        ?>
        <p><?= $concatenacion ?></p>

        <?php
        // EJERCICIO 1
        ?>

    </section>

    <section>
        <h2>Ejercicio 2 — Longitud, mayúsculas/minúsculas y recorte</h2>
        <p>Usa funciones para:</p>
        <ul>
            <li>Calcular la longitud de una cadena con `strlen`.</li>
            <li>Convertir a mayúsculas y minúsculas (`strtoupper`, `strtolower`).</li>
            <li>Recortar espacios en los extremos con `trim` y mostrar el antes/después.</li>
        </ul>
        <?php
        $longitudCadena = strlen($cadenaTexto);
        $cadenaMayusculas = strtoupper($cadenaTexto);
        $cadenaMinusculas = strtolower($cadenaTexto);
        $cadenaRecortada = trim($cadenaTexto);
        ?>
        <p>Cadena sin modificar: <?= $cadenaTexto ?></p>
        <p>Longitud de la cadena: <?= $longitudCadena ?></p>
        <p>Cadena en mayúsculas: <?= $cadenaMayusculas ?></p>
        <p>Cadena en minúsculas: <?= $cadenaMinusculas ?></p>
        <p>Cadena recortada: <?= $cadenaRecortada ?></p>
        <?php
        // EJERCICIO 2
        ?>

    </section>

    <section>
        <h2>Ejercicio 3 — Búsqueda y reemplazo</h2>
        <p>Realiza operaciones de búsqueda y sustitución:</p>
        <ul>
            <li>Comprobar si una subcadena existe dentro de una cadena (`strpos` o `str_contains`).</li>
            <li>Reemplazar una palabra por otra usando `str_replace`.</li>
            <li>Haz una versión sensible y otra insensible a mayúsculas (`str_ireplace`).</li>
            <li>Crea una contraseña con tu nombre + tu año de nacimiento, con las siguientes modificaciones:
                <ul>
                    <li>Reemplaza las vocales por (a=@, e=€, i=!, o=0, u=^).</li>
                </ul>
            </li>
        </ul>
        <?php
        $posicionSubcadena = strpos($cadenaTexto, "vivo en");
        $contieneSubcadena = str_contains($cadenaTexto, "vivo en");
        $reemplazo = str_replace("Cieza", "Murcia", $cadenaTexto);
        $reemplazoSensible = str_replace("Cieza", "Murcia", $cadenaTexto);
        $reemplazoInsensible = str_ireplace("cieza", "murcia", $cadenaTexto);
        $contrasenia = str_replace(['a', 'e', 'i', 'o', 'u'], ['@', '€', '!', '0', '^'], $nombre . $anioNacimiento);
        ?>
        <p><?= $cadenaTexto ?></p>
        <p>Posición subcadena <?= $posicionSubcadena ?></p>
        <p>Cadena contiene subcadena: <?= $contieneSubcadena ?></p>
        <p>Cadena con palabra reemplazada: <?= $reemplazo ?></p>
        <p>Cadena con palabra reemplazada (sensible a mayúsculas): <?= $reemplazoSensible ?></p>
        <p>Cadena con palabra reemplazada (insensible a mayúsculas): <?= $reemplazoInsensible ?></p>
        <p>Contraseña modificada: <?= $contrasenia ?></p>

        <?php
        // EJERCICIO 3
        ?>

    </section>

    <section>
        <h2>Ejercicio 4 — Subcadenas y división</h2>
        <p>Trabaja con subcadenas:</p>
        <ul>
            <li>Extraer una subcadena con `substr`.</li>
            <li>Dividir una cadena por un separador con `explode` y volver a unir con `implode`.</li>
            <li>Usa `str_split` para convertir en array de caracteres.</li>
            <li>Escribe tu nombre de Star Wars:
                <ul>
                    <li>Nombre: las primeras 3 letras de tu primer apellido + las primeras 2 letras de tu nombre</li>
                    <li>Apellido: las primeras 3 letras de tu segundo apellido + las primeras 3 letras de tu ciudad</li>
                    <li>En nombre y apellido: convierte la primera letra a mayúscula y el resto a minúscula</li>
                </ul>
            </li>
        </ul>
        <?php
        $subcadenaExtraida = substr($cadenaTexto, 0, 15);
        $cadenaDividida = explode(" ", $cadenaTexto);
        $cadenaUnida = implode(" ", $cadenaDividida);
        $arrayCaracteres = str_split($cadenaTexto);

        $starWarsNombre = ucfirst(substr($primerApellido, 0, 3)) . ucfirst(substr($nombre, 0, 2));
        $starWarsApellido = ucfirst(substr($segundoApellido, 0, 3)) . ucfirst(substr($ciudad, 0, 3));
        $starWarsNombreCompleto = ucwords(mb_strtolower($starWarsNombre . " " . $starWarsApellido));
        ?>
        <p>Subcadena extraída: <?= $subcadenaExtraida ?></p>
        <p>Cadena dividida: <?= implode(", ", $cadenaDividida) ?></p>
        <p>Cadena unida: <?= $cadenaUnida ?></p>
        <p>Array de caracteres: <?= implode(", ", $arrayCaracteres) ?></p>
        <p>Nombre de Star Wars: <?= $starWarsNombreCompleto; ?></p>

        <?php
        // EJERCICIO 4
        ?>

    </section>

</body>

</html>