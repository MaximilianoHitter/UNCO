<?php
require_once('Partido');
class Futbol extends Partido{
    private $tipoDeEquipo;

    public function __construct($id, $fecha, $goles1, $objE1, $goles2, $objE2){
        parent::__construct($id, $fecha, $goles1, $objE1, $goles2, $objE2);
        $this->tipoDeEquipo = '';
    }

    public function getTipoDeEquipo(){
        return $this->tipoDeEquipo;
    }
    public function setTipoDeEquipo($tipoDeEquipo){
        $this->tipoDeEquipo = $tipoDeEquipo;
    }

    public function coeficienteEquipos(){
        $tipoEquipo = $this->getTipoDeEquipo();
        if($tipoEquipo == 'Menores'){
            $categoria = 0.11;
        }elseif($tipoEquipo == 'Juveniles'){
            $categoria = 0.17;
        }else{
            $categoria = 0.23;
        }
        $coefPadre1 = parent::coefEquipo1();
        $coefTotal1 = $coefPadre1 + $coefPadre1 * $categoria;
        $coefPadre2 = parent::coefEquipo2();
        $coefTotal2 = $coefPadre2 + $coefPadre2 * $categoria;
        $arrayResultado = [$coefTotal1, $coefTotal2];
        return $arrayResultado;
    }

    public function __toString(){
        $strPadre = parent::__toString();
        $arrayResultado = $this->coeficienteEquipos();
        $strFutbol = "
        $strPadre\n
        Coeficiente equipo 1: {$arrayResultado[0]}.\n
        Coeficiente equipo 2: {$arrayResultado[1]}.\n";
        return $strFutbol;
    }
}