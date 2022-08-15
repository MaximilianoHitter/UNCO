<?php
$a = 2;
$b = 3;
$c = 5;
$variableMayor;
$variableMayorValor;
$variableMenor;
$variableMenorValor;
if($a >= $b && $a >= $c){
    $variableMayor = $a;
    
    if($b >= $c){
        $variableMenor = $c;
        
    }else{
        $variableMenor = $b;
       
    }
}elseif($b >= $a && $b >= $c){
    $variableMayor = $b;
   
    if($a >= $c){
        $variableMenor = $c;
    
    }else{
        $variableMenor = $a;
 
    }
}elseif($c >= $b && $c >= $a){
    $variableMayor = $c;

    if($a >= $b){
        $variableMenor = $b;

    }else{
        $variableMenor = $a;
 
    }
}
echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>';
echo "La mayor entre $a, $b y $c es $variableMayor";
echo "<br>";
echo "La menor entre $a, $b y $c es $variableMenor";
echo '</body>
</html>';