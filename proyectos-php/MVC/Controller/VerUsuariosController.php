<?php

require '../Model/Conexion.php';

// Llamo al método constructor del modelo Conexión
$con = new Conexion();

// Llamo al método getUsers de la clase Conexión
$usuarios = con->getUsers();

// Con esto hago que la Vista tenga acceso a las variables del Controlador
require '../View/ver_usuarios.php';