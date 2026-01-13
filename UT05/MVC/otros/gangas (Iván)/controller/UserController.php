<?php
    require_once __DIR__ . '/../data/Database.php';
    require_once __DIR__ . '/../model/User.php';

    class UserController{

        public function getLogin(){
            $error = null;
            require_once __DIR__ . '/../view/login.php';
        }

        public function getRegister(){
            $error = null;
            require_once __DIR__ . '/../view/register.php';
        }

        public function addUser(){
            $nickname = $_POST['nickname'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            if ($nickname && $email && $password) {
                try {
                    $user = new User(null, $nickname, $email, $password);
                    $user->register();

                    // Login automático tras registro
                    $_SESSION['user_id'] = $user->getId();
                    $_SESSION['user_nickname'] = $user->getNickname();

                    //header('Location: login.php');
                    //exit;
                } catch (Exception $e) {
                    $error = 'El email ya está registrado';
                }
            } else {
                $error = 'Todos los campos son obligatorios';
            }
        }

        public function loginUser(){
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            $user = User::login($email, $password);

            if ($user) {
                // Guardar usuario en sesión
                $_SESSION['user_id'] = $user->getId();
                $_SESSION['user_nickname'] = $user->getNickname();

                // Redirigir al listado de gangas
                header('Location: index.php?action=listado');
                exit;
            } else {
                $error = 'Email o contraseña incorrectos';
                header('Location: index.php?action=error');
                exit;
            }
        }
        
    }