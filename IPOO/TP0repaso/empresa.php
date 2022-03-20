<?php
$arrayGananciasPorMes = [];
$arrayGananciasPorMes['Enero'] = ['cantidadRecaudada' => 100000, 'costoTotal' => 20000];
$arrayGananciasPorMes['Febrero'] = ['cantidadRecaudada' => 90000, 'costoTotal' => 0];
$arrayGananciasPorMes['Marzo'] = ['cantidadRecaudada' => 80000, 'costoTotal' => 23000];
$arrayGananciasPorMes['Abril'] = ['cantidadRecaudada' => 70000, 'costoTotal' => 21000];
$arrayGananciasPorMes['Mayo'] = ['cantidadRecaudada' => 70000, 'costoTotal' => 18000];
$arrayGananciasPorMes['Junio'] = ['cantidadRecaudada' => 60000, 'costoTotal' => 15000];
$arrayGananciasPorMes['Julio'] = ['cantidadRecaudada' => 60000, 'costoTotal' => 12000];
$arrayGananciasPorMes['Agosto'] = ['cantidadRecaudada' => 50000, 'costoTotal' => 12000];
$arrayGananciasPorMes['Septiembre'] = ['cantidadRecaudada' => 50000, 'costoTotal' => 15000];
$arrayGananciasPorMes['Octubre'] = ['cantidadRecaudada' => 40000, 'costoTotal' => 10000];
$arrayGananciasPorMes['Noviembre'] = ['cantidadRecaudada' => 40000, 'costoTotal' => 2000];
$arrayGananciasPorMes['Diciembre'] = ['cantidadRecaudada' => 1000, 'costoTotal' => 50000];

$valorGanancia = 0;
$mes = '';
foreach ($arrayGananciasPorMes as $key => $value) {
    $ganancia = $value['cantidadRecaudada'] - $value['costoTotal'];
    if ($ganancia > $valorGanancia) {
        $valorGanancia = $ganancia;
        $mes = $key;
    };
};

echo "El mes de mayor ganancia fue $mes con una ganancia total de $valorGanancia \n";

$arrayEmpleado = [];
$arrayEmpleado[0] = [
    'nombre' => 'Pepe',
    'sueldo' => 10000,
    'antiguedad' => 2
];
$arrayEmpleado[1] = [
    'nombre' => 'Mauro',
    'sueldo' => 15000,
    'antiguedad' => 10
];
$arrayEmpleado[2] = [
    'nombre' => 'Karen',
    'sueldo' => 2000,
    'antiguedad' => 7
];
$arrayEmpleado[3] = [
    'nombre' => 'Sergio',
    'sueldo' => 19000,
    'antiguedad' => 1
];
$arrayEmpleado[4] = [
    'nombre' => 'Seba',
    'sueldo' => 10000,
    'antiguedad' => 10
];
$arrayEmpleado[5] = [
    'nombre' => 'Fabi',
    'sueldo' => 30000,
    'antiguedad' => 12
];

$arrayResultado = calcularSueldos($arrayEmpleado);
print_r($arrayResultado);

/**Funcion para calcular sueldo de empleados 
 * @param array $datos 
 * @return array
 */
function calcularSueldos($datos){
    $nombre = '';
    $sueldoTotal = 0;
    $arrayMedio = [];
    foreach ($datos as $key => $value) {
        $sueldoTotal = $value['sueldo'];
        if ($value['antiguedad'] >= 10) {
            $sueldoTotal *= 1.5;
        } else {
            $sueldoTotal *= 1.25;
        };
        $nombre = $value['nombre'];
        //$arryP = array('nombre' => $nombre, 'sueldoFinal' => $sueldoTotal);
        //$arrayMedio[$key] = ['nombre' => $nombre, 'sueldoFinal' => $sueldoTotal];
        array_push($arrayMedio, ['nombre' => $nombre, 
                                                   'sueldoFinal' => $sueldoTotal]);
    };
    return $arrayMedio;
}

