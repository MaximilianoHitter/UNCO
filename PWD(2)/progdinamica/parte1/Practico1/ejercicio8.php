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
        $nombres = array('roberto','juan','marta','moria','martin','jorge','miriam','nahuel','mirta');
        $arrayDeSalida = [];
        foreach ($nombres as $key => $value) {
            $primerLetra = substr($value, 0, 1);

            if($primerLetra == 'm'){
                array_push($arrayDeSalida, $value);
            }
        }
        foreach ($arrayDeSalida as $llave => $valor) {
            echo $valor . '<br>';
        }
    ?>
</body>
</html>