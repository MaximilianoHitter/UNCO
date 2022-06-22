<?php
require_once('BaseDatos.php');
class ResponsableV {
    //Atributos
    private $numEmpleado;
    private $numLicencia;
    private $nombre;
    private $apellido;
    private $mensajeOp;

    //Constructo
    public function __construct(){
        $this->numEmpleado = '';
        $this->numLicencia = '';
        $this->nombre = '';
        $this->apellido = '';
    }

    public function cargarDatos($numEmpleado, $numLicencia, $nombre, $apellido){
        $this->numEmpleado = $numEmpleado;
        $this->numLicencia = $numLicencia;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
    }

    //Getters y setters
    public function getNumEmpleado(){
        return $this->numEmpleado;
    }
    public function setNumEmpleado($numEmpleado){
        $this->numEmpleado = $numEmpleado;
    }
    public function getNumLicencia(){
        return $this->numLicencia;
    }
    public function setNumLicencia($numLicencia){
        $this->numLicencia = $numLicencia;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function getApellido(){
        return $this->apellido;
    }
    public function setApellido($apellido){
        $this->apellido = $apellido;
    }
    public function getMensajeOp(){
        return $this->mensajeOp;
    }
    public function setMensajeOp($mensajeOp){
        $this->mensajeOp = $mensajeOp;
    }

    //toString
    public function __toString(){
        $numEmpleado = $this->getNumEmpleado();
        $numLicencia = $this->getNumLicencia();
        $nombre = $this->getNombre();
        $apellido = $this->getApellido();
        $str = "
        Número de empleado: $numEmpleado.\n
        Número de licencia: $numLicencia.\n
        Nombre: $nombre.\n
        Apellido: $apellido.\n";
        return $str;
    }

    public function Buscar($numEmpleado){
        $base = new BaseDatos();
        $respuesta = false;
        $consultaNumEmpleado = "SELECT * FROM responsable WHERE rnumeroempleado = $numEmpleado";
        if($base->Iniciar()){
            if($base->Ejecutar($consultaNumEmpleado)){
                if($row2 = $base->Registro()){
                    $this->setNumEmpleado($numEmpleado);
                    $this->setNumLicencia($row2['rnumerolicencia']);
                    $this->setNombre($row2['rnombre']);
                    $this->setApellido($row2['rapellido']);
                    $respuesta = true;
                }
            }else{
                $this->setMensajeOp($base->getError());
            }
        }else{
            $this->setMensajeOp($base->getError());
        }
        return $respuesta;
    }

    public static function listar($condicion = ''){
        $arregloResponsable = null;
        $base = new BaseDatos();
        $consultaResponsable = "SELECT * FROM responsable";
        if($condicion != ''){
            $consultaResponsable = $consultaResponsable . ' WHERE ' . $condicion;
        }
        if($base->Iniciar()){
            if($base->Ejecutar($consultaResponsable)){
                $arregloResponsable = array();
                while($row2 = $base->Registro()){
                    $numEmpleado = $row2['rnumeroempleado'];
                    $numLicencia = $row2['rnumerolicencia'];
                    $nombre = $row2['rnombre'];
                    $apellido = $row2['rapellido'];

                    $responsable = new ResponsableV();
                    $responsable->cargarDatos($numEmpleado, $numLicencia, $nombre, $apellido);
                    array_push($arregloResponsable, $responsable);
                }
            }else{
                //
            }
        }else{
            //$this->setMensajeOp($base->getError());
        }
        return $arregloResponsable;
    }
    
}