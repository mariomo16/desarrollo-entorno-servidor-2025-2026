<?php
require "BBDD.php";
class Cliente
{
    public function guardar()
    {
        $bbdd = BBDD::getInstance();
        $bbdd->guardar('cliente');
    }
}