<?php

// Esto es un comentario de linea

/* 
Esto es un bloque de comentarios
*/

echo "Hola, PHP \n";

// Variables primitivas

$my_string = "Esto es una cadena de texto";
$my_string = "Aquí cambio el valor de la cadena de texto";
echo $my_string . "\n"; // \n es un salto de linea, aunque solo se muestra en consola
echo gettype($my_string) . "\n"; // string

$my_string = 6; // Tipado dinámico
echo $my_string . "\n";
echo gettype($my_string) . "\n"; // integer

$my_string = "Esto es una cadena de texto";

$my_int = 7;
$my_int = $my_int + 4; // Esto cambiara el valor de la variable
echo $my_int . "\n"; // 11
echo $my_int - 1 . "\n"; // 10 - Solo opera aqui, no cambia el valor de la variable
echo $my_int . "\n"; // 11
echo gettype($my_int) . "\n"; // integer

$my_double = 6.5;
echo gettype($my_double) . "\n"; // double
echo $my_int + $my_double . "\n"; // 17.5
// echo $my_int + $my_double + $my_string . "\n"; // Fatal error

$my_bool = false;
echo $my_bool . "\n"; // no tiene valor
echo gettype($my_bool) . "\n"; // boolean
$my_bool = true;
echo $my_bool . "\n"; // 1
echo gettype($my_bool) . "\n"; // boolean

echo "El valor de mi integer es $my_int y el de mi boolean es $my_bool.\n";

// Constantes

const MY_CONSTANT = "Valor de la constante";
echo MY_CONSTANT . "\n"; // Valor de la constante

// Listas (Array indexado)

$my_array = [$my_string, $my_int, $my_double];
echo gettype($my_array) . "\n"; // array
echo $my_array[0] . "\n"; // Esto es una cadena de texto
array_push($my_array, $my_bool);
// echo $my_array . "\n"; // Warning: Array to string conversion
print_r($my_array);
// echo $my_array[4] . "\n"; // Warning: Undefined array key 4

// Diccionario (Array asociativo)

$my_dict = array("string" => $my_string, "int" => $my_int, "bool" => $my_bool);
echo gettype($my_dict) . "\n"; // array
print_r($my_dict);
// echo $my_dict[0] . "\n"; // Warning: Undefined array key 0
echo $my_dict["int"] . "\n"; // 11

// Set (Arrays sin elementos duplicados)

array_push($my_array, "Mario");
array_push($my_array, "Mario");
print_r($my_array); // Muestra $my_array con los dos elementos nuevos agregados
// echo array_unique($my_array); // Warning: Array to string conversion
print_r(array_unique($my_array)); // Elimina elementos duplicados agregadas anteriormente

// Flujos

for ($i = 0; $i <= 10; $i++) {
    echo $i . "\n";
}

foreach ($my_array as $my_item) {
    echo $my_item . "\n";
}

$index = 0;
while ($index <= sizeof($my_array) - 1) {
    echo $my_array[$index] . "\n";
    $index++;
}

$my_int = 13;
$my_string = "Hola";
if ($my_int == 11 && $my_string == "Hola") {
    echo "El valor es 11\n";
} elseif ($my_int == 12 || $my_string == "Hola") {
    echo "El valor es 12\n";
} else {
    echo "El valor no es 11\n";
}

// Funciones

function print_number(int $my_number)
{
    echo $my_number . "\n";
}

print_number(10.5);
print_number(11);
print_number(12);

class MyClass
{
    public $name;
    public $age;

    function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }
}

$my_class = new MyClass("Mario", 23);
print_r($my_class);
echo $my_class->name . "\n"; // Mario
$my_class->name = "mariomo16" . "\n";
echo $my_class->name . "\n"; // mariomo16
echo gettype($my_class) . "\n"; // object

/* 
    https://php.net/manual/es
    https://learn-php.org
    https://w3schools.com/php

    https://www.youtube.com/watch?v=nPCJAx5c1uE
*/