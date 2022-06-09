<?php
require_once('Partido.php');
class Torneo{
    private $tipoTorneo;
    private $coleccionPartidos;

    public function __construct($tipoTorneo){
        $this->tipoTorneo = $tipoTorneo;
        $this->coleccionPartidos = [];
    }

    public function getTipoTorneo(){
        return $this->tipoTorneo;
    }
    public function setTipoTorneo($tipoTorneo){
        $this->tipoTorneo = $tipoTorneo;
    }
    public function getColeccionPartidos(){
        return $this->coleccionPartidos;
    }
    public function setColeccionPartidos($coleccionPartidos){
        $this->coleccionPartidos = $coleccionPartidos;
    }

    public function __toString(){
        $strPartidos = $this->partidosString();
        $str = "
        Torneo de {$this->getTipoTorneo()}\n
        $strPartidos";
        return $str;
    }

    private function partidosString(){
        $strTot = "";
        $partidosArr = $this->getColeccionPartidos();
        foreach ($partidosArr as $key => $value) {
            $strPartido = $value->__toString();
            $strTot.= $strPartido;
        }
        return $strTot;    
    }

    public function entregarPremios(){
        $strGanadores = "";
        $partidosArr = $this->getColeccionPartidos();
        foreach ($partidosArr as $key => $partido) {
            $idPartido = $partido->getIdPartido();
            $goles1 = $partido->getCantGolesE1();
            $goles2 = $partido->getCantGolesE2();
            if($goles1 > $goles2){
                $strGanadores.= "Partido $idPartido\n
                Ganador Equipo 1.\n";
            }elseif($goles2 > $goles1){
                $strGanadores.= "Partido $idPartido\n
                Ganador Equipo 2.\n";
            }else{
                $strGanadores.= "Partido $idPartido\n
                Empate.\n";
            }
        }
        return $strGanadores;
    }
}