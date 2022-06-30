<?php
require_once('BaseDatos.php');
require_once('Empresa.php');
require_once('ResponsableV.php');
class Viaje{
    private $idviaje;
    private $vdestino;
    private $cantMaxPasajeros;
    private $idempresaObj;//voy a guardar un objeto
    private $responsableObj;//voy a guardar un objeto
    private $vimporte;
    private $tipoasiento;
    private $idayvuelta;
    private $coleccionPasajeros;
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
        $this->coleccionPasajeros = [];
    }

    public function cargarDatos($idviaje, $vdestino, $cantMaxPasajeros, $idempresaObj, $responsableObj, $vimporte, $tipoasiento, $idayvuelta){
        $this->setIdviaje($idviaje);
        $this->setVdestino($vdestino);
        $this->setCantMaxPasajeros($cantMaxPasajeros);
        $this->setIdempresaObj($idempresaObj);
        $this->setResponsableObj($responsableObj);
        /*$objEmpresa = new Empresa();
        if($objEmpresa->buscar($idempresaObj)){
            $this->setIdempresaObj($objEmpresa);
        }else{
            $this->setIdempresaObj('Algo');
        }
        $objResponsable = new ResponsableV();
        if($objResponsable->buscar($responsableObj)){
            $this->setResponsableObj($objResponsable);
        }else{
            $this->setResponsableObj('Algo');
        }*/
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
    public static function getColeccionPasajeros(){
        return Viaje::$coleccionPasajeros;
    }
    public static function setColeccionPasajeros($coleccionPasajeros){
        Viaje::$coleccionPasajeros = $coleccionPasajeros;
    }

    public function __toString(){
        $empresaObj = $this->getIdempresaObj();
        $empresa = $empresaObj->getIdempresa();
        $responsableObj = $this->getResponsableObj();
        $responsable = $responsableObj->getNumEmpleado();
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

    public function buscar($idviaje){
        $base = new BaseDatos();
        $consultaViaje = "SELECT * FROM viaje WHERE idviaje = $idviaje";
        $respuesta = false;
        if($base->Iniciar()){
            if($base->Ejecutar($consultaViaje)){
                if($row2 = $base->Registro()){
                    $this->setIdviaje($idviaje);
                    $this->setVdestino($row2['vdestino']);
                    $this->setCantMaxPasajeros($row2['vcantmaxpasajeros']);
                    $this->setVimporte($row2['vimporte']);
                    $this->setTipoasiento($row2['tipoAsiento']);
                    $this->setIdayvuelta($row2['idayvuelta']);
                    //ahora seteo lo de empresa y responsable 
                    $objEmpresa = new Empresa();
                    if($objEmpresa->buscar($row2['idempresa'])){
                        //si devuelve true
                        $this->setIdempresaObj($objEmpresa);
                    }else{
                        $this->setIdempresaObj('');
                    }
                    $objResponsable = new ResponsableV();
                    if($objResponsable->buscar($row2['rnumeroempleado'])){
                        $this->setResponsableObj($objResponsable);
                    }else{
                        $this->setResponsableObj('');
                    }
                    $respuesta = true;
                }
            }else{
                
                $this->setMensajeOp($base->getError());
            }
        }else{
            $this->setMensajeOp($base->getError());
        }
        return $respuesta;
    }

    public static function listar($condicion=''){
        $arregloViajes = null;
        $base = new BaseDatos();
        $consultaViaje = "SELECT * FROM viaje ";
        if($condicion != ''){
            $consultaViaje.= ' WHERE '.$condicion;
        }
        if($base->Iniciar()){
            if($base->Ejecutar($consultaViaje)){
                $arregloViajes = [];
                while($row2 = $base->Registro()){
                    $idviaje = $row2['idviaje'];
                    $vdestino = $row2['vdestino'];
                    $cantMaxPasajeros = $row2['vcantmaxpasajeros'];
                    $objEmpresa = new Empresa();
                    $idempresa = $row2['idempresa'];
                    if($objEmpresa->buscar($idempresa)){
                        
                    }else{
                        $objEmpresa = 'No contiene';
                    }
                    $objResponsable = new ResponsableV();
                    $rnumeroempleado = $row2['rnumeroempleado'];
                    if($objResponsable->buscar($rnumeroempleado)){

                    }else{
                        $objResponsable = 'No contiene';
                    }
                    $vimporte = $row2['vimporte'];
                    $tipoasiento = $row2['tipoAsiento'];
                    $idayvuelta = $row2['idayvuelta'];
                    $viaje = new Viaje();
                    $viaje->cargarDatos($idviaje, $vdestino, $cantMaxPasajeros, $objEmpresa, $objResponsable, $vimporte, $tipoasiento, $idayvuelta);
                    array_push($arregloViajes, $viaje);
                }
            }else{
                Viaje::setMensajeFallo($base->getError());
            }
        }else{
            Viaje::setMensajeFallo($base->getError());
        }
        return $arregloViajes;
    }

    public function insertar(){
        $base = new BaseDatos();
        $respuesta = false;
        $objEmpresa = $this->getIdempresaObj();
        $idEmpresa = $objEmpresa->getIdempresa();
        //echo $idEmpresa;
        $objResponsable = $this->getResponsableObj();
        $numResponsable = $objResponsable->getNumEmpleado();
        //echo $numResponsable;
        $consultaInsertar = "INSERT INTO viaje VALUES ({$this->getIdviaje()}, '{$this->getVdestino()}', {$this->getCantMaxPasajeros()}, $idEmpresa, $numResponsable, {$this->getVimporte()}, '{$this->getTipoasiento()}', '{$this->getIdayvuelta()}')";
        if($base->Iniciar()){
            if($base->Ejecutar($consultaInsertar)){
                $respuesta = true;
            }else{
                $this->setMensajeOp($base->getError());    
            }
        }else{
            $this->setMensajeOp($base->getError());
        }
        return $respuesta;
    }

    public function modificar(){
        $respuesta = false;
        $base = new BaseDatos();
        $objEmpresa = $this->getIdempresaObj();
        $idEmpresa = $objEmpresa->getIdempresa();
        $objResponsable = $this->getResponsableObj();
        $numResponsable = $objResponsable->getNumEmpleado();
        $consultaModifica = "UPDATE viaje SET vdestino = '{$this->getVdestino()}', vcantmaxpasajeros = {$this->getCantMaxPasajeros()}, idempresa = $idEmpresa, rnumeroempleado = $numResponsable, vimporte = {$this->getVimporte()}, tipoAsiento = '{$this->getTipoasiento()}', idayvuelta = '{$this->getIdayvuelta()}' WHERE idviaje = {$this->getIdviaje()}";
        if($base->Iniciar()){
            if($base->Ejecutar($consultaModifica)){
                $respuesta = true;
            }else{
                $this->setMensajeOp($base->getError());    
            }
        }else{
            $this->setMensajeOp($base->getError());
        }
        return $respuesta;
    }

    public function eliminar(){
        $base = new BaseDatos();
        $respuesta = false;
        $consultaElimina = "DELETE FROM viaje WHERE idviaje = {$this->getIdviaje()}";
        if($base->Iniciar()){
            if($base->Ejecutar($consultaElimina)){
                $respuesta = true;
            }else{
                $this->setMensajeOp($base->getError());
            }
        }else{
            $this->setMensajeOp($base->getError());
        }
        return $respuesta;
    }
    

}