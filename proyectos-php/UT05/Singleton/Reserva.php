<?php
require "BBDD.php";
class Reserva
{
    public function guardar()
    {
        $bbdd = BBDD::getInstance();
        $bbdd->guardar('reserva');
    }
}