<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Vista/styles/bootstrap-5.1.3-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../Vista/styles/css/styles.css" />
    <script src="../Vista/styles/bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
    <title>Horarios de cursada</title>
</head>

<body>
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Carga horaria</h5>
            <p class="card-text">
                <?php
                if (isset($_GET)) {
                    $arrayHoras = [];
                    if (isset($_GET['lunes'])) {
                        array_push($arrayHoras, $_GET['lunes']);
                    }
                    if (isset($_GET['martes'])) {
                        array_push($arrayHoras, $_GET['martes']);
                    }
                    if (isset($_GET['miercoles'])) {
                        array_push($arrayHoras, $_GET['miercoles']);
                    }
                    if (isset($_GET['jueves'])) {
                        array_push($arrayHoras, $_GET['jueves']);
                    }
                    if (isset($_GET['viernes'])) {
                        array_push($arrayHoras, $_GET['viernes']);
                    }
                    $cantidadDeHoras = 0;
                    foreach ($arrayHoras as $key => $value) {
                        $cantidadDeHoras += $value;
                    }
                    echo "<p>La cantidad de horas de Programación Web Dinámica es $cantidadDeHoras hs.</p>";
                }
                ?>
            </p>
            <a href="../Vista/index.php" class="btn btn-primary">Volver</a>
        </div>
    </div>
</body>

</html>