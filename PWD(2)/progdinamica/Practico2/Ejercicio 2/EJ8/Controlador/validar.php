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
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Aquí puede ver su cotización</h5>
            <p class="card-text"></p>
        <?php
        if(isset($_POST)){
            if(isset($_POST['edad'])){
                $edad = $_POST['edad'];
            }else{
                $edad = 0;
            }
            if(isset($_POST['mayor'])){
                if($_POST['mayor'] == 'true'){
                    $estudiante = true;
                }else{
                    $estudiante = false;
                }
            }else{
                $estudiante = false;
            }
            if($estudiante || $edad < 12){
                echo "El valor de su entrada es $160";
            }elseif($estudiante && $edad >= 12){
                echo "El valor de su entrada es $180";
            }else{
                echo "El valor de su entrada es $300";
            }
        }
        ?>
        </p>
            <a href="../Vista/index.php" class="btn btn-primary">¡Volver!</a>
        </div>
    </div>
</body>

</html>