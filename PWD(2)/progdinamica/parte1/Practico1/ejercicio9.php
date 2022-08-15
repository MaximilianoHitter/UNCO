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
        $arrayEnumerativo = array(1, 5, 7, 8, 9, 6, 7, 6, 4, 2);
        $mayor = 0;
        foreach ($arrayEnumerativo as $key => $value) {
            if($mayor < $value){
                $mayor = $value;
            }
        }
        echo $mayor;
    ?>
</body>
</html>