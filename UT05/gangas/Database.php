<?php
    class Database {
        private $sqlite_file = 'database.sqlite';
        private static $connection;

        public function __construct() {
            self::$connection = new SQLite3($this->sqlite_file);
            $this->initializeDatabase();
        }

        private function initializeDatabase() {
            self::$connection->exec('CREATE TABLE IF NOT EXISTS gangas (id INTEGER PRIMARY KEY AUTOINCREMENT, titulo TEXT, descripcion TEXT, precio NUMBER)');

            self::$connection->exec('CREATE TABLE IF NOT EXISTS users (id INTEGER PRIMARY KEY AUTOINCREMENT, nickname TEXT, email TEXT UNIQUE, password TEXT)');

            self::$connection->exec('CREATE TABLE IF NOT EXISTS hashtags (id INTEGER PRIMARY KEY AUTOINCREMENT, nombre TEXT UNIQUE)');

            self::$connection->exec('CREATE TABLE IF NOT EXISTS gangas_hashtags (ganga_id INTEGER, hashtag_id INTEGER, PRIMARY KEY(ganga_id, hashtag_id), FOREIGN KEY(ganga_id) REFERENCES gangas(id) ON DELETE CASCADE, FOREIGN KEY(hashtag_id) REFERENCES hashtags(id) ON DELETE CASCADE)');

            self::$connection->exec('CREATE TABLE IF NOT EXISTS user_likes (user_id INTEGER, ganga_id INTEGER, PRIMARY KEY(user_id, ganga_id), FOREIGN KEY(user_id) REFERENCES users(id) ON DELETE CASCADE, FOREIGN KEY(ganga_id) REFERENCES gangas(id) ON DELETE CASCADE)');
        }

        public static function getConnection() {
            return self::$connection;
        }
    }
?>