<?php
require_once('Persona.php');
/*$objPersona = new Persona();

var_dump($objPersona->buscar(38258043));*/

$conexion = mysqli_connect('127.0.0.1', 'root', '', 'pruebaipoo');
if($conexion){
    echo 'Se conecto';
}else{
    echo 'No se conecto';
}