<?php
namespace App\controllers;
use App\models\DetalleFacturaModels\Articulo;
require '../Models/detalleFacturaModels.php';


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
            $modelo = new Articulo();
            $modelo->setId($articulo['id']);
            $modelo->setNombre($articulo['nombre']);
            $modelo->setPrecio($articulo['precio']);
            // Puedes agregar más propiedades según la estructura de tu tabla 'articulos'
            
            array_push($articulos, $modelo);
        }
        
        return $articulos;
    }
    
}

$id = 1;
$conexion = new ConexionDBController();
$articuloController = new ArticuloController($conexion);
$articulo = $articuloController->obtenerArticulo($id);
