<?php
//Clase para acceder y hacer consultas a la db
class DataBase{
    private $hostName;
    private $dataBase;
    private $usuario;
    private $pass;
    private $query;
    private $resultado;
    private $error;
    private $conexion;

    //En el constructor deseo setear todos los datos para que funcione
    public function __construct(){
        $this->hostName = 'localhost';
        $this->dataBase = 'pruebaipoo';
        $this->usuario = 'root';
        $this->pass = '';
        $this->query = '';
        $this->resultado = '';
        $this->error = '';
        $this->conexion = null;
    }

    public function getHostName(){return $this->hostName;}
    public function setHostName($hostName){$this->hostName = $hostName;}
    public function getDataBase(){return $this->dataBase;}
    public function setDataBase($dataBase){$this->dataBase = $dataBase;}
    public function getUsuario(){return $this->usuario;}
    public function setUsuario($usuario){$this->usuario = $usuario;}
    public function getPass(){return $this->pass;}
    public function setPass($pass){$this->pass = $pass;}
    public function getQuery(){return $this->query;}
    public function setQuery($query){$this->query = $query;}
    public function getResultado(){return $this->resultado;}
    public function setResultado($resultado){$this->resultado = $resultado;}
    public function getError(){return $this->error;}
    public function setError($error){$this->error = $error;}
    public function getConexion(){return $this->conexion;}
    public function setConexion($conexion){$this->conexion = $conexion;}

    //Funcion que es solamente para probar la conexion
    public function conexion(){
        $respuesta = false;
        $conect = mysqli_connect($this->getHostName(), $this->getUsuario(), $this->getPass(), $this->getDataBase());
        if($conect){
            $this->setConexion($conect);
            $respuesta = true;
        }else{
            //manejo de error
            $this->setError(mysqli_connect_errno($conect).':'.mysqli_connect_error($conect));
        }
        return $respuesta;
    }

    public function query($consulta){
        $respuesta[0] = false;
        if($this->conexion()){
            //se puede hacer la consulta
            $consultaArmada = mysqli_query($this->getConexion(), $consulta);
            if($consultaArmada){
                //se puede realizar la query bien
                if($consultaArmada->num_rows > 0){
                    //se realizo con exito la consulta
                    $this->setResultado(mysqli_fetch_array($consultaArmada));
                    $respuesta = [true, ''];
                    mysqli_free_result($consultaArmada);
                }else{
                    $respuesta[1] = 'No hubo resultados de la query';
                }
            }else{
                //fallo por algo de la sintaxis de la query
                $this->setError('Fallo la query');
                $respuesta[1] = 'Error';
            }
            
        }
        return $respuesta;
        
    }
}