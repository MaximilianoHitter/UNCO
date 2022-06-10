<?php
require_once('DataBase.php');
class Persona{
    //atributos
    private $dni;
    private $nombre;
    private $apellido;
    private $mensajeOperacion;

    public function __construct(){
        $this->dni = '';
        $this->nombre = '';
        $this->apellido = '';
    }

    public function cargar($dni, $nombre, $apellido){
        $this->setDni($dni);
        $this->setNombre($nombre);
        $this->setApellido($apellido);
    }

    public function getDni(){
        return $this->dni;
    }
    public function setDni($dni){
        $this->dni = $dni;
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
    public function getMensajeOperacion(){
        return $this->mensajeOperacion;
    }
    public function setMensajeOperacion($mensajeOperacion){
        $this->mensajeOperacion = $mensajeOperacion;
    }

    //busca en la db el dni de la persona
    public function buscar($dni){
        $base = new DataBase();
        $consultaPersona = "SELECT * FROM persona WHERE dni=$dni";
        $respuesta = false;
        $resultado = $base->query($consultaPersona);
        if($resultado[0]){
            $consultaRespondida = $base->getResultado();
            $this->setDni($consultaRespondida['dni']);
            $this->setNombre($consultaRespondida['nombre']);
            $this->setApellido($consultaRespondida['apellido']);
            $respuesta = true;
        }else{
            $this->setMensajeOperacion($base->getError());
        }
        return $respuesta;
    }
    
    //Para usar el insert tiene que crear una instancia y con cargar() cargarle los datos que quiere meter
    public function insert(){
        $respuesta = false;
        $base = new DataBase();
        $consulta = "INSERT INTO persona VALUES ('{$this->getDni()}', '{$this->getNombre()}', '{$this->getApellido()}')";
        $resultado = $base->query($consulta);
        if($resultado[0]){
            $respuesta = true;
        }else{
            $this->setMensajeOperacion($base->getError()); 
        }
        return $respuesta;
    }

    //Para hacer el update tiene que crear una instancia y con cargar() ponerle minimo el dni original y los otros datos que desea modificar
    public function update(){
        $respuesta = false;
        $base = new DataBase();
        $consulta = "UPDATE persona SET dni='{$this->getDni()}' AND nombre='{$this->getNombre()}' AND apellido='{$this->getApellido()}' WHERE dni={$this->getDni()}";
        $resultado = $base->query($consulta);
        if($resultado[0]){
            $respuesta = true;
        }else{
            $this->setMensajeOperacion($base->getError()); 
        }
        return $respuesta;
    }


    public function __toString(){
        $str = "
        Dni: {$this->getDni()}.\n
        Nombre: {$this->getNombre()}.\n
        Apellido: {$this->getApellido()}.\n";
        return $str;
    }

}