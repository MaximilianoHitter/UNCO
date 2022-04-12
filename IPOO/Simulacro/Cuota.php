<?php
class Cuota{
    //Atributos
    private $numero;
    private $montoCuota;
    private $montoInteres;
    private $cancelada;

    //Constructo
    public function __construct($numero, $montoCuota, $montoInteres){
        $this->numero = $numero;
        $this->montoCuota = $montoCuota;
        $this->montoInteres = $montoInteres;
        $this->cancelada = 'Sin pagar';
    }

    //Metodos getter y setter 
    public function getNumero(){
        return $this->numero;
    }
    public function setNumero($numero){
        $this->numero = $numero;
    }
    public function getMontoCuota(){
        return $this->montoCuota;
    }
    public function setMontoCuota($montoCuota){
        $this->montoCuota = $montoCuota;
    }
    public function getMontoInteres(){
        return $this->montoInteres;
    }
    public function setMontoInteres($montoInteres){
        $this->montoInteres = $montoInteres;
    }
    public function getCancelada(){
        return $this->cancelada;
    }
    public function setCancelada($cancelada){
        if($cancelada){
            $patron = 'Pagada';
        }else{
            $patron = 'Sin pagar';
        }
        $this->cancelada = $patron;
    }

    /**Metodo para convertir el valor del estado de la cuota
     * @param void
     * @return string
     */
    private function estadoCuota(){
        if($this->getCancelada() == 'Pagada'){
            $str = "Pagada";
        }else{
            $str = "Sin pagar";
        }
        return $str;
    }

    //toString
    public function __toString(){
        //$estadoCuota = $this->estadoCuota();{}
        $str = "
        Número de cuota: {$this->getNumero()}. Monto de la cuota: \${$this->getMontoCuota()}. Interés: \${$this->getMontoInteres()}. Estado de cuota: {$this->getCancelada()}
        ";
        return $str;
    }

    /**Metodo para devolver el monto final de la cuota, monto + interes
     * @param 
     * @return
     */
    public function darMontoFinalCuota(){
        $montoCuota = $this->getMontoCuota();
        $montoInteres = $this->getMontoInteres();
        $montoFinal = $montoCuota + $montoInteres;
        return $montoFinal;
    }
}