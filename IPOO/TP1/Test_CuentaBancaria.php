<?php
require_once('CuentaBancaria.php');
$objCliente = new CuentaBancaria(100021, 38258043, 105000, 1.213);

//getter y setter de Numero de cuenta
echo "El número de cuenta es: " . $objCliente->getNumeroDeCuentaInt() . ".\n";
$objCliente->setNumeroDeCuentaInt(100022);

//getter y setter de DNI
echo "El número de DNI es: " . $objCliente->getDNIclienteInt() . ".\n";
$objCliente->setDNIclienteInt(38258046);

//getter y setter de saldo
echo "El saldo actual es de: $" . $objCliente->getSaldoActualFlt() . ".\n";
$objCliente->setSaldoActualFlt(110110);

//getter y settter de interes anual
echo "El interés anual es del: " . $objCliente->getInteresAnualFlt() . "%.\n";
$objCliente->setInteresAnualFlt(1.22);

$objCliente->actualizarSaldo();

echo $objCliente->depositar(5000);

echo $objCliente->retirar(20000);

echo $objCliente->__toString();