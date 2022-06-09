<?php
require_once('Equipo.php');
class Partido{
    private $idPartido;
    private $fecha;
    private $cantGolesE1;
    private $objEquipo1;
    private $cantGolesE2;
    private $objEquipo2;

    public function __construct($id, $fecha, $goles1, $objE1, $goles2, $objE2){
        $this->idPartido = $id;
        $this->fecha = $fecha;
        $this->cantGolesE1 = $goles1;
        $this->objEquipo1 = $objE1;
        $this->cantGolesE2 = $goles2;
        $this->objEquipo2 = $objE2;
    }

    public function getIdPartido(){
        return $this->idPartido;
    }
    public function setIdPartido($idPartido){
        $this->idPartido = $idPartido;
    }
    public function getFecha(){
        return $this->fecha;
    }
    public function setFecha($fecha){
        $this->fecha = $fecha;
    }
    public function getCantGolesE1(){
        return $this->cantGolesE1;
    }
    public function setCantGolesE1($cantGolesE1){
        $this->cantGolesE1 = $cantGolesE1;
    }
    public function getObjEquipo1(){
        return $this->objEquipo1;
    }
    public function setObjEquipo1($objEquipo1){
        $this->objEquipo1 = $objEquipo1;
    }
    public function getCantGolesE2(){
        return $this->cantGolesE2;
    }
    public function setCantGolesE2($cantGolesE2){
        $this->cantGolesE2 = $cantGolesE2;
    }
    public function getObjEquipo2(){
        return $this->objEquipo2;
    }
    public function setObjEquipo2($objEquipo2){
        $this->objEquipo2 = $objEquipo2;
    }

    public function __toString(){
        $strEquipo1 = $this->getObjEquipo1()->__toString();
        $strEquipo2 = $this->getObjEquipo2()->__toString();
        $str = "
        Identificador: {$this->getIdPartido()}.\n
        Fecha: {$this->getFecha()}.\n
        Goles equipo 1: {$this->getCantGolesE1()}.\n
        Goles equipo 2: {$this->getCantGolesE2()}.\n
        Equipo 1: $strEquipo1
        Equipo 2: $strEquipo2";
        return $str;
    }

    public function calculoCoeficiente($objEquipo, $goles){
        $coef = 0.5;
        $cantJugadores = $objEquipo->getCantJugadores();
        $coef*= $goles * $cantJugadores;
        return $coef;
    }

    public function coefEquipo1(){
        $equipo1 = $this->getObjEquipo1();
        $goles1 = $this->getCantGolesE1();
        $coef1 = $this->calculoCoeficiente($equipo1, $goles1);
        return $coef1;
    }

    public function coefEquipo2(){
        $equipo2 = $this->getObjEquipo2();
        $goles2 = $this->getCantGolesE2();
        $coef2 = $this->calculoCoeficiente($equipo2, $goles2);
        return $coef2;
    }
}