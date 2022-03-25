<?php
do{
    echo 'Ingrese como opción el número de ejercicio, o si desea finalizar, ingrese 0: ';
    $opcion = trim(fgets(STDIN));
    switch ($opcion) {
        case '1':
            echo "Ingrese una cadena de caracteres finalizada en punto: \n";
            $cadenaStr = trim(fgets(STDIN));
            $posicion = findNeedle($cadenaStr);
            echo "La cadena posee $posicion letras \n";
            break;

        case '2':
            echo "Ingrese un texto finalizado en /x donde x es el caracter que desea saber cuantas veces aparece: \n";
            $cadenaTexto = trim(fgets(STDIN));
            $arrayTexto = str_split($cadenaTexto);
            $needle = $arrayTexto[(count($arrayTexto) - 1)];
            $apariciones = substr_count($cadenaTexto, $needle) -1;
            echo "El caracter $needle aparece $apariciones vez/veces en la cadena \n";
            break;

        case '3':
            echo "Ingrese la primera cadena: \n";
            $cadena1 = trim(fgets(STDIN));
            echo "Ingrese la segunda cadena, la cual confirmare si se encuentra en la primera: \n";
            $cadena2 = trim(fgets(STDIN));
            $contiene1a2 = str_contains($cadena1, $cadena2);//Parece que solo funciona en php 8 ya que en esta version fue añadido.
            if($contiene1a2){
                echo "La segunda cadena está contenida en la primera. \n";
            }else{
                echo "La segunda cadena no está contenida en la primera. \n";
            };
            break;

        case '4':
            echo "Ingrese una cadena: \n";
            $cadenaCont = trim(fgets(STDIN));
            $cont = strlen($cadenaCont);
            echo "La longitud de la cadena es $cont \n";
            break;

        case '5':
            echo "Ingrese la primera cadena: \n";
            $primerStr = trim(fgets(STDIN));
            echo "Ingrese la segunda cadena: \n";
            $segundoStr = trim(fgets(STDIN));
            if(strlen($primerStr) > strlen($segundoStr)){
                echo "La primera cadena posee mas caracteres.\n";
            }elseif(strlen($segundoStr) > strlen($primerStr)){
                echo "La segunda cadena posee mas caracteres.\n";
            }else{
                echo "Ambas cadenas poseen la misma cantidad de caracteres.\n";
            };
            break;
            
        default:
            $opcion = 0;
            break;
    }
}while($opcion != 0);

/**Funcion para contar la cantidad de caracteres que posee un string antes de un punto 
 * @param string $cadena 
 * @return int
*/
function findNeedle($cadena){
    $arrayStr = split($cadena);
    $string = 'abcdefghijklmnñopqrstuvwxyz';
    $int = 0;
    for($i = 0; $i < count($arrayStr); $i++){
        if(str_contains($string, $arrayStr[$i])){
            $int++;
        }
    return $int;
}
