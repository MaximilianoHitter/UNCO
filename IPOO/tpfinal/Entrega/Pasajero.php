<?php
require_once('BaseDatos.php');
require_once('Viaje.php');
class Pasajero{
    //Atributos
    private $rdocumento;
    private $pnombre;
    private $papellido;
    private $ptelefono;
    private $objViaje;
    private $mensajeOp;
    static $mensajeFallo = '';

    //Constructo
    public function __construct(){
        $this->rdocumento = '';
        $this->pnombre = '';
        $this->papellido = '';
        $this->objViaje = '';
        $this->mensajeOp = '';
    }

    public function getRdocumento(){
        return $this->rdocumento;
    }
    public function setRdocumento($rdocumento){
        $this->rdocumento = $rdocumento;
    }
    public function getPnombre(){
        return $this->pnombre;
    }
    public function setPnombre($pnombre){
        $this->pnombre = $pnombre;
    }
    public function getPapellido(){
        return $this->papellido;
    }
    public function setPapellido($papellido){
        $this->papellido = $papellido;
    }
    public function getPtelefono(){
        return $this->ptelefono;
    }
    public function setPtelefono($ptelefono){
        $this->ptelefono = $ptelefono;
    }
    public function getObjViaje(){
        return $this->objViaje;
    }
    public function setObjViaje($objViaje){
        $this->objViaje = $objViaje;
    }
    public function getMensajeOp(){
        return $this->mensajeOp;
    }
    public function setMensajeOp($mensajeOp){
        $this->mensajeOp = $mensajeOp;
    }
    public static function getMensajeFallo(){
        return Pasajero::$mensajeFallo;
    }
    public static function setMensajeFallo($mensajeFallo){
        Pasajero::$mensajeFallo = $mensajeFallo;
    }

    public function cargarDatos($rdocumento, $pnombre, $papellido, $ptelefono, $objViaje){
        $this->rdocumento = $rdocumento;
        $this->pnombre = $pnombre;
        $this->papellido = $papellido;
        $this->ptelefono = $ptelefono;
        $this->objViaje = $objViaje;    
    }

    public function buscar($rdocumento){
        $base = new BaseDatos();
        $respuesta = false;
        $consultaBusqueda = "SELECT * FROM pasajero WHERE rdocumento = $rdocumento";
        if($base->Iniciar()){
            if($base->Ejecutar($consultaBusqueda)){
                if($row2 = $base->Registro()){
                    $this->setRdocumento($rdocumento);
                    $this->setPnombre($row2['pnombre']);
                    $this->setPapellido($row2['papellido']);
                    $this->setPtelefono($row2['ptelefono']);
                    $idViaje = $row2['idviaje'];
                    $objViaje = new Viaje();
                    if($objViaje->buscar($idViaje)){
                        $this->setObjViaje($objViaje);
                    }else{
                        
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

    public static function listar($condicion = ''){
        $arregloPasajeros = null;
        $base = new BaseDatos();
        $consultaPasajero = "SELECT * FROM pasajero ";
        if($condicion != ''){
            $consultaPasajero.= ' WHERE '.$condicion;
        }
        if($base->Iniciar()){
            if($base->Ejecutar($consultaPasajero)){
                $arregloPasajeros = [];
                while($row2 = $base->Registro()){
                    $rdocumento = $row2['rdocumento'];
                    $pnombre = $row2['pnombre'];
                    $papellido = $row2['papellido'];
                    $ptelefono = $row2['ptelefono'];
                    $idViaje = $row2['idviaje'];
                    $objViaje = new Viaje();
                    if($objViaje->buscar($idViaje)){

                    }else{
                        $objViaje = null;
                    }
                    $pasajero = new Pasajero();
                    $pasajero->cargarDatos($rdocumento, $pnombre, $papellido, $ptelefono, $objViaje);
                    array_push($arregloPasajeros, $pasajero);
                }
            }else{
                Pasajero::setMensajeFallo($base->getError());
            }
        }else{
            Pasajero::setMensajeFallo($base->getError());
        }
        return $arregloPasajeros;
    }

    public function insertar(){
        $base = new BaseDatos();
        $respuesta = false;
        $objViaje = $this->getObjViaje();
        $idviaje = $objViaje->getIdviaje();
        $consultaInsertar = "INSERT INTO pasajero VALUES ({$this->getRdocumento()}, '{$this->getPnombre()}', '{$this->getPapellido()}', {$this->getPtelefono()}, $idviaje)";
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
        $base = new BaseDatos();
        $respuesta = false;
        $objViaje = $this->getObjViaje(); 
        $idviaje = $objViaje->getIdviaje();
        $consultaModifica = "UPDATE pasajero SET pnombre = '{$this->getPnombre()}', papellido = '{$this->getPapellido()}', ptelefono = {$this->getPtelefono()}, idviaje = $idviaje";
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
        $consultaElimina = "DELETE FROM pasajero WHERE rdocumento = {$this->getRdocumento()}";
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

    public function __toString(){
        $objViaje = $this->getObjViaje();
        $strViaje = $objViaje->getIdviaje();
        $str = "
        Documento: {$this->getRdocumento()}.\n
        Nombre: {$this->getPnombre()}.\n
        Apellido: {$this->getPapellido()}.\n
        Telefono: {$this->getPtelefono()}.\n
        Viaje: $strViaje.\n";
        return $str;
    }
}