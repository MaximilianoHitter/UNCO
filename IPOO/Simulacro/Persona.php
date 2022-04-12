<?php
class Persona{
    //Atributos
    private $nombre;
    private $apellido;
    private $dni;
    private $direccion;
    private $mail;
    private $telefono;
    private $neto;

    //Constructo
    public function __construct($nombre, $apellido, $dni, $direccion, $mail, $telefono, $neto){
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->dni = $dni;
        $this->direccion = $direccion;
        $this->mail = $mail;
        $this->telefono = $telefono;
        $this->neto = $neto;
    }

    //Metodos getter y setter 
    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function getApellido(){
        return $this->apellido;
    }
    public function setApellido($apellido){
        $this->apellido = $apellido;
    }
    public function getDni(){
        return $this->dni;
    }
    public function setDni($dni){
        $this->dni = $dni;
    }
    public function getDireccion(){
        return $this->direccion;
    }
    public function setDireccion($direccion){
        $this->direccion = $direccion;
    }
    public function getMail(){
        return $this->mail;
    }
    public function setMail($mail){
        $this->mail = $mail;
    }
    public function getTelefono(){
        return $this->telefono;
    }
    public function setTelefono($telefono){
        $this->telefono = $telefono;
    } 
    public function getNeto(){
        return $this->neto;
    } 
    public function setNeto($neto){
        $this->neto = $neto;
    }

    //toString
    public function __toString(){
        $str = "
        Nombre: {$this->getNombre()}. Apellido: {$this->getApellido()}. DNI: {$this->getDni()}. Dirección: {$this->getDireccion()}.
        Email: {$this->getMail()}. Teléfono: {$this->getTelefono()}. Neto: \${$this->getNeto()}.
        ";
        return $str;
    }
}