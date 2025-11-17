<?php

// Función para filtrar valores iguales (numérico y texto)
function filtrar_igual($productos, $campo, $valor)
{
    return array_filter($productos, function ($producto) use ($campo, $valor) {
        return $producto[$campo] == $valor;
    });
}

// Función para filtrar mayor que (numérico)
function filtrar_mayor_que($productos, $campo, $valor)
{
    return array_filter($productos, function ($producto) use ($campo, $valor) {
        return is_numeric($producto[$campo]) && $producto[$campo] > $valor;
    });
}

// Función para filtrar menor que (numérico)
function filtrar_menor_que($productos, $campo, $valor)
{
    return array_filter($productos, function ($producto) use ($campo, $valor) {
        return is_numeric($producto[$campo]) && $producto[$campo] < $valor;
    });
}

// Función para filtrar texto que contiene (se comprueba en minúsculas)
function filtrar_contiene($productos, $campo, $valor)
{
    // https://stackoverflow.com/questions/33056701/array-match-values-filter-php
    return array_filter($productos, function ($producto) use ($campo, $valor) {
        return stripos($producto[$campo], strtolower($valor)) !== false;
    });
}