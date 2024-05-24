<?php
namespace App\models;

class DetalleFactura {
    private $id;
    private $cantidad;
    private $precioUnitario;
    private $idArticulo;
    private $referenciaFactura;

    public function __construct($id, $cantidad, $precioUnitario, $idArticulo, $referenciaFactura) {
        $this->id = $id;
        $this->cantidad = $cantidad;
        $this->precioUnitario = $precioUnitario;
        $this->idArticulo = $idArticulo;
        $this->referenciaFactura = $referenciaFactura;
    }

    public function getId() {
        return $this->id;
    }

    public function getCantidad() {
        return $this->cantidad;
    }

    public function getPrecioUnitario() {
        return $this->precioUnitario;
    }

    public function getIdArticulo() {
        return $this->idArticulo;
    }

    public function getReferenciaFactura() {
        return $this->referenciaFactura;
    }
}
class Articulo {
    private $id;
    private $nombre;
    private $precio;

    
    public function __construct($id, $nombre, $precio) {
        $this->id= $id;
        $this->nombre = $nombre;
        $this->precio = $precio;
    }

    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function setPrecio($precio) {
        $this->precio = $precio;
    }

    
}

?>

