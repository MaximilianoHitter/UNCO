<?php
//Alumno 1000
$arregloFavorito[0] = [
    'nroLegajo' => 1000,
    'codigoMateria' => 5050,
    'notaObtenida' => 9
];
$arregloFavorito[1] = [
    'nroLegajo' => 1000,
    'codigoMateria' => 5060,
    'notaObtenida' => 8
];
$arregloFavorito[2] = [
    'nroLegajo' => 1000,
    'codigoMateria' => 5070,
    'notaObtenida' => 10
];
$arregloFavorito[3] = [
    'nroLegajo' => 1000,
    'codigoMateria' => 5080,
    'notaObtenida' => 9
];
//Alumno 1001
$arregloFavorito[4] = [
    'nroLegajo' => 1001,
    'codigoMateria' => 5050,
    'notaObtenida' => 7
];
$arregloFavorito[5] = [
    'nroLegajo' => 1001,
    'codigoMateria' => 5060,
    'notaObtenida' => 2
];
$arregloFavorito[6] = [
    'nroLegajo' => 1001,
    'codigoMateria' => 5070,
    'notaObtenida' => 7
];
$arregloFavorito[7] = [
    'nroLegajo' => 1001,
    'codigoMateria' => 5080,
    'notaObtenida' => 7
];
//Alumno 1002
$arregloFavorito[8] = [
    'nroLegajo' => 1002,
    'codigoMateria' => 5050,
    'notaObtenida' => 6
];
$arregloFavorito[9] = [
    'nroLegajo' => 1002,
    'codigoMateria' => 5060,
    'notaObtenida' => 7
];
$arregloFavorito[10] = [
    'nroLegajo' => 1002,
    'codigoMateria' => 5070,
    'notaObtenida' => 2
];
$arregloFavorito[11] = [
    'nroLegajo' => 1002,
    'codigoMateria' => 5080,
    'notaObtenida' => 9
];
//Alumno 1003
$arregloFavorito[12] = [
    'nroLegajo' => 1003,
    'codigoMateria' => 5050,
    'notaObtenida' => 8
];
$arregloFavorito[13] = [
    'nroLegajo' => 1003,
    'codigoMateria' => 5060,
    'notaObtenida' => 2
];
$arregloFavorito[14] = [
    'nroLegajo' => 1003,
    'codigoMateria' => 5070,
    'notaObtenida' => 8
];
$arregloFavorito[15] = [
    'nroLegajo' => 1003,
    'codigoMateria' => 5080,
    'notaObtenida' => 1
];
//Alumno 1004
$arregloFavorito[16] = [
    'nroLegajo' => 1004,
    'codigoMateria' => 5050,
    'notaObtenida' => 7
];
$arregloFavorito[17] = [
    'nroLegajo' => 1004,
    'codigoMateria' => 5060,
    'notaObtenida' => 7
];
$arregloFavorito[18] = [
    'nroLegajo' => 1004,
    'codigoMateria' => 5070,
    'notaObtenida' => 10
];
$arregloFavorito[19] = [
    'nroLegajo' => 1004,
    'codigoMateria' => 5080,
    'notaObtenida' => 9
];
//Alumno 1005
$arregloFavorito[20] = [
    'nroLegajo' => 1005,
    'codigoMateria' => 5050,
    'notaObtenida' => 10
];
$arregloFavorito[21] = [
    'nroLegajo' => 1005,
    'codigoMateria' => 5060,
    'notaObtenida' => 4
];
$arregloFavorito[22] = [
    'nroLegajo' => 1005,
    'codigoMateria' => 5070,
    'notaObtenida' => 8
];
$arregloFavorito[23] = [
    'nroLegajo' => 1005,
    'codigoMateria' => 5080,
    'notaObtenida' => 6
];


$arrayMaterias = array(5050, 5060, 5070, 5080);

$salir = true;

do{
    $opcion = obtenerEntrada();
    switch ($opcion) {
    case 'a':
        //punto a
        echo "Ingrese el código de una materia para realizar la busqueda de alumnos inscriptos: \n";
        $materiaBusqueda = trim(fgets(STDIN));
        $cantAlumnos = busquedaPorMateria($materiaBusqueda, $arregloFavorito);
        echo "Para la materia de código $materiaBusqueda se han anotado $cantAlumnos alumnos.\n";
        break;
    
    case 'b':
        //punto b
        $porcentajeMateria0 = calculoMateria($arrayMaterias[0], $arregloFavorito);
        echo "La materia $arrayMaterias[0] posee un porcentaje del $porcentajeMateria0 % \n";
        $porcentajeMateria1 = calculoMateria($arrayMaterias[1], $arregloFavorito);
        echo "La materia $arrayMaterias[1] posee un porcentaje del $porcentajeMateria1 % \n";
        $porcentajeMateria2 = calculoMateria($arrayMaterias[2], $arregloFavorito);
        echo "La materia $arrayMaterias[2] posee un porcentaje del $porcentajeMateria2 % \n";
        $porcentajeMateria3 = calculoMateria($arrayMaterias[3], $arregloFavorito);
        echo "La materia $arrayMaterias[3] posee un porcentaje del $porcentajeMateria3 % \n";
        break;

    case 'c':
        $arrayAlumnoMateria0 = notaMasAltaPorMateria($arrayMaterias[0], $arregloFavorito);
        print_r($arrayAlumnoMateria0);
        $arrayAlumnoMateria1 = notaMasAltaPorMateria($arrayMaterias[1], $arregloFavorito);
        print_r($arrayAlumnoMateria1);
        $arrayAlumnoMateria2 = notaMasAltaPorMateria($arrayMaterias[2], $arregloFavorito);
        print_r($arrayAlumnoMateria2);
        $arrayAlumnoMateria3 = notaMasAltaPorMateria($arrayMaterias[3], $arregloFavorito);
        print_r($arrayAlumnoMateria3);
        break;

    case 'd':
        $alumnosAprobadosMateria0 = cantAprobadosPorMateria($arrayMaterias[0], $arregloFavorito);
        echo "Para la materia $arrayMaterias[0] han aprobado $alumnosAprobadosMateria0 alumnos.\n";
        $alumnosAprobadosMateria1 = cantAprobadosPorMateria($arrayMaterias[1], $arregloFavorito);
        echo "Para la materia $arrayMaterias[1] han aprobado $alumnosAprobadosMateria1 alumnos.\n";
        $alumnosAprobadosMateria2 = cantAprobadosPorMateria($arrayMaterias[2], $arregloFavorito);
        echo "Para la materia $arrayMaterias[2] han aprobado $alumnosAprobadosMateria2 alumnos.\n";
        $alumnosAprobadosMateria3 = cantAprobadosPorMateria($arrayMaterias[3], $arregloFavorito);
        echo "Para la materia $arrayMaterias[3] han aprobado $alumnosAprobadosMateria3 alumnos.\n";
        break;

    case'e':
        echo "Ingrese el codigo de materia que desea saber cuales alumnos aprobaron: \n";
        $codigoMateria = trim(fgets(STDIN));
        $arrAprobados = aprobadosPorMateria($codigoMateria, $arregloFavorito);
        print_r($arrAprobados);
        break;

    case 'f':
        $arrayCantAprobadas = grandesAprobados($arrayMaterias, $arregloFavorito);
        print_r($arrayCantAprobadas);
        break;

    case 'g':
        echo "Ingrese un número de legajo para saber que materias aprobó dicho alumno: \n";
        $alumno = trim(fgets(STDIN));
        $resultadosAlumno = buscarAprobadasAlumno($alumno, $arregloFavorito);
        print_r($resultadosAlumno);
        break;

    case 'x':
        $salir = false;
        break;

    default:
        
        break;
};
}while($salir);

/**Funcion para obtener el ejercicio que se desea resolver
 * @param void
 * @return string
 */
function obtenerEntrada(){
    $esTrue = false;
    do{
        echo "Ingrese la letra del punto que desea ver o x para finalizar: \n";
        $letra = trim(fgets(STDIN));
        if($letra == 'a' || $letra == 'b' || $letra == 'c' || $letra == 'd' || $letra == 'e' || $letra == 'f' || $letra == 'g' || $letra == 'x'){
            $esTrue = true;
        };

    }while($esTrue == false);
    return $letra;
};

/**Funcion para saber cantidad de alumnos en cierta materia
 * @param int $materia
 * @param array $coleccion
 * @return int
 */
function busquedaPorMateria($materia, $coleccion){
    $contadorAlumnos = 0;
    foreach ($coleccion as $key => $value) {
        if($value['codigoMateria'] == $materia){
        $contadorAlumnos++;
        };

    };
    return $contadorAlumnos;
};

/**Funcion para contar materias
 * @param int $materia
 * @param array $datos
 * @return int
 */
function calculoMateria($materia, $datos){
    $contador = 0;
    foreach ($datos as $key => $value) {
        if($value['codigoMateria'] == $materia){
            $contador++;
        };
    };
    $total = count($datos);
    $porcentaje = ($contador / $total)*100;
    return $porcentaje;
};

/**Funcion para obtener la nota mas alta por Materia
 * @param int $numeroMateria
 * @param array $datos
 * @return array
 */
function notaMasAltaPorMateria($numeroMateria, $datos){
    $nota = 0;
    $arrayAlumno = [];
    foreach ($datos as $key => $value) {
        if($value['codigoMateria'] == $numeroMateria){
            if($value['notaObtenida'] > $nota){
                $nota = $value['notaObtenida'];
                $arrayAlumno[0] = $value;
            };
        };
    };
    
    return $arrayAlumno;
};

/**Funcion para saber la cantidad de alumnos aprobados por materia
 * @param int $codMateria
 * @param array $datos
 * @return int
 */
function cantAprobadosPorMateria($codMateria, $datos){
    $contador = 0;
    foreach ($datos as $key => $value) {
        if($value['codigoMateria'] == $codMateria){
            if($value['notaObtenida'] >= 7){
                $contador++;
            };
        };
    };
    return $contador;
};

/**Funcion para saber los aprobados de una materia
 * @param int $codMat
 * @param array $datos
 * @return array
 */
function aprobadosPorMateria($codMat, $datos){
    $arrAprobadosPorMat = [];
    foreach ($datos as $key => $value) {
        if($value['codigoMateria'] == $codMat){
            if($value['notaObtenida'] >= 7){
                array_push($arrAprobadosPorMat, $value);
            };
        };
    };
    return $arrAprobadosPorMat;
};

/**Funcion para saber los legajos de los alumnos que aprobaron mas de 4 materias
 * @param array $materias
 * @param array $datos
 * @return array
 */
function grandesAprobados($materias, $datos){
    $arrayPatron = [];
    $arrayFinal = [];
    foreach ($datos as $key => $value) {
        if($value['notaObtenida'] >= 7){
            if( isset($arrayPatron[$value['nroLegajo']]) ){
                $arrayPatron[$value['nroLegajo']]++;
            }else{
                $arrayPatron[$value['nroLegajo']] = 1;
            };
        };
    };
    //return $arrayPatron;
    foreach ($arrayPatron as $key => $value) {
        if($value >= 4){
            $arrayFinal[$key] = $arrayPatron[$key];
        };
    };
    return $arrayFinal;
};

/**Funcion para buscar todas las materias aprobadas por el alumno
 * @param int $numero
 * @param array $datos
 * @return array
 */
function buscarAprobadasAlumno($numero, $datos){
    $arrayAprobadas = [];
    foreach ($datos as $key => $value) {
        if($value['nroLegajo'] == $numero && $value['notaObtenida'] >= 7){
            array_push($arrayAprobadas, $value['codigoMateria']);
        };
    };
    return $arrayAprobadas;
};