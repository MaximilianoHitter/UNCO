<?php
require_once('DB.php');
class Persona{
    //atributos
    private $dni;
    private $nombre;
    private $apellido;
    private $mensajeOperacion;

    public function __construct(){
        $this->dni = '';
        $this->nombre = '';
        $this->apellido = '';
    }

    public function cargar($dni, $nombre, $apellido){
        $this->setDni($dni);
        $this->setNombre($nombre);
        $this->setApellido($apellido);
    }

    public function getDni(){
        return $this->dni;
    }
    public function setDni($dni){
        $this->dni = $dni;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function getApellido(){
        return $this->apellido;
    }
    public function setApellido($apellido){
        $this->apellido = $apellido;
    }
    public function getMensajeOperacion(){
        return $this->mensajeOperacion;
    }
    public function setMensajeOperacion($mensajeOperacion){
        $this->mensajeOperacion = $mensajeOperacion;
    }

    //busca en la db el dni de la persona
    public function buscar($dni){
        $base = new DB();
        $consultaPersona = "SELECT * FROM persona WHERE dni=$dni";
        $respuesta = false;
        if($base->iniciar()){
            if($base->ejecutar($consultaPersona)){
                if($row2 = $base->registro()){
                    $this->setDni($dni);
                    $this->setNombre($row2['nombre']);
                    $this->setApellido($row2['apellido']);
                    $respuesta = true;
                }
            }else{
                $this->setMensajeOperacion($base->getError());
            }
        }else{
            $this->setMensajeOperacion($base->getError());
        }
        return $respuesta;
    }
}