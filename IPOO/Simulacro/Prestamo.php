<?php
require_once('Cuota.php');
require_once('Persona.php');
class Prestamo{
    //Atributos
    private $identificacion;
    private $codigoElectrodomestico;
    private $fechaOtorgamiento = 'No aprobado.';
    private $monto;
    private $cantidadCuotas;
    private $tazaInteres;
    private $coleccionCuotas = [];
    private $objPersona;

    //Constructo
    public function __construct($identificacion, $monto, $cantidadCuotas, $tazaInteres, $objPersona){
        $this->identificacion = $identificacion;
        $this->monto = $monto;
        $this->cantidadCuotas = $cantidadCuotas;
        $this->tazaInteres = $tazaInteres;
        $this->objPersona = $objPersona;
    }

    //Metodos getter y setter 
    public function getIdentificacion(){
        return $this->identificacion;
    }
    public function setIdentificacion($identificacion){
        $this->identificacion = $identificacion;
    }
    public function getCodigoElectrodomestico(){
        return $this->codigoElectrodomestico;
    }
    public function setCodigoElectrodomestico($codigoElectrodomestico){
        $this->codigoElectrodomestico = $codigoElectrodomestico;
    }
    public function getFechaOtorgamiento(){
        return $this->fechaOtorgamiento;
    }
    public function setFechaOtorgamiento($fechaOtorgamiento){
        $this->fechaOtorgamiento = $fechaOtorgamiento;
    }
    public function getMonto(){
        return $this->monto;
    }
    public function setMonto($monto){
        $this->monto = $monto;
    } 
    public function getCantidadCuotas(){
        return $this->cantidadCuotas;
    }
    public function setCantidadCuotas($cantidadCuotas){
        $this->cantidadCuotas = $cantidadCuotas;
    }
    public function getTazaInteres(){
        return $this->tazaInteres;
    }
    public function setTazaInteres($tazaInteres){
        $this->tazaInteres = $tazaInteres;
    }
    public function getColeccionCuotas(){
        return $this->coleccionCuotas;
    }
    public function setColeccionCuotas($coleccionCuotas){
        $this->coleccionCuotas = $coleccionCuotas;
    }
    public function getObjPersona(){
        return $this->objPersona;
    }
    public function setObjPersona($objPersona){
        $this->objPersona = $objPersona;
    }

    /**Metodo para imprimir la coleccion de cuotas
     * @param void
     * @return string
     */
    private function cuotasString(){
        $str = '';
        $arrayCuotas = $this->getColeccionCuotas();
        if(count($arrayCuotas) == 0){
            $str = 'Préstamo no aprobado';
        }else{
            foreach ($arrayCuotas as $key => $value) {
                $cuota = $value->__toString();
                $str .= $cuota;
            }
        }
        return $str;
    }

    //toString
    public function __toString(){
        $str = "
        Id: {$this->getIdentificacion()}. Código producto: {$this->getCodigoElectrodomestico()}. Fecha: {$this->getFechaOtorgamiento()}. Monto: \${$this->getMonto()}. Cuotas: {$this->getCantidadCuotas()}. Interés: {$this->getTazaInteres()}.";
        $objPersona = $this->getObjPersona();
        $personaString = $objPersona->__toString();
        $cuotasString = $this->cuotasString();
        $str .= $personaString;
        $str .= 'Coleccion cuotas: ';
        $str .= $cuotasString;
        return $str;
    }

    /**Metodo para generar las cuotas
     * @param void
     * @return void
     */
    private function generaCuota(){
        $monto = $this->getMonto();
        $cantidadCuotas = $this->getCantidadCuotas();
        $montoPorCuota = $monto / $cantidadCuotas;
        $arrayCuotas = [];
        for ($i=1; $i <= $cantidadCuotas ; $i++) { 
            $interes = $this->calcularInteresPrestamo($i);
            $cuota = new Cuota($i, $montoPorCuota, $interes);
            $arrayCuotas[$i] = $cuota;
        }
        $this->setColeccionCuotas($arrayCuotas);
    }

    /**Metodo para calcular el interes de cada cuota
     * @param int $numCuota
     * @return float
     */
    private function calcularInteresPrestamo($numCuota){
        $monto = $this->getMonto();
        $cantidadCuotas = $this->getCantidadCuotas();
        $montoPorCuota = $monto / $cantidadCuotas;
        $tazaInteres = $this->getTazaInteres();
        $interes = ($monto- ((($montoPorCuota)*($numCuota-1))))  * ($tazaInteres /10);
        return $interes;
    }

    /**Metodo para aprobar el préstamo 
     * @param void
     * @return void
    */
    public function otorgarPrestamo(){
        $fechaActual = $this->obtenerFechaString();
        $this->setFechaOtorgamiento($fechaActual);
        $this->generaCuota();
    }

    /**Metodo para devolver la fecha en formato dd/mm/aaaa 
     * @param void
     * @return string
    */
    private function obtenerFechaString(){
        $arrayFecha = getdate();
        $dia = $arrayFecha['mday'];
        $mes = $arrayFecha['mon'];
        $anio = $arrayFecha['year'];
        $str = "$dia/$mes/$anio";
        return $str;
    }

    /**Metodo para obtener siguiente cuota
     * @param void
     * @return int 
     */
    public function darSiguienteCuotaPagar(){
        $arrayCuotas = $this->getColeccionCuotas();
        $cuotaSeleccionada = [];
        $patron = true;
        /*$i = 1;
        while($patron && $i == count($arrayCuotas)){
            $cuota = $arrayCuotas[$i];
            $estadoCuota = $cuota->getCancelada();
            if($estadoCuota == 'Sin pagar'){
                $patron = false;
                $cuotaSeleccionada = $cuota;
            }
            $i++;
        }*/
        foreach ($arrayCuotas as $key => $value) {
            if($patron){
                $cuota = $value;
                $estadoCuota = $cuota->getCancelada();
                if($estadoCuota == 'Sin pagar'){
                    $patron = false;
                    $cuotaSeleccionada = $value;
                }
            }
        }
        return $cuotaSeleccionada;
    }
}