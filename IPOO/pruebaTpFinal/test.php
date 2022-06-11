<?php
require_once('Persona.php');
$objPersona = new Persona();
if($objPersona->buscar(38258044)){
    echo $objPersona;
}else{
    echo $objPersona->getMensajeOperacion();
}

$objPersona->__toString();

//Para update
/*$objPersona2 = new Persona();
$objPersona2->cargar(42264728, 'Jero', 'pa');
$objPersona2->insert();

$objPersona2->__toString();

$objPersona2->cargar(42264728, 'Jeronimo', 'pa');
$objPersona2->update();

echo $objPersona2;

//Insertar
$objPersonaNueva = new Persona();
$objPersonaNueva->cargar(15215614, 'Pepe', 'l');
$objPersonaNueva->insert();
echo $objPersonaNueva->__toString();
/*
Funciono ok, con un warning pero funco
*/




/* var_dump($objPersona->buscar(38258043));
if($objPersona->buscar(38258043)){
    echo 'true';
}else{
    echo $objPersona->getMensajeOperacion();
} */

/* $conexion = mysqli_connect('127.0.0.1', 'root', '', 'pruebaipoo');
if($conexion){
    echo 'Se conecto';
}else{
    echo 'No se conecto';
}
$dni = 3825803;
$query = "SELECT * FROM persona";
$resultado = mysqli_query($conexion, $query);
var_dump($resultado);
$resultadoPosta = mysqli_fetch_all($resultado);
var_dump($resultadoPosta);
if(mysqli_query($conexion, $query)){

} */