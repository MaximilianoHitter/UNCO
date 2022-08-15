<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $arrayHorarios = array('Lunes'=>array('Arquitectura y seguridad de computadoras', '16:00-20:00'),
    'Martes'=>array('Diseño Gráfico', '16:00-20:00'), 
    'Miercoles'=>array('Arquitectura y seguridad de computadoras', '16:00-20:00'), 
    'Jueves'=>array('Programacion Dinámica', '15:30-18:00'), 
    'Viernes'=>array('Programacion Dinámica', '15:30-20:00'));
    echo '';
    echo "Horarios de cursado:<br>";
    foreach ($arrayHorarios as $key => $contenido) {
        echo "$key:<br>";
        foreach ($contenido as $llave => $value) {
            echo "$value ";
        }
        echo "<br>";
    } ?>
</body>

</html>