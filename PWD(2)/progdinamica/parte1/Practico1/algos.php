<?php
    $arrayHorarios = array('Lunes'=>array('Arquitectura y seguridad de computadoras', '16:00-20:00'),
     'Martes'=>array('Diseño Gráfico', '16:00-20:00'), 
     'Miercoles'=>array('Arquitectura y seguridad de computadoras', '16:00-20:00'), 
     'Jueves'=>array('Programacion Dinámica', '15:30-18:00'), 
     'Viernes'=>array('Programacion Dinámica', '15:30-20:00'));
    /* $arrayHorarios['Lunes'][0] = 'Arquitectura y seguridad de computadoras';
    $arrayHorarios['Lunes'][1] = '16:00-20:00';

    $arrayHorarios['Martes'][0] = 'Diseño Gráfico';
    $arrayHorarios['Martes'][1] = '16:00-20:00';

    $arrayHorarios['Miercoles'][0] = 'Arquitectura y seguridad de computadoras';
    $arrayHorarios['Miercoles'][1] = '16:00-20:00';

    $arrayHorarios['Jueves'][0] = 'Programacion Dinámica';
    $arrayHorarios['Jueves'][1] = '15:30-18:00';

    $arrayHorarios['Viernes'][0] = 'Programacion Dinámica';
    $arrayHorarios['Viernes'][1] = '15:30-20:00'; */
    echo '';
    echo "Horarios de cursado:<br>";
    foreach ($arrayHorarios as $key => $contenido) {
        echo "$key:<br>";
        foreach ($contenido as $llave => $value) {
            echo "$value ";
        }
        echo "<br>";
    } ?>