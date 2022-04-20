<?php
class Pasajero{
    //Atributos
    private $nombre;
    private $apellido;
    private $numDni;
    private $telefono;

    //Constructo
    public function __construct($nombre, $apellido, $numDni, $telefono){
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->numDni = $numDni;
        $this->telefono = $telefono;
    }

    //Getters y setters
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

    public function getNumDni(){
        return $this->numDni;
    }

    public function setNumDni($numDni){
        $this->numDni = $numDni;
    }

    public function getTelefono(){
        return $this->telefono;
    }

    public function setTelefono($telefono){
        $this->telefono = $telefono;
    }

    public function __toString(){
        $nombre = $this->getNombre();
        $apellido = $this->getApellido();
        $dni = $this->getNumDni();
        $telefono = $this->getTelefono();
        $str = "
        *-----*
        Nombre: $nombre.\n
        Apellido: $apellido.\n
        DNI: $dni.\n
        Telefono: $telefono.\n
        *-----*\n";
        return $str;
    }
}