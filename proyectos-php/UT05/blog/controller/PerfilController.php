<?php

require_once __DIR__ . '/../model/Perfil.php';

class PerfilController
{
    private static $instance = null;

    private function __construct()
    {
        # Se queda vacío
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new PerfilController();
        }
        return self::$instance;
    }

    public function getPerfil($username)
    {
        return Perfil::find($username);
    }

    public function mostrarPerfil($username)
    {
        $usuario = $this->getPerfil($username);
        require __DIR__ . '/../view/perfil.php';
    }
}