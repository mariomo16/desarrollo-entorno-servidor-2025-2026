<?php

require_once 'model/Frase.php';

class FraseController
{
    public static function random(): void
    {
        $frase = Frase::random();
        require_once 'view/frase/random.php';
    }

    public static function index(): void
    {
        $frases = Frase::all();
        require_once 'view/frase/index.php';
    }

    public static function autor($autor): void
    {
        $frases = Frase::byAutor($autor);
        require_once 'view/frase/index.php';
    }

    public static function texto($texto): void
    {
        $frases = Frase::byTexto($texto);
        require_once 'view/frase/index.php';
    }

    public static function show($id): void
    {
        $frase = Frase::byId($id);
        require_once 'view/frase/show.php';
    }
}