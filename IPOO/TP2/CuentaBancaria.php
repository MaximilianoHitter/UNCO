<?php
class CuentaBancaria{
    //Atributos
    private $numeroDeCuentaInt;
    //private $DNIclienteInt;
    private $objPersona;
    private $saldoActualFlt;
    private $interesAnualFlt;

    //Constructo
    public function __construct($nCuenta, $persona, $saldo, $interes){
        $this->numeroDeCuentaInt = $nCuenta;
        $this->objPersona = $persona;
        $this->saldoActualFlt = $saldo;
        $this->interesAnualFlt = $interes;
    }

    //Metodos
    //Getters y Setters

    public function getNumeroDeCuentaInt(){
        return $this->numeroDeCuentaInt;
    }

    public function setNumeroDeCuentaInt($numeroDeCuentaInt){
        $this->numeroDeCuentaInt = $numeroDeCuentaInt;
    }

    public function getPersona(){
        return $this->persona;
    }

    public function setPersona($persona){
        $this->persona = $persona;
    }

    public function getSaldoActualFlt(){
        return $this->saldoActualFlt;
    }

    public function setSaldoActualFlt($saldoActualFlt){
        $this->saldoActualFlt = $saldoActualFlt;
    }

    public function getInteresAnualFlt(){
        return $this->interesAnualFlt;
    }

    public function setInteresAnualFlt($interesAnualFlt){
        $this->interesAnualFlt = $interesAnualFlt;
    }

    /**Metodo para actualizar el saldo segun el interés del día
     * @param void
     * @return void
     */
    public function actualizarSaldo(){
        $interesDiario = (($this->interesAnualFlt - 1)/ 365)+1;
        $this->saldoActualFlt *= $interesDiario;
    }

    /**Metodo para depositar
     * @param float $cant
     * @return string
     */
    public function depositar($cant){
        $this->saldoActualFlt += $cant;
        $resultado = "Acaba de depositar $cant y su saldo actual es $this->saldoActualFlt.\n";
        return $resultado;
    }

    /**Metodo para retirar
     * @param float $cant
     * @return string
     */
    public function retirar($cant){
        $strRespuesta = '';
        if($this->saldoActualFlt < $cant){
            $strRespuesta = "No puede retirar dicha cantidad, su saldo actual es de: \$$this->saldoActualFlt.\n";
        }else{
            $this->saldoActualFlt -= $cant;
            $strRespuesta = "Usted ha retirado \$$cant y su saldo restante es de \$$this->saldoActualFlt.\n";
        };
        return $strRespuesta;
    }

    //Metodo toString
    public function __toString(){
        $strCuentaTotal = "
        Número de cuenta: {$this->getNumeroDeCuentaInt()}.\n
        DNI: {$this->getPersona()}.\n
        Saldo actual: \${$this->getSaldoActualFlt()}.\n
        Interés anual: {$this->getInteresAnualFlt()}.\n";
        return $strCuentaTotal;
    }
}