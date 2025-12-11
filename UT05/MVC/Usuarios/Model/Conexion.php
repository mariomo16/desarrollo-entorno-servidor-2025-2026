<?php
// Esto es una clase
class Conexion
{
    private $con; // Propiedad privada
    // Constructor de la clase
    public function __construct()
    {
        // Lleno esa propiedad cuando se cree una conexión
        $this->con = mysqli('localhost', 'root', '', 'facebookPeroRojo'); // route, user, password, DBname
    }

    // Método para ver todos los 
    public function getUsers()
    {
        // Guardo los datos de la consulta a la base de datos en una variable
        $query = $this->con->query('SELECT * FROM usuarios');

        $retorno = [];
        $i = 0;
        while ($fila = $query->fetch_assoc()) {
            $retorno[$i] = $fila;
            $i++;
        }

        return $retorno;
    }
}