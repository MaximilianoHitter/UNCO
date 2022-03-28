<?php
require_once('Persona.php');
class Disquera{
    //Atributos
    private $hora_desdeStr;//solamente horas, no minutos
    private $hora_hastaStr;//solamente horas, no minutos
    private $estadoStr;
    private $direccionStr;
    private $dueñioObjPersona;

    //Constructo
    public function __construct($horaInicio, $horaFinal, $estado, $direccion, $nombre, $apellido, $tipoDocumento, $numeroDocumento){
        $this->hora_desdeStr = $horaInicio;
        $this->hora_hastaStr = $horaFinal;
        $this->estadoStr = $estado;
        $this->direccionStr = $direccion;
        $this->duenioObjPersona = new Persona($nombre, $apellido, $tipoDocumento, $numeroDocumento);
    }

    //Getters y setter hora_desde
    public function getHora_desdeStr(){
        return $this->hora_desdeStr;
    }
    public function setHora_desdeStr($hora_desdeStr){
        $this->hora_desdeStr = $hora_desdeStr;
    }
    public function getHora_hastaStr(){
        return $this->hora_hastaStr;
    }
    public function setHora_hastaStr($hora_hastaStr){
        $this->hora_hastaStr = $hora_hastaStr;
    }
    public function getEstadoStr(){
        return $this->estadoStr;
    }
    public function setEstadoStr($estadoStr){
        $this->estadoStr = $estadoStr;
    }
    public function getDireccionStr(){
        return $this->direccionStr;
    }
    public function setDireccionStr($direccionStr){
        $this->direccionStr = $direccionStr;
    }
    //getter y setter del objPersona
    public function getDuenio(){
        return $this->dueñioObjPersona->__toString();
    }
    public function setDuenio($nombre, $apellido, $tipoDocumento, $numeroDocumento){
        $objPersona = $this->dueñioObjPersona;
        $objPersona->setNombreStr($nombre);
        $objPersona->setApellidoStr($apellido);
        $objPersona->setTipoDocumentoStr($tipoDocumento);
        $objPersona->setNumeroDocumentoInt($numeroDocumento);
    }

    //toString
    public function __toString(){
        $objPersona = $this->getDuenio();
        $str = "
        Horario de apertura: {$this->getHora_desdeStr()}\n
        Horario de cierre: {$this->getHora_hastaStr()}\n
        Estado: {$this->getEstadoStr()}\n
        Dirección: {$this->getDireccionStr()}\n". $objPersona->__toString();
        return $str;
    }

    /**Metodo para saber si una hora esta dentro del rango 
     * @param int $hora 
     * @param int $minutos 
     * @return boolean
    */
    public function dentroHorarioAtencion($hora, $minutos){
        $dentroDeHorario = false;
        if($minutos != 0){
            $hora++;
        };
        if($hora < $this->getHora_hastaStr() && $hora > $this->getHora_desdeStr()){
            $dentroDeHorario = true;
        };
        return $dentroDeHorario;
    }

    /**Metodo para abrir la disquera si el horario parametro esta dentro de atencion 
     * @param int $hora 
     * @param int $minutos
     * @return void
    */
    public function abrirDisquera($hora, $minutos){
        $esHorario = $this->dentroHorarioAtencion($hora, $minutos);
        if($esHorario){
            $this->setEstadoStr('Abierto');
        }else{
            $this->setEstadoStr('Cerrado');
        };
    }
}