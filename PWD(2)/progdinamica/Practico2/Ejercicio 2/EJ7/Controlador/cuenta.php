<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Vista/styles/bootstrap-5.1.3-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../Vista/styles/css/styles.css" />
    <script src="../Vista/styles/bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
    <title>¡Resultado!</title>
</head>
<body>
<?php
if (isset($_POST)) {
    if (isset($_POST['numero1'])) {
        $numero1 = ($_POST['numero1']);
    } else {
        $numero1 = 0;
    }
    if (isset($_POST['numero2'])) {
        $numero2 = ($_POST['numero2']);
    } else {
        $numero2 = 0;
    }
    if (isset($_POST['operacion'])) {
        $operacion = $_POST['operacion'];
        //var_dump($operacion);
    } else {
        $operacion = '';
    }
    }
?>
    <div class="col-md-8">
        <div class="container px-4 text-center">
            <div class="row gx-5">
                <div class="col">
                    <div class="p-3 border bg-light"><?php echo $numero1?></div>
                </div>
                <div class="col">
                    <div class="p-3 border bg-light"><?php 
                        switch ($operacion) {
                            case 'suma':
                                echo '+';
                                break;

                            case 'resta':
                                echo '-';
                                break;

                            case 'multiplicacion':
                                echo'x';
                                break;

                            case 'division':
                                echo '/';
                                break;
                            
                            default:
                                echo 'N/N';
                                break;
                        }
                    ?></div>
                </div>
                <div class="col">
                    <div class="p-3 border bg-light"><?php echo $numero2?></div>
                </div>
            </div>
        </div>
        <br>
        <div class="alert alert-dark center" role="alert">
            <?php
               switch ($operacion) {
                case 'suma':
                    $resultado = $numero1 + $numero2;
                    echo "La operación es $numero1 + $numero2 = $resultado";
                    break;
        
                case 'resta':
                    $resultado = $numero1 - $numero2;
                    echo "La operacion es $numero1 - $numero2 = $resultado";
                    break;

                case 'multiplicacion':
                    $resultado = $numero1 * $numero2;
                    echo "La operación es $numero1 x $numero2 = $resultado";
                    break;

                case 'division':
                    if ($numero2 == 0) {
                        echo "No se puede dividir por 0";
                    } else {
                        $resultado = $numero1 / $numero2;
                        echo "La opración es $numero1 / $numero2 = $resultado";
                    }
                    break;

                default:
                    echo "No se ha seleccionado ninguna operación";
                    break;
            }
            ?>
        </div>
    </div>
</body>
</html>

