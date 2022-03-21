<?php
class Cafetera{
    //Atributos
    private $capacidadMaxima;
    private $cantidadActual;

    //Constructo
    public function __construct($contenidoMaximo, $cantidadUtilizada){
        $this->capacidadMaxima = $contenidoMaximo;
        $this->cantidadActual = $cantidadUtilizada;        
    }

    //Metodos
    //getters y setters
    public function getCapacidadMaxima(){
        return $this->capacidadMaxima;
    }

    public function setCapacidadMaxima($capacidadMaxima){
        $this->capacidadMaxima = $capacidadMaxima;
    }

    public function getCantidadActual(){
        return $this->cantidadActual;
    }

    public function setCantidadActual($cantidadActual){
        $this->cantidadActual = $cantidadActual;
    }

    /**Metodo para llenar la cafetera hasta su capacidad maxima
     * @param void
     * @return void
     */
    public function llenarCafetera(){
        $this->cantidadActual = $this->capacidadMaxima;
    }

    /**Metodo para servir una taza
     * @param float $cantidad
     * @return string
     */
    public function servirTaza($cantidad){
        $strResolucion = '';
        if($this->cantidadActual >= $cantidad){
            $this->cantidadActual -= $cantidad;
            $strResolucion = "La taza ha sido llenada, restan $this->cantidadActual ml en la cafetera.\n";
        }else{
            $strResolucion = "El contenido de la cafetera no ha podido llenar la taza, solo se han cargado $this->cantidadActual ml.\n";
            $this->cantidadActual = 0;
        };
        return $strResolucion;
    }

    /**Metodo para vaciar la cafetera
     * @param void
     * @return void
     */
    public function vaciarCafetera(){
        $this->cantidadActual = 0;
    }

    /**Metodo para añdir cafe a la cafetera
     * @param float $cantidad
     * @return string
     */
    public function agregarCafe($cantidad){
        $this->cantidadActual += $cantidad;
        $strRespuesta = '';
        if($this->cantidadActual >= $this->capacidadMaxima){
            $resto = $this->cantidadActual - $this->capacidadMaxima;
            $strRespuesta = "La cafetera se ha llenado y se han derramado $resto ml.\n";
        }else{
            $strRespuesta = "La cafetera ahora posee $this->cantidadActual ml.\n";
        };
        return $strRespuesta;
    }

    //Metodo toString
    public function __toString(){
        $strDevuelto = "La cafetera tiene una capacidad máxima de $this->capacidadMaxima ml y posee, actualmente, $this->cantidadActual ml.\n";
        return $strDevuelto;
    }


}