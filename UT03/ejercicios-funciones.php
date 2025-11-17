<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios con funciones</title>
</head>

<body>
    <h1>Ejercicios con funciones</h1>
    <h2>Ejercicio 1</h2>
    <?php
    $esPar = function ($numero) {
        return $numero % 2 == 0;
    };
    echo "<p>" . var_export($esPar(7)) . "</p>";
    ?>

    <h2>Ejercicio 4</h2>
    <?php
    $alumnos = [
        ["nombre" => "Mario", "apellidos" => "Ortega", "edad" => 23, "nre" => 1745008],
        ["nombre" => "Alberto", "apellidos" => "Ortega", "edad" => 30, "nre" => 2837029],
        ["nombre" => "Adrian", "apellidos" => "Ortega", "edad" => 17, "nre" => 1943729]
    ];

    function eliminarMenoresEdad(&$alumnos)
    {
        $eliminado = false;
        foreach ($alumnos as $index => $alumno) {
            if ($alumno["edad"] < 18) {
                unset($alumnos[$index]);
                $eliminado = true;
            }
        }
        return $eliminado;
    }
    ?>

    <h2>Ejercicio 5</h2>
    <?php
    // Crea una función que reciba N y devuelva el valor de la posición N de la serie de Fibonacci.
    
    function fibonacci($n)
    {
        if ($n == 1 || $n == 2)
            return 1; {
            $pos1 = 1;
            $pos2 = 1;
            for ($i = 3; $i <= $n; $i++) {
                $suma = $pos1 + $pos2;
                $pos1 = $pos2;
                $pos2 = $suma;
            }
        }
        return $pos2;
    }
    ?>

    <h2>Ejercicio 6</h2>
    <?php
    // Crea una función que reciba N y devuelva un array con los N primeros números primos.
    
    $n = $_GET["n"];
    function esPrimo($n)
    {
        if ($n == 1 || $n == 2)
            return true;
        if ($n % 2 == 0)
            return false;
        for ($i = 3; $i <= sqrt($n); $i++) {
            if ($n % $i == 0)
                return false;
        }
        return true;
    }
    function primos($n)
    {
        $lista = [];
        $numero = 1;
        while (sizeof($lista) < $n) {
            if (esPrimo($numero)) {
                array_push($lista, $numero);
            }
            $numero++;
        }
        return $lista;
    }
    ?>
    <p><?= implode(", ", primos($n)) ?></p>

    <h2>Ejercicio 7</h2>
    <?php
    // Crea una función que reciba un texto y devuelva un array asociativo con el número de apariciones de cada palabra en el texto.
    
    $texto = "En que leer, a buscar las aventuras con todo Quieren decir que tenía el sobrenombre de Quijada, o Quesada, pero con sus armas y caballo Limpias, pues, sus armas, gran madrugador adarga antigua, un hidalgo de los de lanza en astillero, otra cosa sino buscar una dama pero Frisaba la edad de nuestro hidalgo.

    Pero esto importa poco a nuestro cuento;... un hidalgo de los de lanza en astillero, pero de sembradura para comprar libros de caballerías y Es, pues, de saber; duelos y quebrantos los sábados,; lantejas los viernes,; lantejas los viernes, y galgo corredor.. Una olla de algo más vaca que carnero,, Porque el caballero andante sin amores.

    Que en esto hay alguna diferencia sin embargo Pero esto importa poco a nuestro cuento; con todo y fue que le pareció convenible y necesario, que jamás dio loco en el mundo, de modo que Y llegó a tanto su curiosidad y desatino en esto,, y fue que le pareció convenible y necesario, no se salga un punto de la verdad.";

    function limpiarTexto($texto)
    {
        $texto = strtolower($texto);
        $texto = str_replace([".", ",", ":", ";", "¿", "?", "¡", "!"], '', $texto);
        $texto = str_replace(['á', 'e', 'í', 'ó', 'ú'], ['a', "e", "i", "o", "u"], $texto);
        return $texto;
    }

    function conteoPalabras($texto)
    {
        $texto = limpiarTexto($texto);
        $conteo = [];
        foreach (explode(" ", $texto) as $palabra) {
            if (isset($conteo[$palabra])) {
                $conteo[$palabra]++;

            } else {
                $conteo[$palabra] = 1;
            }
            return $conteo;
        }
    }
    ?>
    <pre>
        <?php
        $conteo = conteoPalabras($texto);
        asort($conteo);
        print_r($conteo);
        ?>
    </pre>
</body>

</html>