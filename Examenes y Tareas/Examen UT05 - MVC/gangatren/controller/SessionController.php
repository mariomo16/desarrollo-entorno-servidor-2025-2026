<?php

class SessionController
{
    public function vistaLogin()
    {
        require_once './view/login.php';
    }

    public function login()
    {
        require_once __DIR__ . '/../database/Database.php';
        require_once __DIR__ . '/../model/Usuario.php';
        $db = new Database();
        $connection = $db->getConnection();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $login = $connection->prepare('SELECT * FROM usuarios WHERE email = :email');
            $login->bindValue(':email', $email, SQLITE3_TEXT);
            $result = $login->execute();
            $row = $result->fetchArray(SQLITE3_ASSOC);

            if ($row && password_verify($password, $row['password'])) {
                $usuario = new Usuario($row['id'], $row['nickname'], $row['email'], $row['password']);
                $_SESSION['usuario'] = serialize($usuario);
                header('Location: index.php?action=gangas');
                exit();
            } else {
                echo 'Credenciales inválidas. Por favor, inténtalo de nuevo.';
            }
        }
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        header('Location: index.php?action=login');
        exit();
    }
}