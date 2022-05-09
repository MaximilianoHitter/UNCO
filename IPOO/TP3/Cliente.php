<?php
require_once('Persona.php');
class Cliente extends Persona{
    //Atributos agrgados
    private $nroCliente;

    public function __construct($dniInt, $nombreStr, $apellidoStr, $nroClienteInt){
        parent::__construct($dniInt, $nombreStr, $apellidoStr);
        $this->nroCliente = $nroClienteInt;
    }

    public function getNroCliente(){
        return $this->nroCliente;
    }
    public function setNroCliente($nroCliente){
        $this->nroCliente = $nroCliente;
    }

    public function __toString(){
        $strPadre = parent::__toString();
        $str = "
        $strPadre\n
        Número de Cliente: {$this->getNroCliente()}.\n";
        return $str;
    }
}