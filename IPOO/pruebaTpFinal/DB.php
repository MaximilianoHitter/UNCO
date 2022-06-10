<?php
class DB{
    private $hostName;
    private $db;
    private $usuario;
    private $pass;
    private $query;
    private $result;
    private $error;
    private $conexion;

    public function __construct(){
        $this->hostName = 'localhost';
        $this->db = 'pruebaipoo';
        $this->usuario = 'root';
        $this->pass = '';
        $this->query = '';
        $this->result = 0;
        $this->error = '';

    }
    
    public function getHostName(){
        return $this->hostName;
    }
    public function setHostName($hostName){
        $this->hostName = $hostName;
    }

    
    public function getDb(){
        return $this->db;
    }
    public function setDb($db){
        $this->db = $db;
    }

    
    public function getUsuario(){
        return $this->usuario;
    }
    public function setUsuario($usuario){
        $this->usuario = $usuario;
    }

    
    public function getPass(){
        return $this->pass;
    }

    public function getQuery(){
        return $this->query;
    }
    public function setQuery($query){
        $this->query = $query;
    }
    
    public function getError(){
        return $this->error;
    }
    public function setError($error){
        $this->error = $error;
    }

    public function getResult(){
        return $this->result;
    }
    public function setResult($result){
        $this->result = $result;
    }

    public function getConexion(){
        return $this->conexion;
    }
    public function setConexion($conexion){
        $this->conexion = $conexion;
    }

    //Pa hacer la conexion, da true si se pudo y false si no y guarda el error
    public function iniciar(){
        $respuesta = false;
        $conexion = mysqli_connect($this->getHostName(), $this->getUsuario(), $this->getPass(), $this->getDb());
        if($conexion){
            if(mysqli_select_db($conexion, $this->getDb())){
                $this->conexion = $conexion;
                $this->setQuery('');
                $this->setError('');
                $respuesta = true;
            }else{
                $this->setError(mysqli_errno($conexion).":".mysqli_error($conexion));
            }
        }else{
            $this->setError(mysqli_errno($this->getConexion()).":".mysqli_error($this->getConexion()));
        }
        return $respuesta;
    }

    //Hacer una query
    public function ejecutar($consulta){
        $respuesta = false;
        $this->setError('');
        $this->setQuery($consulta);
        if($this->setResult(mysqli_query($this->getConexion(), $this->getQuery()))){
            $respuesta = true;
        }else{
            $this->setError(mysqli_errno($this->getConexion()).":".mysqli_error($this->getConexion()));
        }
        return $respuesta;
    }

    //Devuelve el registro que se encontro en la query
    public function registro(){
        $respuesta = null;
        if($this->getResult()){
            $this->setError('');
            if($temporal = mysqli_fetch_assoc(mysqli_result($this->getResult()))){
                $respuesta = $temporal;
            }else{
                mysqli_free_result($this->getResult());
            }
        }else{
            $this->setError(mysqli_errno($this->getConexion()).":".mysqli_error($this->getConexion())); 
        }
        return $respuesta;
    }

    //Devuelve el id de un campo
    public function devuelveID($consulta){
        $respuesta = null;
        $this->setError('');
        $this->setQuery($consulta);
        if($this->setResult(mysqli_query($this->getConexion(), $consulta))){
            $id = mysqli_insert_id();
            $respuesta = $id;
        }else{
            $this->setError(mysqli_errno($this->getConexion()).":".mysqli_error($this->getConexion()));
        }
        return $respuesta;
    }
    

    

    

    

    

    

    
}