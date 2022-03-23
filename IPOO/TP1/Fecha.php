<?php
class Fecha{
    //Atributos
    private $diaInt;
    private $mesInt;
    private $anioInt;
    private $arrayMesesStr = array(1 => ['nombre' => 'Enero', 'cantDias' => 31],
                                   2 => ['nombre' => 'Febrero', 'cantDias' => 28], 
                                   3 => ['nombre' => 'Marzo', 'cantDias' => 31], 
                                   4 => ['nombre' => 'Abril', 'cantDias' => 30], 
                                   5 => ['nombre' => 'Mayo', 'cantDias' => 31], 
                                   6 => ['nombre' => 'Junio', 'cantDias' => 30], 
                                   7 => ['nombre' => 'Julio', 'cantDias' => 31], 
                                   8 => ['nombre' => 'Agosto', 'cantDias' => 31], 
                                   9 => ['nombre' => 'Septiembre', 'cantDias' => 30], 
                                   10 => ['nombre' => 'Octubre', 'cantDias' => 31], 
                                   11 => ['nombre' => 'Noviembre', 'cantDias' => 30], 
                                   12 => ['nombre' => 'Diciembre', 'cantDias' => 31]);


    //Constructo
    public function __construct($dia, $mes, $anio){
        $this->diaInt = $dia;
        $this->mesInt = $mes;
        $this->anioInt = $anio;
        if($this->tipoDeAnio()){
            $this->arrayMesesStr[1]['cantDias'] = 29;
        }
    }

    //Metodos
    //getters 
    public function getDia(){
        return $this->diaInt;
    }

    public function getMes(){
        return $this->mesInt;
    }

    public function getAnio(){
        return $this->anioInt;
    }

    //setters 
    public function setDia($dia){
        $this->diaInt = $dia;
    }

    public function setMes($mes){
        $this->mesInt = $mes;
    }

    public function setAnio($anio){
        $this->anioInt = $anio;
    }

    //fecha abreviada/toString
    public function fechaAbreviada(){
        $fechaAbreviada = $this->diaInt . "/" . $this->mesInt . "/" . $this->anioInt;
        return $fechaAbreviada; 
    }

    //fecha extendida/toString
    public function fechaExtendida(){
        $fechaExtendida = $this->diaInt . " de " . $this->arrayMesesStr[($this->mesInt) - 1]['nombre'] . " de " . $this->anioInt;
        return $fechaExtendida;
    }

    //function para incrementar de a un día y realizar correcciones
    public function incrementarUnDia(){
        if($this->diaInt >= $this->arrayMesesStr[$this->mesInt]['cantDias']){
            $this->diaInt = 0;
            if($this->mesInt >= 12){
                $this->mesInt = 0;
                $this->anioInt++;
            }else{
                $this->mesInt++;
            };
        }else{
            $this->diaInt++;
        };
    }

    //Saber si es un año bisiesto
    public function tipoDeAnio(){
        $esBisiesto = false;
        if(($this->anioInt % 4) == 0){
            if((($this->anioInt % 100) == 0)){
                if(($this->anioInt % 400) == 0){
                    $esBisiesto = true;
                };
            }; 
        };
        return $esBisiesto;
    }

    /**Metodo que recibe un entero y una fecha y retorna una nueva fecha, se debe ingresar la fecha como dd/mm/aaaa 
     * @param int $diasInt 
     * @param string $fechaCrear
     * @return obj 
    */
    public function incrementar($diasInt, $fechaCrear){
        $arrayFecha = explode("/", $fechaCrear);
        $fechaDia = $arrayFecha[0];
        $fechaMes = $arrayFecha[1];
        $fechaAnio = $arrayFecha[2];
        $objNuevaFecha = new Fecha($fechaDia, $fechaMes, $fechaAnio);
        for ($i=0; $i <= $diasInt; $i++) { 
            $objNuevaFecha->incrementarUnDia();
        };
        return $objNuevaFecha;
    }
}