<?php
if(isset($_POST)){
    if(isset($_POST['numero1'])){
        $numero1 = intval($_POST['numero1']);
    }else{
        $numero1 = 0;
    }
    if(isset($_POST['numero2'])){
        $numero2 = intval($_POST['numero2']);
    }else{
        $numero2 = 0;
    }
    if(isset($_POST['operacion'])){
        $operacion = $_POST['operacion'];
        //var_dump($operacion);
    }else{
        $operacion = '';
    }

    switch ($operacion) {
        case 'suma':
            $resultado = $numero1 + $numero2;
            echo "La operación es $numero1 + $numero2 = $resultado";
            break;
        
        case 'resta':
            $resultado = $numero1 - $numero2;
            echo "La operacion es $numero1 - $numero2 = $resultado";

        case 'multiplicacion':
            $resultado = $numero1 * $numero2;
            echo "La operación es $numero1 x $numero2 = $resultado";

        case 'division':
            if($numero2 == 0){
                echo "No se puede dividir por 0";
            }else{
                $resultado = $numero1 / $numero2;
                echo "La opración es $numero1 / $numero2 = $resultado";
            }

        default:
            echo "No se ha seleccionado ninguna operación";
            break;
    }
}