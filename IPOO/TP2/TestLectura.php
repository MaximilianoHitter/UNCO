<?php
require_once('Lectura.php');
require_once('Libro.php');
require_once('Persona.php');
//Persona
$objAutor = new Persona('Pepe', 'Pepon', 'DNI', 12345678);
$objAutor2 = new Persona('Juan', 'Palote', 'DNI', 12345678);
//Libro
$objLibro1 = new Libro(1, 'JuanitoPalito', 2022, 'Juana', 'Pepe', 'Pepon', 'DNI', 12345678, 500, 'asd');
$objLibro2 = new Libro(2, 'PepeGrillito', 2022, 'Peponcio', 'Pepe', 'Pepon', 'DNI', 12345678, 150, 'asdasd');
$objLibro3 = new Libro(3, 'PoncioPilates', 2021, 'Juana', 'Juan', 'Palote', 'DNI', 12345678, 200, 'poncio hace pilates');


//Test lectura

$objLectura = new Lectura($objLibro1, 20);

echo $objLectura;

$objLectura2 = new Lectura($objLibro2, 0);
$objLectura3 = new Lectura($objLibro3, 20);

//$arraycito = $objLectura->leidosAnioEdicion(2022);
//print_r($arraycito);

$arraycito2 = $objLectura->darLibrosPorAutor('Pepe');
print_r($arraycito2);