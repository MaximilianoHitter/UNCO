<?php
require_once('Persona.php');
$objPersona = new Persona('Juan', 'Pelleti', 'DNI', 32654987);

//Getter y setter de Nombre
echo $objPersona->getNombreStr();
$objPersona->setNombreStr('Carlos');

//Getter y setter de Apellido
echo $objPersona->getApellidoStr();
$objPersona->setApellidoStr('Thoros');

//Getter y setter de Tipo de Documento
echo $objPersona->getTipoDocumentoStr();
$objPersona->setTipoDocumentoStr('LC');

//Getter y setter de Numero de Documento
echo $objPersona->getNumeroDocumentoInt();
$objPersona->setNumeroDocumentoInt(31456789);

echo $objPersona;