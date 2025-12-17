<?php
require_once 'Ganga.php';

class Hashtag
{
    private $id;
    private $nombre;

    public function __construct($id, $nombre)
    {
        $this->id = $id;
        $this->nombre = $nombre;
    }

    // ------------------- Getters -------------------
    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    // ------------------- Obtener hashtag por nombre -------------------
    public static function getByNombre($nombre)
    {
        $db = Database::getConnection();
        $stmt = $db->prepare('SELECT * FROM hashtags WHERE nombre = :nombre');
        $stmt->bindValue(':nombre', $nombre, SQLITE3_TEXT);
        $result = $stmt->execute();
        $row = $result->fetchArray(SQLITE3_ASSOC);
        if ($row) {
            return new Hashtag($row['id'], $row['nombre']);
        }
        return null;
    }

    // ------------------- Obtener todas las gangas asociadas a este hashtag -------------------
    public function getGangas()
    {
        $db = Database::getConnection();
        $stmt = $db->prepare('
            SELECT g.* 
            FROM gangas g
            INNER JOIN gangas_hashtags gh ON g.id = gh.ganga_id
            WHERE gh.hashtag_id = :hashtag_id
        ');
        $stmt->bindValue(':hashtag_id', $this->id, SQLITE3_INTEGER);
        $result = $stmt->execute();

        $gangas = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $hashtags = Ganga::getHashtagsByGanga($row['id']);
            $gangas[] = new Ganga($row['id'], $row['titulo'], $row['descripcion'], $row['precio'], $hashtags);
        }
        return $gangas;
    }

    // ------------------- Filtrar gangas por nombre de categoría -------------------
    public static function getGangasByNombre($nombre)
    {
        // Primero buscamos el hashtag por su nombre
        $hashtag = self::getByNombre($nombre);

        // Si el hashtag existe, devolvemos sus gangas
        return $hashtag ? $hashtag->getGangas() : [];
    }
}
