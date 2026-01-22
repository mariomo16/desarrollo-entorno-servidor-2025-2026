<?php

class Frase
{
    private $id;
    private $texto;
    private $autor;

    public function __construct($id, $texto, $autor)
    {
        $this->id = $id;
        $this->texto = $texto;
        $this->autor = $autor;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTexto()
    {
        return $this->texto;
    }

    public function getAutor()
    {
        return $this->autor;
    }

    public function setTexto($texto)
    {
        $this->texto = $texto;
    }

    public function setAutor($autor)
    {
        $this->autor = $autor;
    }

    public static function getXml(): bool|SimpleXMLElement
    {
        return simplexml_load_file(__DIR__ . '/../data/frases.xml');
    }

    private static function _xmlElementToInstance($xml): Frase
    {
        $id = (int) $xml['id'];
        $texto = $xml;
        $autor = $xml['autor'];
        return new Frase($id, $texto, $autor);
    }

    public static function all(): array
    {
        $frases = [];
        foreach (Frase::getXml()->frase as $frase_xml) {
            $frases[] = Frase::_xmlElementToInstance($frase_xml);
        }
        return $frases;
    }

    public static function byId($id): Frase|null
    {
        $frases_xml = Frase::getXml();

        if ($id < 1 || $id > count($frases_xml->frase)) {
            return null;
        }

        $frase_xml = $frases_xml->xpath("frase[@id='$id']")[0];
        $frase = Frase::_xmlElementToInstance($frase_xml);
        return $frase;
    }

    public static function byAutor($autor): array
    {
        $frases_autor = Frase::getXml()->xpath("frase[@autor='$autor']");
        $frases = [];
        foreach ($frases_autor as $frase_xml) {
            $frases[] = Frase::_xmlElementToInstance($frase_xml);
        }
        return $frases;
    }

    public static function byTexto($texto): array
    {
        $frases_encontradas = Frase::getXml()->xpath("frase[contains(., '$texto')]");
        $frases = [];
        foreach ($frases_encontradas as $frase_xml) {
            $frases[] = Frase::_xmlElementToInstance($frase_xml);
        }
        return $frases;
    }

    public static function random(): Frase|null
    {
        return Frase::byId(rand(1, Frase::count()));
    }

    public static function count(): int
    {
        return count(Frase::getXml()->frase);
    }
}