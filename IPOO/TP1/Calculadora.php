<?php
class Calculadora{
    //Atributos
    private $primerNumero;
    private $segundoNumero;

    //Constructo
    public function __construct($num1, $num2){
        $this->primerNumero = $num1;
        $this->segundoNumero = $num2;
    }
    
    //Metodos
    public function setPrimer($numero1){
        $this->primerNumero = $numero1;
    }

    public function setSegundo($numero2){
        $this->segundoNumero = $numero2;
    }

    public function getPrimer(){
        return $this->primerNumero;
    }

    public function getSegundo(){
        return $this->segundoNumero;
    }

    public function suma(){
       $suma = $this->primerNumero + $this->segundoNumero;
       return $suma; 
    }

    public function resta(){
        $resta = $this->primerNumero - $this->segundoNumero;
        return $resta;
    }

    public function multiplicacion(){
        $multi = $this->primerNumero * $this->segundoNumero;
        return $multi;
    }

    public function division(){
        $division = $this->primerNumero / $this->segundoNumero;
        return $division;
    }

    public function toString(){
        echo "El primer número es: {$this->primerNumero}.\n";
        echo "El segundo número es: {$this->segundoNumero}.\n";
    }
}