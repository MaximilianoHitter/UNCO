<?php
require_once('Cafetera.php');
$cafetera = new Cafetera(1500, 300);

echo "La cafetera posee una capacidad máxima de: " . $cafetera->getCapacidadMaxima() . "ml.\n";
echo "La cafetera posee una cantidad actual de: " . $cafetera->getCantidadActual() . "ml.\n";
$cafetera->llenarCafetera();

echo $cafetera->servirTaza(200);

$cafetera->vaciarCafetera();

echo $cafetera->agregarCafe(800);