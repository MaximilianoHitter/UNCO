<?php
class Mostrador{
    //Atributos
    private $nombreMostrador;
    private $personasEnLaCola = 0;
    private $maxPersonasEnCola;
    private $arrayTramitesPermitidos;
    private $arrayTramites = [];

    //Construct
    public function __construct($nombre, $colaMaxima, $tramites){
        $this->nombreMostrador = $nombre;
        $this->maxPersonasEnCola = $colaMaxima;
        $this->arrayTramitesPermitidos = $tramites;
    }

    //Metodos getter y setter
    public function getNombre(){
        return $this->nombreMostrador;
    }

    public function setNombre($nombre){
        $this->nombreMostrador = $nombre;
    }

    public function getPersonasEnLaCola(){
        return $this->personasEnLaCola;
    }

    public function incrementarCola(){
        if($this->personasEnLaCola >= $this->maxPersonasEnCola){
            $str = "La cola está llena.\n";
        }else{
            $this->personasEnLaCola++;
            $str = "Cliente añadido a la cola.\n";
        }
        return $str;
    }

    public function decrementarCola(){
        if($this->personasEnLaCola > 0){
            $this->personasEnLaCola--;
        }
    }

    public function getMaxCola(){
        return $this->maxPersonasEnCola;
    }

    public function getTramites(){
        return $this->arrayTramitesPermitidos;
    }

    public function agregarTramite($tramite){
        array_push($this->arrayTramitesPermitidos, $tramite);
    }

    public function quitarTramite($tramite){
        $key = array_search($tramite, $this->getTramites);
        unset($this->arrayTramitesPermitidos[$key]);
    }

    /**Metodo para devolver true o false si el tramite parametro puede ser atendido por este mostrador
     * @param string $unTramite
     * @return boolean
     */
    public function atiende($unTramite){
        $boolean = false;
        if(in_array($unTramite, $this->getTramites())){
            $boolean = true;
        };
        return $boolean;
    }

    /**Metodo para ingresar el tramite
     * @param obj $cliente
     * @return void
     */
    public function ingresarTramite($cliente){
        $this->decrementarCola();
        $objTramite = new Tramite($cliente->nombre(), time(), date('m.d.y'));
        array_push($this->arrayTramites, $objTramite);

    }

    /**Metodo para cerra el trámite
     * @param obj $tramite
     * @return void
     */
    public function cerrarTramite($tramite){
        if($tramite->getEstado() == 'Iniciado'){
            $tramite->setEstado('Cerrado');
        }
    }

    /**Metodo para saber el promedio de tramites resueltos
     * @param void
     * @return int
     */
    public function cantTramitesAtendidosMes(){
        $contadorMes = 0;
        $mes = date('m');
        foreach ($this->arrayTramites as $key => $value) {
            $arrayFecha = explode('.', $value->getFechaCierre());
            if($arrayFecha[0] == $mes){
                $contadorMes++;
            }
        }
        return $contadorMes;
    }

    /**Metodo para saber porcentaje de resueltos por sobre todos
     * @param void
     * @return float
     */
    public function porcentajeTramitesResuelto(){
        $contadorResuelto = 0;
        $contadorTotal = count($this->arrayTramites);
        foreach ($this->arrayTramites as $key => $value) {
            if($value->getEstado == 'Cerrado'){
                $contadorResuelto++;
            }
        }
        $promedioTotal = round(($contadorResuelto / $contadorTotal)*100, 2);
        return $promedioTotal;
    }


    //toString
    public function __toString(){
        $tramitesStr = '';
        foreach ($this->getTramites() as $key => $value) {
            $tramitesStr .= $value.',';
        }
        $str = "
        Personas en cola: {$this->getPersonasEnLaCola()}.\n
        Máxima cantidad de personas en cola: {$this->getMaxCola()}.\n
        Trámites que se pueden realizar: $tramitesStr\n";
        return $str;
    }
}