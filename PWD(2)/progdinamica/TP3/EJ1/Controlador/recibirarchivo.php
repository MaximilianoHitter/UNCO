<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Vista/styles/bootstrap-5.1.3-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../Vista/styles/css/styles.css" />
    <script src="../Vista/styles/bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
    <title>Su archivo</title>
</head>
<body>
    
<div class="alert alert-secondary" role="alert">
<?php
    $dir = '/wamp64/www/UNCO/TP3/EJ1/archivos/';
        if(isset($_POST)){
            if(isset($_FILES)){
                if($_FILES['archivo']['error'] <= 0){
                    //var_dump($_FILES['archivo']['type']);
                    if($_FILES['archivo']['type'] == 'application/doc' || $_FILES['archivo']['type'] == 'application/pdf'){
                        if($_FILES['archivo']['size'] <= '2MB' ){
                            if(copy($_FILES['archivo']['tmp_name'], $dir.$_FILES['archivo']['name'])){
                                $direccion = $dir.$_FILES['archivo']['name'];
                                $respuesta = "Su archivo se encuentra ";
                                $direccionRelativa = "../archivos/".$_FILES['archivo']['name']; 
                            }else{
                                $respuesta = 'No se ha podido copiar el archivo';
                            }
                        }else{
                            $respuesta = 'Su archivo es demasiado pesado';
                        }
                    }else{
                        $respuesta = 'Su archivo no es tipo doc o pdf';
                    }
                }else{
                    $respuesta = 'Ha habido un error con la subida del archivo';
                }
            }else{
                $respuesta = 'No se ha enviado ningún archivo';
            }
        }else{
            $respuesta = 'No se ha enviado ningún archivo';
        }
        echo $respuesta;
        echo "<a href=\"$direccionRelativa\">Aqui</a>";
    ?>
    
</div>
</body>
</html>