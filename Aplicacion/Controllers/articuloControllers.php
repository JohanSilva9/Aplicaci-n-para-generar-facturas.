<?php

namespace App\controllers;
require '../Models/articuloModels.php';
use App\models\Articulo;



class articuloController
{
    private $conexion;

    public function __construct(ConexionDBController $conexion)
    {
        $this->conexion = $conexion;
    }

    public function obtenerArticulo($id)
    {
       
        $sqlArticulo = "SELECT * FROM articulos WHERE id = $id";
        
        
        $resultado = $this->conexion->execSQL($sqlArticulo);
        
        if ($resultado->num_rows > 0) {
           
            $articulo = $resultado->fetch_assoc();
            return $articulo;
        } else {
            
            return null;
        }
    }

    function obtenerArticulos(){
        $sqlArticulo = "SELECT * FROM articulos ";
        
        $resultado = $this->conexion->execSQL($sqlArticulo);
        $articulos = [];
        
        while($articulo = $resultado->fetch_assoc()){
            $id=$articulo['id'];
            $nombre=$articulo['nombre'];
            $precio =$articulo['precio'];
            $modelo = new Articulo($id, $nombre, $precio);
          
            
            
            array_push($articulos, $modelo);
        }
        
        return $articulos;
    }
    
}

$id = 1;
$conexion = new ConexionDBController();
$articuloController = new articuloController($conexion); 
$articulo = $articuloController->obtenerArticulo($id);
