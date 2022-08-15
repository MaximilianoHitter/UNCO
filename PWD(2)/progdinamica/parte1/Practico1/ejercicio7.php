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
    $arrayDeVentas = [20.1, 25.1, 25.6, 14.6, 58.4, 9.5, 6.4];
    $resultadoFinal = 0;
    $cantidad = count($arrayDeVentas);
    foreach ($arrayDeVentas as $key => $value) {
        $resultadoFinal += $value;
    };
    $resultadoFinal = $resultadoFinal / $cantidad;
    echo round($resultadoFinal, 2); ?>
</body>

</html>