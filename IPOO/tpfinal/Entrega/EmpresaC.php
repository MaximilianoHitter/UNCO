<?php
class Empresa{
    private $idempresa;
    private $nombre;
    private $edireccion;
    private $mensajeOp;

    public function __construct(){
        $this->idempresa = null;
        $this->nombre = '';
        $this->edireccion = '';
        $this->mensajeOp = '';
    }

    public function getIdempresa(){
        return $this->idempresa;
    }
    public function setIdempresa($idempresa){
        $this->idempresa = $idempresa;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function getEdireccion(){
        return $this->edireccion;
    }
    public function setEdireccion($edireccion){
        $this->edireccion = $edireccion;
    }
    public function getMensajeOp(){
        return $this->mensajeOp;
    }
    public function setMensajeOp($mensajeOp){
        $this->mensajeOp = $mensajeOp;
    }

    public function __toString(){
        $str = "
        Id de Empresa: {$this->getIdempresa()}.\n
        Nombre: {$this->getNombre()}.\n
        Dirección: {$this->getEdireccion()}.\n";
        return $str;
    }

    public function cargarDatos($idempresa, $nombre, $edireccion){
        $this->setIdempresa($idempresa);
        $this->setNombre($nombre);
        $this->setEdireccion($edireccion);
    }

    

}