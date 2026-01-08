<?php

    class Frase {
        private $id;
        private $texto;
        private $autor;

        public function __construct($id, $texto, $autor) {
            $this->id = $id;
            $this->texto = $texto;
            $this->autor = $autor;
        }

        public function getId() {
            return $this->id;
        }

        public function getTexto() {
            return $this->texto;
        }

        public function getAutor() {
            return $this->autor;
        }

        public function setTexto($texto) {
            $this->texto = $texto;
        }

        public function setAutor($autor) {
            $this->autor = $autor;
        }

        # TODO: función all()

        # TODO: función byId($id)

        # TODO: función byAutor($autor)

        # TODO: función byTexto($texto)

        # TODO: función random()

        # TODO: función count()

    }

?>