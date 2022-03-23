<?php
class Login{
    //Atributos
    private $nombreUsuario;
    private $contrasenia;
    private $fraseDeSeguridadStr;
    private $arrayContraseniasViejas = ['', '', '', ''];

    //Constructo
    public function __construct($usuario, $pass, $frasePass){
        $this->nombreUsuario = $usuario;
        $this->contrasenia = $pass;
        $this->fraseDeSeguridadStr = $frasePass;
        //$this->arrayContraseniasViejas[0] = $pass;
    }

    //Metodos
    //getter y setter 
    public function getUsuario(){
        return $this->nombreUsuario;
    }

    public function getContrasenia(){
        return $this->contrasenia;
    }

    public function getFrase(){
        return $this->fraseDeSeguridadStr;
    }

    public function setUsuario($nombre){
        $this->nombreUsuario = $nombre;
    }

    public function setConstrasenia($pass){
        $this->contrasenia = $pass;
    }

    public function setFrase($nuevaFrase){
        $this->fraseDeSeguridadStr = $nuevaFrase;
    }

    /**Metodo para validar contraseña o ver si es una vieja
     * @param string $passAValidar
     * @retur array
     */
    public function validarPass($passAValidar){
        $arrayResultado = ['validado' => false, 'passAntigua' => false];
        if($this->contrasenia === $passAValidar){
            $arrayResultado['validado'] = true;
        }elseif(in_array($passAValidar, $this->arrayContraseniasViejas)){
            $arrayResultado['passAntigua'] = true;
        };
        return $arrayResultado;
    }

    /**Metodo para cambiar contraseña por otra 
     * @param string $nuevaContrasenia
     * @return array 
     */
    public function cambiarPass($nuevaPass){
        $comprobacion = ['validacionFinal' => false, 'passAntigua' => false];
        if(!in_array($nuevaPass, $this->arrayContraseniasViejas)){
            if($nuevaPass != $this->contrasenia){
                array_unshift($this->arrayContraseniasViejas, $this->contrasenia);
                $this->contrasenia = $nuevaPass;
                $this->arrayContraseniasViejas[5] = '';
                $comprobacion['validacionFinal'] = true;
            }
        }else{
            $comprobacion['passAntigua'] = true;
        };
        return $comprobacion;
    }

    /**Metodo para recordar frase de seguridad de el usuario 
     * @return string 
     */
    public function recordarFrase(){
        return $this->fraseDeSeguridadStr;
    }
}
