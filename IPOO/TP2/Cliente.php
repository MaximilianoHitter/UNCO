<?php
class Cliente{
    //Atributos
    private $nombre;
    private $tramite;

    //Construct 
    public function __construct($nombre, $tramite){
        $this->nombre = $nombre;
        $this->tramite = $tramite; 
    }

    //getter y setter
    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getTramite(){
        return $this->tramite;
    }

    public function setTramite($tramite){
        $this->tramite = $tramite;
    }

    //toString
    public function __toString(){
        $str = "
        Nombre cliente: {$this->getNombre()}\n
        Tramite: {$this->getTramite()}\n";
        return $str;
    }
}