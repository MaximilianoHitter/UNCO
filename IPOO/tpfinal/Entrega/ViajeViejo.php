<?php
class Viaje{
    //Atributos
    private $codigoViajeInt;
    private $destinoStr;
    private $cantMaximaPasajerosInt;
    private $arrayPasajeros = [];
    private $responsableDeViaje;
    private $mensajeOp;
    static $mensajeFallo = '';

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
    public function getMensajeOp(){
        return $this->mensajeOp;
    }
    public function setMensajeOp($mensajeOp){
        $this->mensajeOp = $mensajeOp;
    }
    public function getMensajeFallo(){
        return $this->mensajeFallo;
    }
    public function setMensajeFallo($mensajeFallo){
        $this->mensajeFallo = $mensajeFallo;
    }

    /**Metodo para agregar pasajeros
     * @param objeto $objPasajero 
     * @return string
     */
    public function agregarPasajero($objPasajero){
        $boolean = false;   
        $arrayNuevo = $this->getArrayPasajeros();
        $count = count($arrayNuevo);
        $noEncontrado = true;
        $i = 0;
        
        $dniComparacion = $objPasajero->getNumDni();
        while($noEncontrado && $i < $count){
            $pasajeroSeleccionado = $arrayNuevo[$i];
            $dniSeleccionado = $pasajeroSeleccionado->getNumDni();
            if($dniSeleccionado == $dniComparacion){
                $noEncontrado = false;
            }
            $i++;
        }
        if($noEncontrado){
            $boolean = true;
            //arrayPush
            $count = count($arrayNuevo);
            if($count == 0){
                $arrayNuevo[0] = $objPasajero;
            }else{
                $arrayNuevo[$count] = $objPasajero;
            }
            $this->setArrayPasajeros($arrayNuevo);
        }else{
            $boolean = false;
        }

        /*
        if(in_array($objPasajero, $arrayNuevo)){
            $boolean = false;
        }else{
            array_push($arrayNuevo, $objPasajero);
            $this->setArrayPasajeros($arrayNuevo);
            $boolean = true;
        }*/
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

    public function quitarPasajero($dni){
        $boolean = false;
        $arrayDeBusqueda = $this->getArrayPasajeros();
        $i = 0;
        $posicion = 0;
        $noEncontrado = true;
        //Busqueda del pasajero
        while($noEncontrado || $i < count($arrayDeBusqueda)){
            $pasajeroSeleccionado = $arrayDeBusqueda[$i];
            $dniSeleccionado = $pasajeroSeleccionado->getNumDni();
            if($dniSeleccionado == $dni){
                $noEncontrado = false;
                $posicion = $i;
            }
            $i++;
        }
        if(!$noEncontrado){
            $arrayNuevoSinPasajero = [];
            foreach ($arrayDeBusqueda as $key => $value) {
                $count = count($arrayNuevoSinPasajero);
                if($posicion != $key){
                    if($count == 0){
                        $arrayNuevoSinPasajero[0] = $value;
                    }else{
                        $arrayNuevoSinPasajero[$count] = $value;
                    }
                }
            }
            $this->setArrayPasajeros($arrayNuevoSinPasajero);
            $boolean = true;
        }else{
            $boolean = false;
        }
        


        /*
        if(in_array($objPasajero, $arrayDeBusqueda)){
            $key = array_search($objPasajero, $arrayDeBusqueda);
            array_splice($arrayDeBusqueda, $key, 1);
            $this->setArrayPasajeros($arrayDeBusqueda);
            $boolean = true;
        }*/
        return $boolean;
    }

    /**Metodo para modificar datos de un pasajero
     * @param int $dni
     * @return boolean
     */
    public function modificarDatosPasajero($dni){
        $boolean = false;
        $arrayDePaso = $this->getArrayPasajeros();
        $count = count($arrayDePaso);
        $noEncontrado = true;
        $i = 0;
        $posicion = 0;
        //Busqueda del pasajero
        while($noEncontrado && $i < $count){
            $pasajeroSeleccionado = $arrayDePaso[$i];
            $dniSeleccionado = $pasajeroSeleccionado->getNumDni();
            if($dni == $dniSeleccionado){
                $noEncontrado = false;
                $posicion = $i;
                $boolean = true;
            }
            $i++;
        }
        if(!$noEncontrado){
            $objPasajero = $arrayDePaso[$posicion];
            $this->menuModificar($objPasajero);
            $arrayDePaso[$posicion] = $objPasajero;
        }
        /*
        if(!$noEncontrado){
            $arrayDePaso[$posicion] = $objPasajero2;

        }*/

        /*if(in_array($objPasajero, $arrayDePaso)){            
            $key = array_search($objPasajero, $arrayDePaso );
            $arrayDePaso[$key] = $objPasajero2;
            $this->setArrayPasajeros($arrayDePaso);            
            $boolean = true;
        };*/
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
        }
        return $strPasajeros;
    }

    /**Metodo para preguntar al usuario que dato desea modificar del pasajero
     * @param objeto $objPasajero
     * @return objeto
     */
    private function menuModificar($objPasajero){
        $menuModificar = "
        1. Modificar nombre.\n
        2. Modificar apellido.\n
        3. Modificar dni.\n
        4. Modificar telefono.\n
        5. Ver datos.\n
        6. Salir.\n";
        $salir = true;
        do {
            echo $menuModificar;
            $seleccion = trim(fgets(STDIN));
            switch ($seleccion) {
                case '1':
                    echo "Ingrese el nuevo nombre: \n";
                    $nuevoNombre = trim(fgets(STDIN));
                    $objPasajero->setNombre($nuevoNombre);
                    break;

                case '2':
                    echo "Ingrese el nuevo apellido: \n";
                    $nuevoApellido = trim(fgets(STDIN));
                    $objPasajero->setApellido($nuevoApellido);
                    break;

                case '3':
                    echo "Ingrese el nuevo dni: \n";
                    $nuevoDni = intval(trim(fgets(STDIN)));
                    $objPasajero->setNumDni($nuevoDni);
                    break;

                case '4':
                    echo "Ingrese el nuevo telefono: \n";
                    $nuevoTelefono = trim(fgets(STDIN));
                    $objPasajero->setTelefono($nuevoTelefono);
                    break;

                case '5':
                    echo $objPasajero;
                    break;
                
                default:
                    $salir = false;
                    break;
            }
        } while ($salir);
        return $objPasajero;
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
        Datos del responsable: \n$responsableString\n
        Datos de Pasajeros: \n $pasajeros";
        return $str;
    }

   

    
}