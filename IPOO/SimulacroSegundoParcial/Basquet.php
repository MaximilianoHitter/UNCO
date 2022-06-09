<?php
require_once('Partido.php');
class Basquet extends Partido{
    private $cantInfracciones;

    public function __construct($id, $fecha, $goles1, $objE1, $goles2, $objE2, $cantInfracciones){
        parent::__construct($id, $fecha, $goles1, $objE1, $goles2, $objE2);
        $this->cantInfracciones = $cantInfracciones;
    }

    public function getCantInfracciones(){
        return $this->cantInfracciones;
    }
    public function setCantInfracciones($cantInfracciones){
        $this->cantInfracciones = $cantInfracciones;
    }

    public function coeficienteEquipos(){
        $cantInfracciones = $this->getCantInfracciones();
        $coefPadre1 = parent::coefEquipo1();
        $coefTotal1 = $coefPadre1 - $cantInfracciones * 0.75;
        $coefPadre2 = parent::coefEquipo2();
        $coefTotal2 = $coefPadre2 + $cantInfracciones * 0.75;
        $arrayResultado = [$coefTotal1, $coefTotal2];
        return $arrayResultado;
    }

    public function __toString(){
        $strPadre = parent::__toString();
        $arrayResultado = $this->coeficienteEquipos();
        $strBasquet = "
        $strPadre\n
        Coeficiente equipo 1: {$arrayResultado[0]}.\n
        Coeficiente equipo 2: {$arrayResultado[1]}.\n";
        return $strBasquet;
    }
}