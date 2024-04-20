<?php

namespace App\controllers\databases;

use mysqli;

class ConexionDBController
{

    private $host = 'localhost';
    private $user = 'root';
    private $pwd = '';
    private $dataBase = 'facturacion_db';
    private $conex;


    public function __construct()
    {
        $this->conex = new mysqli($this->host, $this->user, $this->pwd, $this->dataBase);
    }
    public function execSQL($sql) // NOS permite Ejecuta nuestro sql 
    {
        if ($this->conex->connect_error) {
            die('Error en la conexion db' . $this->conex->connect_error);
        }
        return $this->conex->query($sql);
    }
    public function close()
    {
        $this->conex->close();
    }
}
