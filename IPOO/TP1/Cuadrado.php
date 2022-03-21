<?php
class Cuadrado{
    /*
    A---B 
    -----
    C---D 
    */

    //Atributos
    private $arrayPuntos = ['PuntoA' => [], 
                            'PuntoB' => [],
                            'PuntoC' => [],
                            'PuntoD' => []];

    //Constructo
    public function __construct($puntoA, $puntoB, $puntoC, $puntoD){
        $this->arrayPuntos = ['PuntoA' => $puntoA, 'PuntoB' => $puntoB, 'PuntoC' => $puntoC, 'PuntoD' => $puntoD];
    }

    //Metodos
    //getters y setters 
    public function getPuntoA(){
        return $this->arrayPuntos['PuntoA'];
    }

    public function getPuntoB(){
        return $this->arrayPuntos['PuntoB'];
    }

    public function getPuntoC(){
        return $this->arrayPuntos['PuntoC'];
    }

    public function getPuntoD(){
        return $this->arrayPuntos['PuntoD'];
    }

    public function setPuntoA($valorA){
        $this->arrayPuntos['PuntoA'] = $valorA;
    }

    public function setPuntoB($valorB){
        $this->arrayPuntos['PuntoB'] = $valorB;
    }

    public function setPuntoC($valorC){
        $this->arrayPuntos['PuntoC'] = $valorC;
    }

    public function setPuntoD($valorD){
        $this->arrayPuntos['PuntoD'] = $valorD;
    }

    /**Metodo para calcular area 
     * @param void 
     * @return float
     */
    public function area(){
        $ladoAB = abs($this->arrayPuntos['PuntoB'][0] - $this->arrayPuntos['PuntoA'][0]);
        $ladoAC = abs($this->arrayPuntos['PuntoA'][1] - $this->arrayPuntos['PuntoC'][1]);
        return $ladoAB * $ladoAC;
    }

    /**Metodo para desplazar cuadrado mediante un punto 
     * @param array $d
     * @return void
     */
    public function desplazar($d){
        //Calculo de lados
        $ladoCALateral = abs($this->arrayPuntos['PuntoA'][1] - $this->arrayPuntos['PuntoC'][1]);
        $ladoCDBase = abs($this->arrayPuntos['PuntoC'][0] - $this->arrayPuntos['PuntoD'][0]);
        //Carga de nuevo punto C
        $this->arrayPuntos['PuntoC'][0] = $d[0];
        $this->arrayPuntos['PuntoC'][1] = $d[1];
        //Calculo de nuevo A
        $this->arrayPuntos['PuntoA'][0] = $this->arrayPuntos['PuntoC'][0];
        $this->arrayPuntos['PuntoA'][1] = abs($this->arrayPuntos['PuntoC'][1] + $ladoCALateral);
        //Calculo de nuevo B 
        $this->arrayPuntos['PuntoB'][0] = $this->arrayPuntos['PuntoC'][0] + $ladoCDBase;
        $this->arrayPuntos['PuntoB'][1] = $this->arrayPuntos['PuntoC'][1] + $ladoCALateral;
        //Calculo de nuevo D 
        $this->arrayPuntos['PuntoD'][0] = $this->arrayPuntos['PuntoC'][0] + $ladoCDBase;
        $this->arrayPuntos['PuntoD'][1] = $this->arrayPuntos['PuntoC'][1];
    }

    /**Metodo para aumentar tamaño, se usa de pivote el punto C 
     * @param float $t
     * @return void
    */
    public function aumentarTamanio($t){
        //Calculo nuevo punto A 
        $this->arrayPuntos['PuntoA'][1] += $t;
        //Calculo nuevo punto B 
        $this->arrayPuntos['PuntoB'][0] += $t;
        $this->arrayPuntos['PuntoB'][1] += $t;
        //Calculo nuevo punto D 
        $this->arrayPuntos['PuntoD'][0] += $t;
    }

    /**Metodo toString override */
    public function __toString(){
        $puntos = '';
        $puntoA = [$this->arrayPuntos['PuntoA'][0], $this->arrayPuntos['PuntoA'][1]];
        $puntos .= "Punto A ($puntoA[0]/$puntoA[1]).\n";
        $puntoB = [$this->arrayPuntos['PuntoB'][0], $this->arrayPuntos['PuntoB'][1]];
        $puntos .= "Punto B ($puntoB[0]/$puntoB[1]).\n";
        $puntoC = [$this->arrayPuntos['PuntoC'][0], $this->arrayPuntos['PuntoC'][1]];
        $puntos .= "Punto C ($puntoC[0]/$puntoC[1]).\n";
        $puntoD = [$this->arrayPuntos['PuntoD'][0], $this->arrayPuntos['PuntoD'][1]];
        $puntos .= "Punto D ($puntoD[0]/$puntoD[1]).\n";
        return $puntos;
    }
}   