<?php
echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>';
echo "Tabla del 2 con for:<br>";
for ($i=1; $i < 11; $i++) { 
    $resultado = 2*$i;
    echo "2 x $i es $resultado<br>";
}
echo "<br>";
echo "Tabla del 2 con while:<br>";
$i = 1;
while ($i <= 10) {
    $resultado = 2*$i;
    echo "2 x $i es $resultado<br>";
    $i++;
}
echo "<br>";
echo "Tabla del 2 con do while:<br>";
$i = 1;
do {
    $resultado = 2*$i;
    echo "2 x $i es $resultado<br>";
    $i++;
} while ($i <= 10);
echo '</body>
</html>';