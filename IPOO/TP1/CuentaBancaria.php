<?php
class CuentaBancaria{
    //Atributos
    private $numeroDeCuentaInt;
    private $DNIclienteInt;
    private $saldoActualFlt;
    private $interesAnualFlt;

    //Constructo
    public function __construct($nCuenta, $DNI, $saldo, $interes){
        $this->numeroDeCuentaInt = $nCuenta;
        $this->DNIclienteInt = $DNI;
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

    public function getDNIclienteInt(){
        return $this->DNIclienteInt;
    }

    public function setDNIclienteInt($DNIclienteInt){
        $this->DNIclienteInt = $DNIclienteInt;
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
        $strCuentaTotal = "Número de cuenta: $this->numeroDeCuentaInt.\nDNI: $this->DNIclienteInt.\nSaldo actual: \$$this->saldoActualFlt.\nInterés anual: $this->interesAnualFlt.\n";
        return $strCuentaTotal;
    }
}