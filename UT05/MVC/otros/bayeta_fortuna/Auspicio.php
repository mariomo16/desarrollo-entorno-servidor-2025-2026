<?php
    class Auspicio {
        private $id;
        private $autor;
        private $descripcion;

        public function __construct($id, $autor, $descripcion) {
            $this->id = $id;
            $this->autor = $autor;
            $this->descripcion = $descripcion;
        }

        public function getId() {
            return $this->id;
        }

        public function getAutor() {
            return $this->autor;
        }

        public function getDescripcion() {
            return $this->descripcion;
        }

        public function save() {
            $db = Database::getConnection();
            $stmt = $db->prepare('INSERT INTO auspicios (autor, descripcion) VALUES (:autor, :descripcion)');
            $stmt->bindValue(':autor', $this->autor, SQLITE3_TEXT);
            $stmt->bindValue(':descripcion', $this->descripcion, SQLITE3_TEXT);
            $stmt->execute();
            $this->id = $db->lastInsertRowID();
        }

        public function delete() {
            $db = Database::getConnection();
            $stmt = $db->prepare('DELETE FROM auspicios WHERE id = :id');
            $stmt->bindValue(':id', $this->id, SQLITE3_INTEGER);
            $stmt->execute();
        }

        public static function getAll() {
            $db = Database::getConnection();
            $result = $db->query('SELECT * FROM auspicios');
            $auspicios = [];
            while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
                $auspicios[] = new Auspicio($row['id'], $row['autor'], $row['descripcion']);
            }
            return $auspicios;
        }

        public static function getRandom() {
            $db = Database::getConnection();
            $result = $db->query('SELECT * FROM auspicios ORDER BY RANDOM() LIMIT 1');
            $row = $result->fetchArray(SQLITE3_ASSOC);
            if ($row) {
                return new Auspicio($row['id'], $row['autor'], $row['descripcion']);
            }
            return null;
        }

        public static function getById($id) {
            $db = Database::getConnection();
            $stmt = $db->prepare('SELECT * FROM auspicios WHERE id = :id');
            $stmt->bindValue(':id', $id, SQLITE3_ASSOC);
            $result = $stmt->execute();
            $row = $result->fetchArray(SQLITE3_ASSOC);
            if ($row) {
                return new Auspicio($row['id'], $row['autor'], $row['descripcion']);
            }
            return null;
        }
        
    }