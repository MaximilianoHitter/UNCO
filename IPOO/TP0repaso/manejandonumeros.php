<?php
$final = '';
do{
    echo 'Ingrese como opción el número de ejercicio, o si desea finalizar, ingrese 0: ';
    $opcion = trim(fgets(STDIN));
    switch ($opcion) {
        case '1':
            echo "Ingrese un número para averiguar su factorial: \n";
            $numero1 = trim(fgets(STDIN));
            $resultado1 = ejercicio1($numero1);
            echo "El resultado del factorial de $numero1 es: $resultado1 \n";
            break;

        case '2':
            echo "Ingrese un número para saber su paridad: \n";
            $numero2 = trim(fgets(STDIN));
            $resultado2 = paridad($numero2);
            $paridadStr = $resultado2 ? 'verdadero' : 'falso';
            echo "¿El número $numero2 es par? Es $paridadStr \n";
            break;

        case '3':
            echo "Ingrese el número N: \n";
            $numeroN = trim(fgets(STDIN));
            echo "Ingrese el número M: \n";
            $numeroM = trim(fgets(STDIN));
            $resultado3 = esDivisible($numeroN, $numeroM);
            $divisibleStr = $resultado3 ? 'verdadero' : 'falso';
            echo "¿El número $numeroN es divisible por el número $numeroM? Es $divisibleStr \n";
            break;

        case '4':
            $coleccion4 = llenarArray();
            $valorMin = min($coleccion4);
            $valorMax = max($coleccion4);
            for ($i=0; $i < count($coleccion4); $i++) { 
                if($valorMin == $coleccion4[$i]){
                    $posicionMin = $i;
                }elseif($valorMax == $coleccion4[$i]){
                    $posicionMax = $i;
                };
            };
            echo "El valor mínimo es $valorMin y se encuentra en la posición $posicionMin \n";
            echo "El valor máximo es $valorMax y se encuentra en la posición $posicionMax \n";
            break;

        case '5':
            echo 'Ingrese una cantidad de nómbres que ingresará: ';
            $cantidad = trim(fgets(STDIN));
            $coleccionNombres = [];
            $coleccionNombres = leerNombres($cantidad);
            print_r($coleccionNombres);
            break;
            
        case '6':
            echo "Ingrese un año: \n";
            $anio = trim(fgets(STDIN));
            $coleccionAniosBisiestos = calculoAniosBisiestos($anio);
            print_r($coleccionAniosBisiestos);
            break;

        case '7':
            $arrayAMasB = concatenarArrays([1, 2, 3], [4, 5, 6]);
            /*echo "Primero se debe llenar el array A: \n";
            $arrayA = llenarArray();
            echo "Luego debemos llenar el array B: \n";
            $arrayB = llenarArray();
            $arrayFinal = concatenarArrays($arrayA, $arrayB);*/
            print_r($arrayAMasB);
            break;

        case '8':
            echo "Primero se debe llenar el array 1: \n";
            $array1 = llenarArray();
            echo "Luego debemos llenar el array 2: \n";
            $array2 = llenarArray();
            $arrayConjunto = comprobarArrays($array1, $array2);
            print_r($arrayConjunto);
            break;

        default:
            $final = 'x';
            break;
    }
}while($final != 'x');

/**Función para analizar un número y devolver su factorial
 * @param int $numeroIngresado
 * @return int 
*/ 
function ejercicio1($numeroIngresado){
    $resultado = $numeroIngresado;
    $decremento = $numeroIngresado-1;
    while($decremento > 1){
        $resultado *= $decremento;
        $decremento--;
    };
    return $resultado;
};

/**Funcion para analizar la paridad de un número
 * @param int $nIngresado 
 * @return boolean
 */
function paridad($nIngresado){
    $paridad = true;
    if(($nIngresado % 2) != 0){
        $paridad = false;
    };
    return $paridad;
};

/**Funcion para saber si un numero n es divisible por uno m 
 * @param int $numN 
 * @param int $numM 
 * @return boolean
*/
function esDivisible($numN, $numM){
    $verificacion = true;
    if(($numN % $numM) != 0){
        $verificacion = false;
    };
    return $verificacion;
};

/**Funcion para rellenar un array con números
 * @param void 
 * @return array
 */
function llenarArray(){
    $arrayNumeros = [];
    echo "Ingrese todos los números enteros que desee, cuando quiera detenerse ingrese X: \n";
    $contador = 0;
    do{
        $num = trim(fgets(STDIN));
        if(is_numeric($num)){
            $arrayNumeros[$contador] = $num;
            $contador++;
        };
        
    }while($num != 'X' || $num != 'x');
    return $arrayNumeros;
};

/**Funcion para leer la cantidad de nombres que vienen por parametro
 * @param int $cantNombres
 * @return array
 */
function leerNombres($cantNombres){
    for ($i=0; $i < $cantNombres; $i++) { 
        echo "Ingrese el nombre número $i: ";
        $coleccion[$i] = trim(fgets(STDIN));
    };
    return $coleccion;
};

/**Funcion para calcular cuantos años bisiestos hay desde el año 0 hasta un parametro
 * @param int $year
 * @return array
 */
function calculoAniosBisiestos($year){
    $year = $year - ($year % 4);
    $arrayAnios = [];
    while($year > 0){
        if((($year % 100) != 0) || (($year % 400) == 0) ){
            array_push($arrayAnios, $year);  
        };
        $year = $year - 4;
    };
    return $arrayAnios;
};

/**Funcion para concatenar arrays 
 * @param array $a 
 * @param array $b 
 * @return array
*/
function concatenarArrays($a, $b){
    $arrayTotal = ($a + $b);
    /*$arrayTotal = $a;
    for ($i=0; $i < count($b); $i++) { 
        $arrayTotal[(count($a) + $i)] = $b[$i];
    };*/
    return $arrayTotal;
};

/**Funcion para comprobar cuales elementos estan en el array1 y no en el array2 
 * @param array $arr1 
 * @param array $arr2
 * @return array
*/
function comprobarArrays($arr1, $arr2){
    $arrayResultado = [];
    foreach ($arr1 as $key => $value) {
        if(!in_array($value, $arr2)){
            array_push($arrayResultado, $value);
        };
    };
    return $arrayResultado;
};
