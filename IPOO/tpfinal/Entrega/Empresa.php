<?php
require_once('BaseDatos.php');
class Empresa{
    private $idempresa;
    private $enombre;
    private $edireccion;
    private $mensajeOp;
    static $mensajeFallo = '';

    public function __construct(){
        $this->idempresa = '';
        $this->enombre = '';
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
        return $this->enombre;
    }
    public function setNombre($enombre){
        $this->enombre = $enombre;
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
    public static function getMensajeFallo(){
        return Empresa::$mensajeFallo;
    }
    public static function setMensajeFallo($mensajeFallo){
        Empresa::$mensajeFallo = $mensajeFallo;
    }

    public function __toString(){
        $str = "
        Id de Empresa: {$this->getIdempresa()}.\n
        Nombre: {$this->getNombre()}.\n
        Dirección: {$this->getEdireccion()}.\n";
        return $str;
    }

    public function cargarDatos($idempresa, $enombre, $edireccion){
        $this->setIdempresa($idempresa);
        $this->setNombre($enombre);
        $this->setEdireccion($edireccion);
    }

    public function buscar($idempresa){
        $base = new BaseDatos();
        $consultaEmpresa = "SELECT * FROM empresa WHERE idempresa= $idempresa";
        $respuesta = false;
        if($base->Iniciar()){
            if($base->Ejecutar($consultaEmpresa)){
                if($row2 = $base->Registro()){
                    $this->setIdempresa($row2['idempresa']);
                    $this->setNombre($row2['enombre']);
                    $this->setEdireccion($row2['edireccion']);
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
        $arregloEmpresa = null;
        $base = new BaseDatos();
        $consultaEmpresa = "SELECT * FROM empresa";
        if($condicion != ''){
            $consultaEmpresa = $consultaEmpresa . ' WHERE ' . $condicion;
        }
        if($base->Iniciar()){
            if($base->Ejecutar($consultaEmpresa)){
                $arregloEmpresa = array();
                while($row2 = $base->Registro()){
                    $idempresa = $row2['idempresa'];
                    $enombre = $row2['enombre'];
                    $edireccion = $row2['edireccion'];

                    $empresa = new Empresa();
                    $empresa->cargarDatos($idempresa, $enombre, $edireccion);
                    array_push($arregloEmpresa, $empresa);
                }
            }else{
                //$this->setMensajeOp($base->getError()); No se puede usar
                Empresa::setMensajeFallo($base->getError());
            }
        }else{
            //$this->setMensajeOp($base->getError()); No se puede usar
            Empresa::setMensajeFallo($base->getError());
        }
        return $arregloEmpresa;
    }

    public function insertar(){
        $base = new BaseDatos();
        $respuesta = false;
        $consultaInsertar = "INSERT INTO empresa VALUES({$this->getIdempresa()}, '{$this->getNombre()}', '{$this->getEdireccion()}')";
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
        $consultaModifica = "UPDATE empresa SET enombre = '{$this->getNombre()}', edireccion = '{$this->getEdireccion()}' WHERE idempresa = {$this->getIdempresa()}";
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
        $consultaElimina = "DELETE FROM empresa WHERE idempresa = {$this->getIdempresa()}";
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