<?php
if(isset($_POST)){
    if(count($_POST)!=0){
        if(!empty($_POST['nombre'])){
            $nombre = $_POST['nombre'];
        }else{
            $nombre = 'Sin Nombre';
        }
        if(!empty($_POST['apellido'])){
            $apellido = $_POST['apellido'];
        }else{
            $apellido = 'Sin Apellido';
        }
        if(!empty($_POST['edad'])){
            $edad = $_POST['edad'];
            if($edad >= 18){
                $mayor = true;
            }else{
                $mayor = false;
            } 
        }else{
            $edad = 'Sin Edad';
        }
        if(!empty($_POST['direccion'])){
            $direccion = $_POST['direccion'];
        }else{
            $direccion = 'Sin Direccion';
        }
        if(!empty($_POST['estudio'])){
            $nivelestudio = $_POST['estudio'];
        }else{
            $nivelestudio = 'N/N';
        }
        if(!empty($_POST['sexo'])){
            $sexo = $_POST['sexo'];
        }else{
            $sexo = 'N/N';
        }
        //deportes
        if(!empty($_POST['deporte'])){
            $deportes = $_POST['deporte'];
        }
        $texto = '';
        if(isset($mayor)){
            if($mayor){
                $texto = ', puedo ir a la carcel';
            }else{
                $texto = ', no puedo tomar alcohol';
            }
        }
        echo "<h3>Hola, yo soy $nombre, $apellido tengo $edad años $texto y vivo en $direccion, poseo $nivelestudio y mi sexo es $sexo</h3>";
        echo "Mis deportes favoritos son ";
        $strDep = '';
        foreach ($deportes as $key => $value) {
            echo '<br>';
            echo "$value"; 
        }
    }else{
        echo "<h1>No ha ingresado ningun dato</h1>";
    }
    

}else{
    echo "<h1>No ha ingresado ningun dato</h1>";
}