<?php

require_once __DIR__ . "/../model/Entrada.php";
require_once 'PerfilController.php';

class EntradaController
{
    private static $instance = null;

    private function __construct()
    {
        # Se queda vacío
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new EntradaController();
        }
        return self::$instance;
    }
    public function getEntrada($fichero)
    {
        return Entrada::find($fichero);
    }

    public function getAllEntradas()
    {
        $ficheros_entradas = glob('./data/*.json');
        $entradas = [];
        foreach ($ficheros_entradas as $fichero) {
            $entradas[$fichero] = Entrada::find($fichero);
        }
        return $entradas;
    }

    public function guardarEntrada($titulo, $contenido)
    {
        $entrada = new Entrada($titulo, $contenido);
        $entrada->save();
    }

    public function mostrarEntradas()
    {
        $perfilController = new PerfilController();


        $entradas = $this->getAllEntradas();
        $usuario = $perfilController->getPerfil("Mario");
        require __DIR__ . '/../view/listado.php';
    }

    public function mostrarEntrada($id)
    {
        $entrada = $this->getEntrada($id);
        require __DIR__ . '/../view/entrada.php';
    }

    public function crearEntrada()
    {
        require __DIR__ . '/../view/crear-entrada.php';
    }
}