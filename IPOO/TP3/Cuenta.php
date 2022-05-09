<?php
require_once('Cliente.php');
class Cuenta{
    //Atributos
    private $ObjBanco;
    private $ObjCliente;
    private $saldo;

    public function __construct($objBanco, $objCliente){
        $this->ObjBanco=$objBanco;
        $this->ObjCliente=$objCliente;
        $this->saldo= 0;
    }

    public function getObjBanco(){
        return $this->ObjBanco;
    }
    public function setObjBanco($ObjBanco){
        $this->ObjBanco = $ObjBanco;
    }
    public function getObjCliente(){
        return $this->ObjCliente;
    }
    public function setObjCliente($ObjCliente){
        $this->ObjCliente = $ObjCliente;
    }
    public function getSaldo(){
        return $this->saldo;
    }
    public function setSaldo($saldo){
        $this->saldo = $saldo;
    }

    public function __toString(){
        $bancoStr = $this->getObjBanco()->__toString();
        $clienteStr = $this->getObjCliente()->__toString();
        $str = "
        $bancoStr
        $clienteStr
        Saldo: $ {$this->getSaldo()}.\n";
        return $str;
    }

    public function saldoCuenta($monto){
        return $this->getSaldo();
    }

    public function realizarDeposito($monto){
        $saldo = $this->getSaldo();
        $montoTotal = $saldo + $monto;
        $this->setSaldo($montoTotal);
    }

    public function realizarRetiro($monto){
        $saldo = $this->getSaldo();
        if($monto < $saldo){
            $saldo -= $monto;
            $this->setSaldo($saldo);
            $resultado = true;
        }else{
            $resultado = false;
        }
        return $resultado;
    }
}