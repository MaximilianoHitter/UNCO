<?php
class Viaje{
    //Atributos
    private $codigoViajeInt;
    private $destinoStr;
    private $cantMaximaPasajerosInt;
    private $arrayPasajeros = [];
    private $responsableDeViaje;

    //Construct
    public function __construct($codigo, $destino, $cantMaxima, $objResponsable){
        $this->codigoViajeInt = $codigo;
        $this->destinoStr = $destino;
        $this->cantMaximaPasajerosInt = $cantMaxima;
        $this->responsableDeViaje = $objResponsable;
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

    public function getResponsableDeViaje(){
        return $this->responsableDeViaje;
    }

    public function setResponsableDeViaje($responsableDeViaje){
        $this->responsableDeViaje = $responsableDeViaje;
    }

    /**Metodo para agregar pasajeros
     * @param objeto $objPasajero 
     * @return string
     */
    public function agregarPasajero($objPasajero){
        $boolean = false;   
        $arrayNuevo = $this->getArrayPasajeros();
        if(in_array($objPasajero, $arrayNuevo)){
            $boolean = false;
        }else{
            array_push($arrayNuevo, $objPasajero);
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
        $cantidadMaxPasajeros = $this->getCantMaximaPasajerosInt();
        $arrayPasajeros = $this->getArrayPasajeros();
        if($cantidadMaxPasajeros <= (count($arrayPasajeros))){
            $boolean = false;
        }
        return $boolean;
    }

    public function quitarPasajero($objPasajero){
        $boolean = false;
        $arrayDeBusqueda = $this->getArrayPasajeros();
        if(in_array($objPasajero, $arrayDeBusqueda)){
            $key = array_search($objPasajero, $arrayDeBusqueda);
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
    public function modificarDatosPasajero($objPasajero, $objPasajero2){
        $boolean = false;
        $arrayDePaso = $this->getArrayPasajeros();
        if(in_array($objPasajero, $arrayDePaso)){            
            $key = array_search($objPasajero, $arrayDePaso );
            $arrayDePaso[$key] = $objPasajero2;
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
            $objPasajero = $value; 
            $string = $objPasajero->__toString();
            $strPasajeros.= $string;
            /*$nombre = $objPasajero->getNombre();
            $apellido = $objPasajero->getApellido();
            $dni = $objPasajero->getNumDni();
            $strPasajeros .= "
            Nombre: $nombre.\n
            Apellido: $apellido.\n
            DNI: $dni.\n";*/
        }
        return $strPasajeros;
    }

    //toString
    public function __toString(){
        $pasajeros = $this->pasajerosString();
        $arrayPasajeros = $this->getArrayPasajeros();
        $responsable = $this->getResponsableDeViaje();
        $responsableString = $responsable->__toString();
        $cantidad = count($arrayPasajeros);
        $str = "
        Viaje: {$this->getCodigoViajeInt()}.\n
        Destino: {$this->getDestinoStr()}.\n
        Cantidad de Asientos: {$this->getCantMaximaPasajerosInt()}.\n
        Asientos ocupados: $cantidad.\n
        Datos del responsable: $responsableString\n
        Datos de Pasajeros: \n $pasajeros";
        return $str;
    }

   
}