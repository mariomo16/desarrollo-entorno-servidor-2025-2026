<?php

class Ridiculo
{
    private $id;
    private $frase_id;

    public function __construct($id, $frase_id)
    {
        $this->id = $id;
        $this->frase_id = $frase_id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getFraseId()
    {
        return $this->frase_id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setFraseId($frase_id)
    {
        $this->frase_id = $frase_id;
    }

    public function all()
    {
        //todo
    }

    public function byFrase($frase_id)
    {
        //todo
    }
}