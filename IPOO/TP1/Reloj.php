<?php
class Reloj{
    //Atributos
    private $horasInt;
    private $minutosInt;
    private $segundosInt;


    //Constructo
    public function __construct($horas, $minutos, $segundos){
        $this->horasInt = $horas;
        $this->minutosInt = $minutos;
        $this->segundosInt = $segundos;
    }

    //Metodos
    //Getters
    public function getHoras(){
        return $this->horasInt;
    }

    public function getMinutos(){
        return $this->minutosInt;
    }

    public function getSegundos(){
        return $this->segundosInt;
    }

    //Setters
    public function setHoras($hora){
        $this->horasInt = $hora;
    }

    public function setMinutos($minuto){
        $this->minutosInt = $minuto;
    }

    public function setSegundos($segundo){
        $this->segundosInt = $segundo;
    }

    //Otros Metodos
    public function puesta_a_cero(){
        $this->horasInt = 0;
        $this->minutosInt = 0;
        $this->segundosInt = 0;
    }

    public function incremento(){
        if($this->segundosInt >= 59){
            $this->segundosInt = 0;
            if($this->minutosInt > 59){
                $this->minutosInt = 0;
                if($this->horasInt = 23){
                    $this->horasInt = 0;
                }else{
                    $this->horasInt += 1;
                };
            }else{
                $this->minutosInt += 1;
            };
            
        }else{
            $this->segundosInt += 1;
        };
        

    }

    //Metodo toString
    public function toString(){
        $hora = $this->horasInt;
        $minuto = $this->minutosInt;
        $segundo = $this->segundosInt;
        echo "La hora es $hora:$minuto:$segundo";
    }
}
