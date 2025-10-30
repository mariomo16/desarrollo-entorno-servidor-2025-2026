<?php
// Para levantar el servidor integrado de PHP: php -S localhost:8000

$name = "Mario";
$isDev = true;
$age = 23;

var_dump($name); //string(5) "Mario"
var_dump($isDev); //bool(true)
var_dump($age); //int(23)

echo gettype($name); // string
echo gettype($isDev); //boolean
echo gettype($age); //integer

is_string($name); // 1
is_bool($isDev); // 1
is_int($age); // 1

define("NAME", $name); // Constante global
const NOMBRE = "Mario"; // Constante local

/*
$outputAge = match ($age) {
    0, 1, 2 => "Eres un bebé, $name",
    3, 4, 5, 6, 7, 8, 9, 10 => "Eres un niño, $name",
    11, 12, 13, 14, 15, 16, 17, 18 => "Eres un adolescente, $name",
    19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30 => "Eres u adulto joven, $name",
    default => "Eres un adulto, $name"
}
*/
$outputAge = match (true) {
    $age <= 2 => " Eres un bebé, $name.",
    $age >= 3 && $age <= 10 => " Eres un niño, $name.",
    $age >= 11 && $age <= 18 => " Eres un adolescente, $name.",
    $age >= 19 && $age <= 30 => " Eres u adulto joven, $name.",
    default => " Eres un adulto, $name.",
};

$bestLanguages = ["Java", "JavaScript", "PHP"];
$bestLanguages[] = "Python"; // Esto agrega este valor al final del array

$output = "Hola \"$name\", con una edad de $age.";
$output .= $outputAge; // Concatenación

?>

<h1>
    <?= $output; // Forma corta de hacer echo ?>
</h1>

<style>
    :root {
        color-scheme: light dark;
    }

    body {
        display: grid;
        place-content: center;
    }
</style>