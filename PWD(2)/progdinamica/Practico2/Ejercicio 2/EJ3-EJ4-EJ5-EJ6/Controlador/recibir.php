<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Vista/styles/bootstrap-5.1.3-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../Vista/styles/css/styles.css" />
    <script src="../Vista/styles/bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
    <title>Respuesta</title>
</head>

<body>
    <?php
    if (isset($_POST)) {
        if (count($_POST) != 0) {
            if (!empty($_POST['nombre'])) {
                $nombre = $_POST['nombre'];
            } else {
                $nombre = 'Sin Nombre';
            }
            if (!empty($_POST['apellido'])) {
                $apellido = $_POST['apellido'];
            } else {
                $apellido = 'Sin Apellido';
            }
            if (!empty($_POST['edad'])) {
                $edad = $_POST['edad'];
                if ($edad >= 18) {
                    $mayor = true;
                } else {
                    $mayor = false;
                }
            } else {
                $edad = 'Sin Edad';
            }
            if (!empty($_POST['direccion'])) {
                $direccion = $_POST['direccion'];
            } else {
                $direccion = 'Sin Direccion';
            }
            if (!empty($_POST['estudio'])) {
                $nivelestudio = $_POST['estudio'];
            } else {
                $nivelestudio = 'N/N';
            }
            if (!empty($_POST['sexo'])) {
                $sexo = $_POST['sexo'];
            } else {
                $sexo = 'N/N';
            }
            //deportes
            if (!empty($_POST['deporte'])) {
                $deportes = $_POST['deporte'];
            }else{
                $deportes[0] = 'Otros';
            }
            $texto = '';
            if (isset($mayor)) {
                if ($mayor) {
                    $texto = ', puedo ir a la carcel';
                } else {
                    $texto = ', no puedo tomar alcohol';
                }
            }
            echo "<h3>Hola, yo soy $nombre, $apellido tengo $edad años $texto y vivo en $direccion, poseo $nivelestudio y mi sexo es $sexo</h3>";
            echo "Mis deportes favoritos son ";
            if ((count($deportes) == 1 && in_array('Otros', $deportes)) || count($deportes) == 0) {
                echo '<br>';
                echo "Otros";
            } else {
                $strDep = '';
                foreach ($deportes as $key => $value) {
                    echo '<br>';
                    echo "$value";
                }
            }
        } else {
            echo "<h1>No ha ingresado ningun dato</h1>";
        }
    } else {
        echo "<h1>No ha ingresado ningun dato</h1>";
    }
    ?>



</body>

</html>