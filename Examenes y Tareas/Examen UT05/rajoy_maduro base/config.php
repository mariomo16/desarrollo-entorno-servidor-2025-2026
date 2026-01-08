<?php

    require_once 'model/Frase.php';
    $frases_xml = simplexml_load_file('data/frases.xml');

    function _xmlElementToInstance($xml) {
        $id = (int) $xml['id'];
        $texto = $xml;
        $autor = $xml['autor'];
        return new Frase($id, $texto, $autor);
    }

    function getFraseById($id) {
        global $frases_xml;

        if ($id < 1 || $id > count($frases_xml->frase)) {
            return null;
        }

        $frase_xml = $frases_xml->xpath("frase[@id='$id']")[0];
        $frase = _xmlElementToInstance($frase_xml);
        return $frase;
    }

    function getAllFrases() {
        global $frases_xml;

        $frases = [];
        foreach ($frases_xml->frase as $frase_xml) {
            $frases[] = _xmlElementToInstance($frase_xml);
        }
        return $frases;
    }

    function getFrasesByAutor($autor) {
        global $frases_xml;

        $frases_autor = $frases_xml->xpath("frase[@autor='$autor']");
        $frases = [];
        foreach ($frases_autor as $frase_xml) {
            $frases[] = _xmlElementToInstance($frase_xml);
        }
        return $frases;
    }

    function getFrasesByTexto($texto) {
        global $frases_xml;

        $frases_encontradas = $frases_xml->xpath("frase[contains(., '$texto')]");
        $frases = [];
        foreach ($frases_encontradas as $frase_xml) {
            $frases[] = _xmlElementToInstance($frase_xml);
        }
        return $frases;
    }

?>