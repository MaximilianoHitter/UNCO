<?php
//Clase persona
class Persona {
    //Atributos
    private $tipoDeSangreStr;
    private $tezStr;
    private $colorDeOjosStr;
    private $colorDePeloStr;
    private $nombreCompletoStr;

    public function __construct($tipoDeSangre, $tez, $colorDeOjos, $colorDePelo, $nombreCompleto){
        $this->tipoDeSangreStr = $tipoDeSangre;
        $this->tezStr = $tez;
        $this->colorDeOjosStr = $colorDeOjos;
        $this->colorDePeloStr = $colorDePelo;
        $this->nombreCompletoStr = $nombreCompleto;
    }

    public function setTipoDeSangre($tipoSangre){
        $this->tipoDeSangreStr = $tipoSangre;
    }
}