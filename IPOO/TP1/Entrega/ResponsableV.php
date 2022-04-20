<?php
class ResponsableV {
    //Atributos
    private $numEmpleado;
    private $numLicencia;
    private $nombre;
    private $apellido;

    //Constructo
    public function __construct($numEmpleado, $numLicencia, $nombre, $apellido){
        $this->numEmpleado = $numEmpleado;
        $this->numLicencia = $numLicencia;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
    }

    //Getters y setters
    public function getNumEmpleado(){
        return $this->numEmpleado;
    }

    public function setNumEmpleado($numEmpleado){
        $this->numEmpleado = $numEmpleado;
    }

    public function getNumLicencia(){
        return $this->numLicencia;
    }

    public function setNumLicencia($numLicencia){
        $this->numLicencia = $numLicencia;
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

    //toString
    public function __toString(){
        $numEmpleado = $this->getNumEmpleado();
        $numLicencia = $this->getNumLicencia();
        $nombre = $this->getNombre();
        $apellido = $this->getApellido();
        $str = "
        Número de empleado: $numEmpleado.\n
        Número de licencia: $numLicencia.\n
        Nombre: $nombre.\n
        Apellido: $apellido.\n";
        return $str;
    }
}