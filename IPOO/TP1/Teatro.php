<?php
class Teatro{
    //Atributos
    private $nombreTeatro;
    private $direccionTeatro;
    private $Funciones = ['01/01/2020' => [['nombre'=>'', 'precio' => 0], ['nombre'=>'', 'precio' => 0], ['nombre'=>'', 'precio' => 0], ['nombre'=>'', 'precio' => 0]]];

    //Constructo
    public function __construct($nombre, $direccion){
        $this->nombreTeatro = $nombre;
        $this->direccionTeatro = $direccion;
    }

    //Metodos
    //Getter y setters
    
    public function getNombreTeatro(){
        return $this->nombreTeatro;
    }

    public function setNombreTeatro($nombreTeatro){
        $this->nombreTeatro = $nombreTeatro;

        return $this;
    }
 
    public function getDireccionTeatro(){
        return $this->direccionTeatro;
    }

    public function setDireccionTeatro($direccionTeatro){
        $this->direccionTeatro = $direccionTeatro;
    }

    public function getFunciones(){
        return $this->Funciones;
    }

    /**Metodo para agregar una función
     * @param string $date
     * @param array $funcion
     * @return string
     */
    public function agregarFuncion($date, $funcion){
        $cantidadFunciones = count($this->Funciones[$date]);
        $strRespuesta = '';
        if($cantidadFunciones >= 4){
            $strRespuesta = "No se pueden agregar mas funciones, ya poseen 4 ese mismo día.\n";
        }else{
            array_push($this->Funciones[$date][], $funcion);
            $strRespuesta = "La función ha sido añadida.\n";
        };
        return $strRespuesta;     
    }

    /**Metodo para modificar el nombre de una función y su precio
     * @param string $date
     * @param string $nombreViejo
     * @param string $nombreNuevo
     * @param float $precio
     * @return string
     */
    public function modificarFuncion($date, $nombreViejo, $nombreNuevo, $precio){
        $strDevuelto = '';
        if(array_key_exists($date, $this->Funciones)){
            if(in_array($nombreViejo, $this->Funciones[$date])){
                foreach ($this->Funciones[$date] as $key => $value){
                    if($value['nombre'] == $nombreViejo){
                        $value['nombre'] = $nombreNuevo;
                        $value['precio'] = $precio;
                    }
                };
                $strDevuelto = "La función se ha modificado correctamente.\n";
            }else{
                $strDevuelto = "No se ha encontrado dicha función.\n";
            };
        }else{
            $strDevuelto = "No se ha encontrado dicha fecha.\n";
        };
        return $strDevuelto;
    }


}