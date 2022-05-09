<?php
class Persona{
    //Atributos
    private $dni;
    private $nombre;
    private $apellido;

    public function __construct($dniInt, $nombreStr, $apellidoStr){
        $this->dni = $dniInt;
        $this->nombre = $nombreStr;
        $this->apellido = $apellidoStr;
    }

    public function getDni(){
        return $this->dni;
    }
    public function setDni($dni){
        $this->dni = $dni;
    }
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

    public function __toString(){
        $str = "
        DNI: {$this->getDni()}.\n
        Nombre: {$this->getNombre()}.\n
        Apellido: {$this->getApellido()}.\n";
        return $str;
    }
}