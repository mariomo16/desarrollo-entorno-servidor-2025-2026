<?php
class Ganga
{
    private $id;
    private $titulo;
    private $descripcion;
    private $precio;
    private $hashtags = []; // Array de hashtags asociados

    public function __construct($id, $titulo, $descripcion, $precio, $hashtags = [])
    {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->hashtags = $hashtags;
    }

    // ------------------- Getters -------------------
    public function getId()
    {
        return $this->id;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function getHashtags()
    {
        return $this->hashtags;
    }

    // ------------------- Obtener todas las gangas -------------------
    public static function getAll()
    {
        $db = Database::getConnection();
        $result = $db->query('SELECT * FROM gangas'); //linea 41
        $gangas = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $hashtags = self::getHashtagsByGanga($row['id']);
            $gangas[] = new Ganga($row['id'], $row['titulo'], $row['descripcion'], $row['precio'], $hashtags);
        }
        return $gangas;
    }

    // ------------------- Obtener ganga por ID -------------------
    public static function getById($id)
    {
        $db = Database::getConnection();
        $stmt = $db->prepare('SELECT * FROM gangas WHERE id = :id');
        $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
        $result = $stmt->execute();
        $row = $result->fetchArray(SQLITE3_ASSOC);
        if ($row) {
            $hashtags = self::getHashtagsByGanga($row['id']);
            return new Ganga($row['id'], $row['titulo'], $row['descripcion'], $row['precio'], $hashtags);
        }
        return null;
    }

    // ------------------- Obtener hashtags de una ganga -------------------
    public static function getHashtagsByGanga($ganga_id)
    {
        $db = Database::getConnection();
        $stmt = $db->prepare('
            SELECT h.nombre 
            FROM hashtags h 
            INNER JOIN gangas_hashtags gh ON h.id = gh.hashtag_id 
            WHERE gh.ganga_id = :ganga_id
        ');
        $stmt->bindValue(':ganga_id', $ganga_id, SQLITE3_INTEGER);
        $result = $stmt->execute();
        $hashtags = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $hashtags[] = $row['nombre'];
        }
        return $hashtags;
    }

    // ------------------- Contar likes -------------------
    public function countLikes()
    {
        $db = Database::getConnection();
        $stmt = $db->prepare(
            'SELECT COUNT(*) as total FROM user_likes WHERE ganga_id = :ganga_id'
        );
        $stmt->bindValue(':ganga_id', $this->id, SQLITE3_INTEGER);
        $result = $stmt->execute();
        $row = $result->fetchArray(SQLITE3_ASSOC);

        return $row['total'] ?? 0;
    }
}
