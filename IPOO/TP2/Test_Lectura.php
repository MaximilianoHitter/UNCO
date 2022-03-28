<?php
require_once('Lectura.php');
require_once('Libro.php');
require_once('Persona.php');

$objLibro = new Libro(1234567, 'Juanito y los gatitos', 1996, 'Arcor', 'Juan', 'De Los Palotes', 'DNI', 23456789, 500, 'Es un librito que habla de juanito y sus gatitos');
$objLibro2 = new Libro(1234567, 'Juanito y los gatitos', 1996, 'Arcor', 'Juan', 'De Los Palotes', 'DNI', 23456789, 500, 'Es un librito que habla de juanito y sus gatitos');
$objLectura = new Lectura($objLibro, 23);

//getter y setter de libro
echo $objLectura->getObjLibroLeyendo();
$objLectura->setObjLibroLeyendo($objLibro2);

//getter y setter de la pagina que se esta leyendo
echo $objLectura->getPaginaRegistro();
$objLectura->setPaginaRegistro(20);

//siguiente pagina
$objLectura->siguientePagina();

//pagina anterior
$objLectura->retrocederPagina();

//ir a cirta pagina
$objLectura->irPagina(31);

//toString
echo $objLectura;

