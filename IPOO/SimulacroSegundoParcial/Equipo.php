<?php
require_once('Categoria.php');
class Equipo{
    private $nombre;
    private $nombreCapitan;
    private $cantJugadores;
    private $objCategoria;

    public function __construct($nombre, $nombreC, $cantJugadores, $objCategoria){
        $this->nombre = $nombre;
        $this->nombreCapitan = $nombreC;
        $this->cantJugadores = $cantJugadores;
        $this->objCategoria = $objCategoria;
    }

    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function getNombreCapitan(){
        return $this->nombreCapitan;
    }
    public function setNombreCapitan($nombreCapitan){
        $this->nombreCapitan = $nombreCapitan;
    }
    public function getCantJugadores(){
        return $this->cantJugadores;
    }
    public function setCantJugadores($cantJugadores){
        $this->cantJugadores = $cantJugadores;
    }
    public function getObjCategoria(){
        return $this->objCategoria;
    }
    public function setObjCategoria($objCategoria){
        $this->objCategoria = $objCategoria;
    }

    public function __toString(){
        $strCategoria = $this->getObjCategoria()->__toString();
        $str = "
        Nombre: {$this->getNombre()}.\n 
        Capitán: {$this->getNombreCapitan()}.\n
        Cantidad de Jugadores: {$this->getCantJugadores()}.\n
        $strCategoria";
        return $str;
    }
}