<?php
$nombre = 'Maximiliano';
$segundoNombre = 'Ariel';
$apellido = 'Hitter';
$edad = 28;
$direccion = 'Valle Encantado';
echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>';
echo strtoupper($nombre) . ' ' . strtoupper($segundoNombre) . ' ' . strtoupper($apellido) . "\nY vive en $direccion y tiene $edad años";
echo '</body>
</html>';