<?php
if(isset($_POST['submit'])){
    $numero = $_POST['numero'];
    $resultado = '';
    if($numero < 0){
        $resultado = 'Negativo';
    }elseif($numero > 0){
        $resultado = 'Positivo';
    }else{
        $resultado = 'Cero';
    }
    echo $resultado;
    echo "<button type=\"\"><a href=\"../Vista/formulario.html\">Volver</a></button>";
}
