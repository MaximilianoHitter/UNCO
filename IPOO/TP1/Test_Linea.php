<?php
require_once('Linea.php');
//Programa para probar la clase linea y sus metodos
$objLinea = new Linea(2, 3, 4, 5);
//Getter y setter de A
echo "El punto A vale:" . $objLinea->getPA() . "\n";
$objLinea->setPA(7);
//Getter y setter de B
echo "El punto B vale:" . $objLinea->getPB() . "\n";
$objLinea->setPB(9);
//Getter y setter de C
echo "El punto C vale:" . $objLinea->getPC() . "\n";
$objLinea->setPC(3);
//Getter y setter de D
echo "El punto D vale:" . $objLinea->getPD() . "\n";
$objLinea->setPD(5);
//Mover hacia la derecha
$objLinea->mueveDerecha(5);
//Mover hacia la izquierda
$objLinea->mueveIzquierda(3);
//Mover hacia arriba
$objLinea->mueveArriba(6);
//Mover hacia abajo
$objLinea->mueveAbajo(2);
//toString
echo $objLinea->__toString();