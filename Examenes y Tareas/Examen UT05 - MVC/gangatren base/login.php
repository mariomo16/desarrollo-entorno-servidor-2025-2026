<?php

    session_start();
    require_once __DIR__ . '/database/Database.php';
    require_once __DIR__ . '/model/Usuario.php';
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
            header('Location: index.php');
            exit();
        } else {
            echo 'Credenciales inválidas. Por favor, inténtalo de nuevo.';
        }
    }

?>