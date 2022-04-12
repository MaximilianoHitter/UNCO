<?php
require_once('Cuota.php');
require_once('Financiera.php');
require_once('Persona.php');
require_once('Prestamo.php');

//1.Crear la financiera
$objFinanciera = new Financiera('Money', 'Av. Arg 1234');

//2.Crear prestamos y personas
$objPersona1 = new Persona('Pepe', 'Flores', 12345678, 'Bs As 12', 'dir@mail.com', 299444567, 40000);
$objPersona2 = new Persona('Luis', 'Suarez', 12345689, 'Bs As 123', 'dir@mail.com', 2994455, 4000);

$ObjPrestamo1 = new Prestamo(1, 50000, 5, 0.1, $objPersona1);
$objPrestamo2 = new Prestamo(2, 10000, 4, 0.1, $objPersona2);
$objPrestamo3 = new Prestamo(3, 10000, 2, 0.1, $objPersona2);

//3.Cargar los tres prestamos en la financiera
$objFinanciera->incorporarPrestamo($ObjPrestamo1);
$objFinanciera->incorporarPrestamo($objPrestamo2);
$objFinanciera->incorporarPrestamo($objPrestamo3);

//4.Realizar echo de financiera
echo $objFinanciera;

//5.metodo otorgarPrestamoSiCalifica de la financiera
$objFinanciera->otorgarPrestamoSiCalifica();

//6.Realizar echo de financiera
echo $objFinanciera;

//7.incotar a informarCuotaPagar(2) y guardar esto en $objCuota
$objCuota = $objFinanciera->informarCuotaPagar(1);

/*echo "\n";
$Presupuestos = $objFinanciera->getColeccionPrestamos();
print_r($Presupuestos);*/

//8.Realizar echo de objCuota
echo $objCuota;
echo "\n";

//9.Invocar darMontoFinalCuota con el obj del punto 7
$montoFinal = $objCuota->darMontoFinalCuota();
echo "Monto a pagar de dicha cuota: $montoFinal\n";

//10.invocar setCancelada(true) en el objCuota
$objCuota->setCancelada(true);

//11.invocar informarCuotaPagar(1)
$objCuota = $objFinanciera->informarCuotaPagar(1);

//12.Realizar echo de objCuota
echo "\n";
echo $objCuota;