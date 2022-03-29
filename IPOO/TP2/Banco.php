<?php
class Banco{
    //Atributos
    private $arrayMostradores;

    //Constructo
    public function __construct($nombre, $colaMaxima, $tramites){
        $objMostrador = new Mostrador($nombre, $colaMaxima, $tramites);
        array_push($this->arrayMostradores, $objMostrador);
    }

    //getter del atributo
    public function getMostradores(){
        return $this->arrayMostradores;
    }

    /**Metodo para modificar un mostrador
     * @param obj $mostradorViejo
     * @param obj $mostradorNuevo
     * @return void
     */
    public function modificarMostrador($mostradorViejo, $mostradorNuevo){
        $key = array_search($mostradorViejo, $this->getMostradores());
        $this->arrayMostradores[$key] = $mostradorNuevo;
    }

    /**Metodo para mostrar que mostradores atienden un trámite
     * @param string $unTramite
     * @return array
     */
    public function mostradoresQueAtienden($unTramite){
        $arrayMostradoresQueAtienden = [];
        foreach ($this->getMostradores() as $key => $value) {
            if($value->atiende($unTramite)){
                array_push($arrayMostradoresQueAtienden, $value->getNombre());
            }
            /*if(in_array($unTramite, $value->arrayTramitesPermitidos)){
                array_push($arrayMostradoresQueAtienden, $value->getNombre());
            }*/
        }
        return $arrayMostradoresQueAtienden;
    }

    /**Metodo para mostrar el mejor mostrador para realizar un tramite
     * @param string $unTramite
     * @return string
     */
    public function mejorMostradorPara($unTramite){
        $arrayMostradoresDeTramite = $this->mostradoresQueAtienden($unTramite);
        $menorCola = 100;
        $mejorMostrador = '';
        foreach ($arrayMostradoresDeTramite as $key => $value) {
            if($value->getPersonasEnLaCola() < $value->getMaxCola()){
                if($value->getPersonasEnLaCola() < $menorCola){
                    $menorCola = $value->getPersonasEnLaCola();
                    $mejorMostrador = $value->getNombre();
                }
            }
        }
        return $mejorMostrador;
    }

    /**Metodo para atender un cliente y mandarlo al mostrador con menor cola y que resuelva su tramite
     * @param obj $unCliente
     * @param string
     */
    public function atender($unCliente){
        $tramite = $unCliente->getTramite();
        $mostradorParaAtencion = $this->mejorMostradorPara($tramite);
        if($mostradorParaAtencion == ''){
            $respuesta = "Será atendido en cuanto haya lugar en un mostrador...\n";
        }else{
            $respuesta = "Diríjase al mostrador $mostradorParaAtencion.\n";
        }
        return $respuesta;
    }

    /**Metodo para retornar el promedio de tramites cerrados por día
     * @param void
     * @return float
     */
    public function promTramitesCerradosDia(){
        $contador = 0;
        foreach ($this->arrayMostradores as $key1 => $value1) {
            foreach ($value1->arrayTramites as $key2 => $value2) {
                if($value2->getEstado == 'Cerrado'){
                    $arrayFecha = explode('.', $fecha = $value2->getFechaCierre);
                    if($arrayFecha[0] == date('m')){
                        $contador++;
                    }
                }
            }
        }
        return $contador;
    }

    //toString
    public function __toString(){
        $str = "";
        foreach ($this->getMostradores() as $key => $value) {
            $str .= $value->__toString()."\n";
        }
        return $str;        
    }
}
