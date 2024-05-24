<?php

namespace App\controllers;

class ConexionDBController
{
    private $host = 'localhost';
    private $user = 'root'; 
    private $pwd = 'root'; 
    private $dataBase = 'facturacion_tienda_db';
    protected $conex;

    public function __construct()
    {
        $this->conex = new \mysqli($this->host, $this->user, $this->pwd, $this->dataBase);

        if ($this->conex->connect_error) {
            die('Error en la conexión a la base de datos: ' . $this->conex->connect_error);
        } else {
            //echo "Conexión establecida exitosamente";
        }
    }

    public function execSQL($sql)
    {
        $result = $this->conex->query($sql);
        
        if (!$result) {
            echo 'Error en la ejecución de la consulta: ' . $this->conex->error;
            return false;
        }
        
        return $result;
    }

    public function getConnection()
    {
        return $this->conex;
    }

    public function close()
    {
        $this->conex->close();
    }
}

// Ejemplo de uso de la clase
$conexion = new ConexionDBController();

?>
