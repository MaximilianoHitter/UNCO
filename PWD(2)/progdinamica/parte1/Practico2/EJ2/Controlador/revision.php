<?php
if(isset($_GET)){
    $arrayHoras=[];
    if(isset($_GET['lunes'])){
        array_push($arrayHoras, $_GET['lunes']);
    }
    if(isset($_GET['martes'])){
        array_push($arrayHoras, $_GET['martes']);
    }
    if(isset($_GET['miercoles'])){
        array_push($arrayHoras, $_GET['miercoles']);
    }
    if(isset($_GET['jueves'])){
        array_push($arrayHoras, $_GET['jueves']);
    }
    if(isset($_GET['viernes'])){
        array_push($arrayHoras, $_GET['viernes']);
    }
    $cantidadDeHoras = 0;
    foreach ($arrayHoras as $key => $value) {
        $cantidadDeHoras+=$value;
    }
    echo "<p>La cantidad de horas de Programación Web Dinámica es $cantidadDeHoras hs.</p>";
}