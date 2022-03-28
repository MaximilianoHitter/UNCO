<?php
class Persona{
    //Atributos
    private $nombreStr;
    private $apellidoStr;
    private $tipoDocumentoStr;
    private $numeroDocumentoInt;

    //Constructo
    public function __construct($nombre, $apellido, $tipoDocumento, $numeroDocumento){
        $this->nombreStr = $nombre;
        $this->apellidoStr = $apellido;
        $this->tipoDocumentoStr = $tipoDocumento;
        $this->numeroDocumentoInt = $numeroDocumento;
    }

    //Metodos
    //Getters y setters 

    public function getNombreStr(){
        return $this->nombreStr;
    }

    public function setNombreStr($nombreStr){
        $this->nombreStr = $nombreStr;
    }

    public function getApellidoStr(){
        return $this->apellidoStr;
    }

    public function setApellidoStr($apellidoStr){
        $this->apellidoStr = $apellidoStr;
    }

    public function getTipoDocumentoStr(){
        return $this->tipoDocumentoStr;
    }

    public function setTipoDocumentoStr($tipoDocumentoStr){
        $this->tipoDocumentoStr = $tipoDocumentoStr;
    }

    public function getNumeroDocumentoInt(){
        return $this->numeroDocumentoInt;
    }

    public function setNumeroDocumentoInt($numeroDocumentoInt){
        $this->numeroDocumentoInt = $numeroDocumentoInt;
    }

    //toString 
    public function __toString(){
        $str = "
        Nombre: {$this->getNombreStr()}\n
        Apellido: {$this->getApellidoStr()}\n
        Tipo de Documento: {$this->getTipoDocumentoStr()}\n 
        Número de Documento: {$this->getNumeroDocumentoInt()}\n";
        return $str;
    }
}