<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Vista/styles/bootstrap-5.1.3-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../Vista/styles/css/styles.css" />
    <script src="../Vista/styles/bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
    <title>Su película</title>
</head>

<body>
    <main>
        <div class="alert alert-success" role="alert">
            <?php
            if (isset($_POST)) {
                //recuperacion de datos 
                $dir = '/wamp64/www/UNCO/TP3/EJ3/archivos/';
                if (isset($_FILES)) {
                    if ($_FILES['archivo']['error'] <= 0) {
                        //var_dump($_FILES['archivo']['type']);
                        if ($_FILES['archivo']['type'] == 'image/jpeg') {
                            if (copy($_FILES['archivo']['tmp_name'], $dir . $_FILES['archivo']['name'])) {
                                $direccion = $dir . $_FILES['archivo']['name'];
                                $direccionRelativa = "../archivos/" . $_FILES['archivo']['name'];
                                echo "<img src=\"$direccionRelativa\" class=\"img\" alt=\"una imagen de pelicula\"><br>";
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

                if (isset($_POST['titulo'])) {
                    $titulo = $_POST['titulo'];
                } else {
                    $titulo = '';
                }
                if (isset($_POST['actores'])) {
                    $actores = $_POST['actores'];
                } else {
                    $actores = '';
                }
                if (isset($_POST['director'])) {
                    $director = $_POST['director'];
                } else {
                    $director = '';
                }
                if (isset($_POST['guion'])) {
                    $guion = $_POST['guion'];
                } else {
                    $guion = '';
                }
                if (isset($_POST['produccion'])) {
                    $produccion = $_POST['produccion'];
                } else {
                    $produccion = '';
                }
                if (isset($_POST['anio'])) {
                    $anio = $_POST['anio'];
                } else {
                    $anio = '';
                }
                if (isset($_POST['nacionalidad'])) {
                    $nacionalidad = $_POST['nacionalidad'];
                } else {
                    $nacionalidad = '';
                }
                if (isset($_POST['genero'])) {
                    $genero = $_POST['genero'];
                } else {
                    $genero = '';
                }
                if (isset($_POST['duracion'])) {
                    $duracion = $_POST['duracion'];
                } else {
                    $duracion = '';
                }
                if (isset($_POST['publico'])) {
                    $publico = $_POST['publico'];
                    //var_dump($_POST['publico']);
                } else {
                    $publico = '';
                }
                if (isset($_POST['sinopsis'])) {
                    $sinopsis = $_POST['sinopsis'];
                } else {
                    $sinopsis = '';
                }
                echo "<h2>La película introducida es:</h2>
            <br>
            <p>
            <b>Título:</b> $titulo
            <br>
            <b>Actores:</b> $actores
            <br>
            <b>Director:</b> $director
            <br>
            <b>Guión:</b> $guion
            <br>
            <b>Producción:</b> $produccion
            <br>
            <b>Año:</b> $anio
            <br>
            <b>Nacionalidad:</b> $nacionalidad
            <br>
            <b>Género:</b> $genero
            <br>
            <b>Duracion:</b> $duracion minutos
            <br>
            <b>Restricciones de edad:</b> $publico
            <br>
            <b>Sinopsis:</b> $sinopsis
            </p>";
            }
            ?>
        </div>
    </main>
</body>

</html>