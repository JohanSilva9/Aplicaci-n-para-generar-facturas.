<?php
namespace App\models;

class Usuario {
    // Propiedades
    private $id;
    private $usuario;
    private $pwd;

    // Constructor
    public function __construct($id, $usuario, $pwd) {
        $this->id = $id;
        $this->usuario = $usuario;
        $this->pwd = $pwd;
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function getPwd() {
        return $this->pwd;
    }
}
?>
