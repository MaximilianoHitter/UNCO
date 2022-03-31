<?php
class Viaje{
    //Atributos
    private $codigoViajeInt;
    private $destinoStr;
    private $cantMaximaPasajerosInt;
    private $cantPasajerosInt = 0;
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
 
    public function getCantPasajerosInt(){
        return $this->cantPasajerosInt;
    }

    public function getArrayPasajeros(){
        return $this->arrayPasajeros;
    }

    /**Metodo para agregar pasajeros
     * @param array $pasajero ['nombre'=>, 'apellido'=>, 'DNI'=>]
     * @return string
     */
    public function agregarPasajero($pasajero){
        $str = '';
        if($this->getCantMaximaPasajerosInt() <= count($this->getArrayPasajeros())){
            $str = "No se pueden agregar mas pasajeros a este viaje.\n";
        }else{
            if(in_array($pasajero, $this->getArrayPasajeros())){
                $str = "Ese pasajero ya tiene un asiento en el viaje.\n";
            }else{
                array_push($this->arrayPasajeros, $pasajero);
                $this->cantPasajerosInt++;
                $str = "Pasajero añadido correctamente.\n";
            }
            
        };
        return $str;        
    }

    public function quitarPasajero($pasajero){
        $str = "No existe dicho pasajero en este viaje.\n";
        if(in_array($pasajero, $this->getArrayPasajeros())){
            $key = array_search($pasajero, $this->arrayPasajeros);
            array_splice($this->arrayPasajeros, $key, 1);
            $this->cantPasajerosInt--;
            $str = "Pasajero borrado.\n";
        }
        return $str;
        /*$dniPasajero = $pasajero['DNI'];
        foreach ($this->arrayPasajeros as $key => $value) {
            if(in_array($dniPasajero, $value)){
                $llave = $key;
                break;
            }
        }
        array_splice($this->arrayPasajeros, $llave, 0);
        $this->cantPasajerosInt--;
        $str = "Pasajero borrado.\n";
        return $str;*/
    }

    /**Metodo para modificar datos de un pasajero
     * @param array $pasajero
     * @param array $pasajero2
     * @return string
     */
    public function modificarDatosPasajero($pasajero, $pasajero2){
        $str = "No se ha encontrado el pasajero.\n";
        if(in_array($pasajero, $this->getArrayPasajeros())){
            $key = array_search($pasajero, $this->getArrayPasajeros() );
            $this->arrayPasajeros[$key] = $pasajero2;            
            $str = "El pasajero ha sido modificado.\n";
        };
        return $str;
    }

    /**Metodo para hacer un string de ls pasajeros
     * @param void
     * @return string
     */
    public function pasajerosString(){
        $strPasajeros = "";
        foreach ($this->arrayPasajeros as $key => $value) {
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
        $str = "
        Viaje: {$this->getCodigoViajeInt()}.\n
        Destino: {$this->getDestinoStr()}.\n
        Cantidad de Asientos: {$this->getCantMaximaPasajerosInt()}.\n
        Asientos ocupados: {$this->getCantPasajerosInt()}.\n
        Datos de Pasajeros: \n $pasajeros";
        return $str;
    }
}