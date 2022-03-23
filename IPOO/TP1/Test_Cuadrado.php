<?php
require_once("Cuadrado.php");
$puntoA = [1, 6];
$puntoB = [6, 6];
$puntoC = [1, 1];
$puntoD = [6, 1];
$objCuadrado = new Cuadrado($puntoA, $puntoB, $puntoC, $puntoD);
//print_r($objCuadrado);
echo $objCuadrado;
echo $objCuadrado->area();

