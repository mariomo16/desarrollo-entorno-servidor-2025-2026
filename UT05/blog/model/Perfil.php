<?php

class Perfil
{
    public $nombre;
    public $email;

    public function __construct($nombre, $email)
    {
        $this->nombre = $nombre;
        $this->email = $email;
    }

    public static function find($username)
    {
        $data = [
            "username" => $username,
            "email" => $username . "@email.com"
        ];

        return new Perfil($data["username"], $data["email"]);
    }
}