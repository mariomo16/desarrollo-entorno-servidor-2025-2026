<?php
class User {
    private $id;
    private $nickname;
    private $email;
    private $password; // Esto debe estar hasheado

    public function __construct($id = null, $nickname = null, $email = null, $password = null) {
        $this->id = $id;
        $this->nickname = $nickname;
        $this->email = $email;
        $this->password = $password;
    }

    // ------------------- Getters -------------------
    public function getId() {
        return $this->id;
    }

    public function getNickname() {
        return $this->nickname;
    }

    public function getEmail() {
        return $this->email;
    }

    public function register() {
        $db = Database::getConnection();
        $stmt = $db->prepare(
            'INSERT INTO users (nickname, email, password)
            VALUES (:nickname, :email, :password)'
        );

        $stmt->bindValue(':nickname', $this->nickname, SQLITE3_TEXT);
        $stmt->bindValue(':email', $this->email, SQLITE3_TEXT);
        $stmt->bindValue(':password', $this->password, SQLITE3_TEXT);

        $stmt->execute();
        $this->id = $db->lastInsertRowID();
    }

    public static function login($email, $password) {
        $db = Database::getConnection();

        $stmt = $db->prepare('SELECT * FROM users WHERE email = :email');
        $stmt->bindValue(':email', $email, SQLITE3_TEXT);
        $result = $stmt->execute();

        $row = $result->fetchArray(SQLITE3_ASSOC);

        if ($row && $row['password'] === $password) {
            return new User(
                $row['id'],
                $row['nickname'],
                $row['email'],
                $row['password']
            );
        }

        return null;
    }

    // ------------------- Obtener usuario por ID -------------------
    public static function getById($id) {
        $db = Database::getConnection();
        $stmt = $db->prepare('SELECT * FROM users WHERE id = :id');
        $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
        $result = $stmt->execute();
        $row = $result->fetchArray(SQLITE3_ASSOC);
        if ($row) {
            return new User($row['id'], $row['nickname'], $row['email'], $row['password']);
        }
        return null;
    }

    // ------------------- Dar like a una ganga -------------------
    public function likeGanga($ganga_id) {
        $db = Database::getConnection();
        // Creamos la tabla si no existe
        $db->exec('CREATE TABLE IF NOT EXISTS user_likes (user_id INTEGER, ganga_id INTEGER, PRIMARY KEY(user_id, ganga_id), FOREIGN KEY(user_id) REFERENCES users(id) ON DELETE CASCADE, FOREIGN KEY(ganga_id) REFERENCES gangas(id) ON DELETE CASCADE)');
        
        $stmt = $db->prepare('INSERT OR IGNORE INTO user_likes (user_id, ganga_id) VALUES (:user_id, :ganga_id)');
        $stmt->bindValue(':user_id', $this->id, SQLITE3_INTEGER);
        $stmt->bindValue(':ganga_id', $ganga_id, SQLITE3_INTEGER);
        $stmt->execute();
    }

    // ------------------- Comprobar si el usuario ha dado like -------------------
    public function hasLiked($ganga_id) {
        $db = Database::getConnection();
        $stmt = $db->prepare('SELECT * FROM user_likes WHERE user_id = :user_id AND ganga_id = :ganga_id');
        $stmt->bindValue(':user_id', $this->id, SQLITE3_INTEGER);
        $stmt->bindValue(':ganga_id', $ganga_id, SQLITE3_INTEGER);
        $result = $stmt->execute();
        return ($result->fetchArray(SQLITE3_ASSOC) !== false);
    }

        // ------------------- Quitar like a una ganga -------------------
    public function unlikeGanga($ganga_id) {
        $db = Database::getConnection();
        $stmt = $db->prepare(
            'DELETE FROM user_likes WHERE user_id = :user_id AND ganga_id = :ganga_id'
        );
        $stmt->bindValue(':user_id', $this->id, SQLITE3_INTEGER);
        $stmt->bindValue(':ganga_id', $ganga_id, SQLITE3_INTEGER);
        $stmt->execute();
    }

}
?>
