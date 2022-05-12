<?php
require_once('Viaje.php');
class Terrestre extends Viaje{
    private $tipoAsiento;
    private $importe;
    private $idaOVuelta;

    public function __construct($codigoInt, $destinoStr, $cantMaximaInt, $objResponsable, $tipoAsientoStr, $importeFlt, $idaOVueltaStr){
        parent::__construct($codigoInt, $destinoStr, $cantMaximaInt, $objResponsable);
        $this->tipoAsiento = $tipoAsientoStr;
        $this->importe = $importeFlt;
        $this->idaOVuelta = $idaOVueltaStr;
    }


    public function getTipoAsiento(){
        return $this->tipoAsiento;
    }
    public function setTipoAsiento($tipoAsiento){
        $this->tipoAsiento = $tipoAsiento;
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

    public function __toString(){
        $strPadre = parent::__toString();
        $str = "
        $strPadre
        Tipo de transporte: Terrestre.\n
        Tipo de Asiento: {$this->getTipoAsiento()}.\n
        Importe: $ {$this->getImporte()}.\n
        Trayecto: {$this->getIdaOVuelta()}.\n";
        return $str;
    }

    public function calcularImporte(){
        $importe = $this->getImporte();
        $tipoAsiento = $this->getTipoAsiento();
        $idaOVuelta = $this->getIdaOVuelta();
        if($tipoAsiento == 'Cama'){
            $importe *= 1.25;
        }
        if($idaOVuelta == 'Ida y Vuelta'){
            $importe *= 1.5;
        }
        return $importe;
    }
}