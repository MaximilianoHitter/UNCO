<?php
class Viaje{
    //Atributos
    private $codigoViajeInt;
    private $destinoStr;
    private $cantMaximaPasajerosInt;
    private $arrayPasajeros = [];//['nombre'=>, 'apellido'=>, 'DNI'=>]

    //Construct
    public function __construct($codigo, $destino, $cantMaxima){
        $this->codigoViajeInt = $codigo;
        $this->destinoStr = $destino;
        $this->cantMaximaPasajerosInt = $cantMaxima;
    }

    //Getter y setter
    public function getCodigoViajeInt(){
        return $this->codigoViajeInt;
    }

    public function setCodigoViajeInt($codigoViajeInt){
        $this->codigoViajeInt = $codigoViajeInt;
    }

    public function getDestinoStr(){
        return $this->destinoStr;
    }

    public function setDestinoStr($destinoStr){
        $this->destinoStr = $destinoStr;
    }

    public function getCantMaximaPasajerosInt(){
        return $this->cantMaximaPasajerosInt;
    }

    public function setCantMaximaPasajerosInt($cantMaximaPasajerosInt){
        $this->cantMaximaPasajerosInt = $cantMaximaPasajerosInt;
    }

    public function getArrayPasajeros(){
        return $this->arrayPasajeros;
    }

    public function setArrayPasajeros($arrayPasajeros){
        $this->arrayPasajeros = $arrayPasajeros;
    }

    /**Metodo para agregar pasajeros
     * @param array $pasajero ['nombre'=>, 'apellido'=>, 'DNI'=>]
     * @return string
     */
    public function agregarPasajero($pasajero){
        $boolean = false;   
        $arrayNuevo = $this->getArrayPasajeros();
        if(in_array($pasajero, $this->getArrayPasajeros())){
            $boolean = false;
        }else{
            array_push($arrayNuevo, $pasajero);
            $this->setArrayPasajeros($arrayNuevo);
            $boolean = true;
        }
        return $boolean;        
    }

    /**Metodo para saber si se puede agregar mas personas
     * @param void
     * @return boolean
     */
    public function hayLugar(){
        $boolean = true;
        if($this->getCantMaximaPasajerosInt() <= (count($this->getArrayPasajeros()))){
            $boolean = false;
        }
        return $boolean;
    }

    public function quitarPasajero($pasajero){
        $boolean = false;
        $arrayDeBusqueda = $this->getArrayPasajeros();
        if(in_array($pasajero, $arrayDeBusqueda)){
            $key = array_search($pasajero, $arrayDeBusqueda);
            array_splice($arrayDeBusqueda, $key, 1);
            $this->setArrayPasajeros($arrayDeBusqueda);
            $boolean = true;
        }
        return $boolean;
    }

    /**Metodo para modificar datos de un pasajero
     * @param array $pasajero
     * @param array $pasajero2
     * @return boolean
     */
    public function modificarDatosPasajero($pasajero, $pasajero2){
        $boolean = false;
        $arrayDePaso = $this->getArrayPasajeros();
        if(in_array($pasajero, $arrayDePaso)){            
            $key = array_search($pasajero, $arrayDePaso );
            $arrayDePaso[$key] = $pasajero2;
            $this->setArrayPasajeros($arrayDePaso);            
            $boolean = true;
        };
        return $boolean;
    }

    /**Metodo para hacer un string de ls pasajeros
     * @param void
     * @return string
     */
    private function pasajerosString(){
        $strPasajeros = "";
        foreach ($this->getArrayPasajeros() as $key => $value) {
            $nombre = $value['nombre'];
            $apellido = $value['apellido'];
            $dni = $value['DNI'];
            $strPasajeros .= "
            Nombre: $nombre.\n
            Apellido: $apellido.\n
            DNI: $dni.\n";
        }
        return $strPasajeros;
    }


    //toString
    public function __toString(){
        $pasajeros = $this->pasajerosString();
        $arrayPasajeros = $this->getArrayPasajeros();
        $cantidad = count($arrayPasajeros);
        $str = "
        Viaje: {$this->getCodigoViajeInt()}.\n
        Destino: {$this->getDestinoStr()}.\n
        Cantidad de Asientos: {$this->getCantMaximaPasajerosInt()}.\n
        Asientos ocupados: $cantidad.\n
        Datos de Pasajeros: \n $pasajeros";
        return $str;
    }
}