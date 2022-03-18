<?php
//Aun array indexado de arrays asociativos. cada array asociativo posee los datos de un alumno (nombreCompleto, datosCompletosDelTutor, fechaNacimiento, sexo). 
//Retornar un array con (nommbreAlumno, edad, colorSalita), el color de la salita, si es femenino es verde y masculino roja
$arrayAlumnitos[0] = [
    'nombreCompleto' => 'Juanito De Los Palotes',
    'datosCompletosDelTutor' => 'Papa De Los Palotes',
    'fechaNacimiento' => '10, 3, 2015',
    'sexo' => 'masculino'
];
$arrayAlumnitos[1] = [
    'nombreCompleto' => 'Juanito De Los Picotes',
    'datosCompletosDelTutor' => 'Papa De Los Picotes',
    'fechaNacimiento' => '10, 3, 2016',
    'sexo' => 'masculino'
];
$arrayAlumnitos[2] = [
    'nombreCompleto' => 'Juanita De Los Palotes',
    'datosCompletosDelTutor' => 'Papa De Los Palotes',
    'fechaNacimiento' => '10, 3, 2017',
    'sexo' => 'femenino'
];
$arrayAlumnitos[3] = [
    'nombreCompleto' => 'Juanita De Los Picotes',
    'datosCompletosDelTutor' => 'Papa De Los Picotes',
    'fechaNacimiento' => '10, 3, 2018',
    'sexo' => 'femenino'
];

$arraySimplificado = filtrado($arrayAlumnitos);
print_r($arraySimplificado);


/**Funcion para realizar un filtrado del array original y presentar otros datos
 * @param array $datos
 * @return array
 */
function filtrado($datos){
    $year = date('Y');
    $arrayFiltrado = [];
    $arrayCadaNino = [];
    $arrayFecha = [];
    foreach ($datos as $key => $value) {
        $arrayFecha = explode(", ", $value['fechaNacimiento']);
        $arrayCadaNino['nombreAlumno'] = $value['nombreCompleto'];
        $arrayCadaNino['edad'] =  ($year - $arrayFecha[2]);
        if($value['sexo'] == 'masculino'){
            $arrayCadaNino['salita'] = 'roja';
        }else{
            $arrayCadaNino['salita'] = 'verde';
        };
        array_push($arrayFiltrado, $arrayCadaNino);
    };
    return $arrayFiltrado;
};
