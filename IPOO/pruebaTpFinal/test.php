<?php
require_once('Persona.php');
$objPersona = new Persona();
if($objPersona->buscar(38258043)){
    echo $objPersona;
}

$objPersona->__toString();

//Para update
$objPersona = new Persona();
$objPersona->cargar(15215614, 'Josecito', 'p');
$objPersona->update();

$objPersona->__toString();

//Insertar
/*$objPersonaNueva = new Persona();
$objPersonaNueva->cargar(15215614, 'Pepe', 'l');
$objPersonaNueva->insert();
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