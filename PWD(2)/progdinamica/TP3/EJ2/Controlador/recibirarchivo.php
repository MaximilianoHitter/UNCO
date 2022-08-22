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
    
    <div class="alert alert-dark" role="alert">
    <?php
    $dir = '/wamp64/www/UNCO/TP3/EJ2/archivos/';
    if (isset($_POST)) {
        if (isset($_FILES)) {
            if ($_FILES['archivo']['error'] <= 0) {
                //var_dump($_FILES['archivo']['type']);
                if ($_FILES['archivo']['type'] == 'text/plain') {
                    if (copy($_FILES['archivo']['tmp_name'], $dir . $_FILES['archivo']['name'])) {
                        $direccion = $dir . $_FILES['archivo']['name'];
                        $respuesta = "El contenido de su archivo es el siguiente:<br>";
                        echo $respuesta;
                        $direccionRelativa = "../archivos/" . $_FILES['archivo']['name'];
                        $contenido = file_get_contents($direccion);
                        if($contenido > 0){
                            echo "<textarea>$contenido</textarea>";
                        }
                    } else {
                        echo 'No se ha podido copiar el archivo';
                        
                    }
                } else {
                    echo 'Su archivo no es tipo txt';
                }
            } else {
                echo 'Ha habido un error con la subida del archivo';
            }
        } else {
            echo 'No se ha enviado ningún archivo';
        }
    } else {
        echo 'No se ha enviado nada';
    }

    ?>
    </div>
    </body>

</html>