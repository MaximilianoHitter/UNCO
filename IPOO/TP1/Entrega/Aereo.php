<?php
require_once('Viaje.php');
class Aereo extends Viaje{
    private $importe;
    private $idaOVuelta;
    private $numeroVuelo;
    private $tipoAsiento;
    private $nombreAerolinea;
    private $cantidadDeEscalas;

    public function __construct($codigoInt, $destinoStr, $cantMaximaInt, $objResponsable, $importeFlt, $idaOVueltaStr, $numeroVueloInt, $tipoAsientoStr, $nombreAerolineaStr, $cantidadDeEscalasInt){
        parent::__construct($codigoInt, $destinoStr, $cantMaximaInt, $objResponsable);
        $this->importe = $importeFlt;
        $this->idaOVuelta = $idaOVueltaStr;
        $this->numeroVuelo = $numeroVueloInt;
        $this->tipoAsiento = $tipoAsientoStr;
        $this->nombreAerolinea = $nombreAerolineaStr;
        $this->cantidadDeEscalas = $cantidadDeEscalasInt;
    }

    public function getImporte(){
        return $this->importe;
    }
    public function setImporte($importe){
        $this->importe = $importe;
    }
    public function getIdaOVuelta(){
        return $this->idaOVuelta;
    }
    public function setIdaOVuelta($idaOVuelta){
        $this->idaOVuelta = $idaOVuelta;
    }
    public function getNumeroVuelo(){
        return $this->numeroVuelo;
    }
    public function setNumeroVuelo($numeroVuelo){
        $this->numeroVuelo = $numeroVuelo;
    }
    public function getTipoAsiento(){
        return $this->tipoAsiento;
    }
    public function setTipoAsiento($tipoAsiento){
        $this->tipoAsiento = $tipoAsiento;
    }
    public function getNombreAerolinea(){
        return $this->nombreAerolinea;
    }
    public function setNombreAerolinea($nombreAerolinea){
        $this->nombreAerolinea = $nombreAerolinea;
    }
    public function getCantidadDeEscalas(){
        return $this->cantidadDeEscalas;
    }
    public function setCantidadDeEscalas($cantidadDeEscalas){
        $this->cantidadDeEscalas = $cantidadDeEscalas;
    }

    public function __toString(){
        $strPadre = parent::__toString();
        $str = "
        $strPadre
        Tipo de Viaje: Aereo.\n
        Tipo de Asiento: {$this->getTipoAsiento()}.\n
        Importe: $ {$this->getImporte()}.\n
        Trayecto: {$this->getIdaOVuelta()}.\n
        Número de Vuelo: {$this->getNumeroVuelo()}.\n
        Aerolinea: {$this->getNombreAerolinea()}.\n
        Escalas: {$this->getCantidadDeEscalas()}.\n";
        return $str;
    }

    public function calcularImporte(){
        $importe = $this->getImporte();
        $cantidadDeEscalas = $this->getCantidadDeEscalas();
        $tipoAsiento = $this->getTipoAsiento();
        $idaOVuelta = $this->getIdaOVuelta();
        if($tipoAsiento == 'Primera Clase' && $cantidadDeEscalas == 0){
            $importe *= 1.4;
        }elseif($tipoAsiento == 'Primera Clase' && $cantidadDeEscalas > 0){
            $importe *= 1.6;
        }
        if($idaOVuelta == 'Ida y Vuelta'){
            $importe *= 1.5;
        }
        return $importe;
    }
}