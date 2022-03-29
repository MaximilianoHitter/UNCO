<?php
class Tramite{
    //Atributos
    private $nombreCliente;
    private $estado;
    private $horaInicio;
    private $horaResolucion;
    private $fechaIngreso;
    private $fechaCierre;

    //Constructo
    public function __construct($cliente, $horaInicio, $fechaIngreso){
        $this->nombreCliente = $cliente;
        $this->estado = 'Iniciado';
        $this->horaInicio = $horaInicio;
        $this->fechaIngreso = $fechaIngreso;
    }

    //Getters y setters
    public function getCliente(){
        return $this->nombreCliente;
    } 

    public function setCliente($nombre){
        $this->nombreCliente = $nombre;
    }

    public function getEstado(){
        return $this->estado;
    }

    public function setEstado($estado){
        $this->estado = $estado;
    }

    public function getHoraInicio(){
        return $this->horaInicio;
    }

    public function setHoraInicio($horaInicio){
        $this->horaInicio = $horaInicio;
    }

    public function getHoraResolucion(){
        return $this->horaResolucion;
    }

    public function setHoraResolucion($horaResolucion){
        $this->horaResolucion = $horaResolucion;
    }

    public function getFechaIngreso(){
        return $this->fechaIngreso;
    }

    public function setFechaIngreso($fecha){
        $this->fechaIngreso = $fecha;
    }

    public function getFechaCierre(){
        return $this->fechaCierre;
    }

    public function setFechaCierre($fecha){
        $this->fechaCierre = $fecha;
    }

    public function __toString(){
        $str = "
        Cliente: {$this->getCliente()}.\n
        Hora de inicio de trámite: {$this->getHoraInicio()}.\n
        Hora de resolución de trámite: {$this->getHoraResolucion()}.\n
        Fecha de ingreso: {$this->getFechaIngreso()}.\n
        Fecha cierre: {$this->getFechaCierre()}.\n";
        return $str;
    }
}