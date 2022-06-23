<?php
require_once('BaseDatos.php');
require_once('Empresa.php');
require_once('ResponsableV.php');
class Viaje{
    private $idviaje;
    private $vdestino;
    private $cantMaxPasajeros;
    private $idempresaObj;
    private $responsableObj;
    private $vimporte;
    private $tipoasiento;
    private $idayvuelta;
    private $mensajeOp;
    static $mensajeFallo = '';

    public function __construct(){
        $this->idviaje = '';
        $this->vdestino = '';
        $this->cantMaxPasajeros = '';
        $this->idempresaObj = '';
        $this->responsableObj = '';
        $this->vimporte = '';
        $this->tipoasiento = '';
        $this->idayvuelta = '';
    }

    public function cargarDatos($idviaje, $vdestino, $cantMaxPasajeros, $idempresaObj, $responsableObj, $vimporte, $tipoasiento, $idayvuelta){
        $this->setIdviaje($idviaje);
        $this->setVdestino($vdestino);
        $this->setCantMaxPasajeros($cantMaxPasajeros);
        $this->setIdempresaObj($idempresaObj);
        $this->setResponsableObj($responsableObj);
        $this->setVimporte($vimporte);
        $this->setTipoasiento($tipoasiento);
        $this->setIdayvuelta($idayvuelta);
    }

    public function getIdviaje(){
        return $this->idviaje;
    }
    public function setIdviaje($idviaje){
        $this->idviaje = $idviaje;
    }
    public function getVdestino(){
        return $this->vdestino;
    }
    public function setVdestino($vdestino){
        $this->vdestino = $vdestino;
    }
    public function getCantMaxPasajeros(){
        return $this->cantMaxPasajeros;
    }
    public function setCantMaxPasajeros($cantMaxPasajeros){
        $this->cantMaxPasajeros = $cantMaxPasajeros;
    }
    public function getIdempresaObj(){
        return $this->idempresaObj;
    }
    public function setIdempresaObj($idempresaObj){
        $this->idempresaObj = $idempresaObj;
    }
    public function getResponsableObj(){
        return $this->responsableObj;
    }
    public function setResponsableObj($responsableObj){
        $this->responsableObj = $responsableObj;
    }
    public function getVimporte(){
        return $this->vimporte;
    }
    public function setVimporte($vimporte){
        $this->vimporte = $vimporte;
    }
    public function getTipoasiento(){
        return $this->tipoasiento;
    }
    public function setTipoasiento($tipoasiento){
        $this->tipoasiento = $tipoasiento;
    }
    public function getIdayvuelta(){
        return $this->idayvuelta;
    }
    public function setIdayvuelta($idayvuelta){
        $this->idayvuelta = $idayvuelta;
    }
    public function getMensajeOp(){
        return $this->mensajeOp;
    }
    public function setMensajeOp($mensajeOp){
        $this->mensajeOp = $mensajeOp;
    }
    public function getMensajeFallo(){
        return $this->mensajeFallo;
    }
    public function setMensajeFallo($mensajeFallo){
        $this->mensajeFallo = $mensajeFallo;
    }

    public function __toString(){
        $empresaObj = $this->getIdempresaObj();
        $empresa = $empresaObj->__toString();
        $responsableObj = $this->getResponsableObj();
        $responsable = $responsableObj->__toString();
        $str = "
        ID: {$this->getIdviaje()}.\n
        Destino: {$this->getVdestino()}.\n
        Asientos: {$this->getCantMaxPasajeros()}.\n
        Empresa: $empresa.\n
        Responsable: $responsable.\n
        Importe:$ {$this->getVimporte()}.\n
        Tipo de Asiento: {$this->getTipoasiento()}.\n
        Ida y Vuelta: {$this->getIdayvuelta()}.\n";
        return $str;
    }

    
}