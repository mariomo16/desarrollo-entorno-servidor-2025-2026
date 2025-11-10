<?php
class BBDD
{

    private static $instance;
    public function __construct()
    {
        echo "Conectando con BBDD...";
    }
    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new BBDD();
        }
        return self::$instance;
    }
    public function guardar($algo)
    {
        echo nl2br("Voy a guardar $algo en la BBDD\n");
    }
}