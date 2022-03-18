<?php
//Array indexado de arrays asociativos. Cada asociativo tiene (variedad, cantBotellas, añoProduccion, precioPorUnidad)
//retornar array asociativo, con cada varidad retorna (cantBotellas, precioPromedio)
$arrayVinitos[0] = [
    'variedad' => 'malbec',
    'cantBotellas' => 80,
    'añoProduccion' => 2015,
    'precioPorUnidad' => 50
];
$arrayVinitos[1] = [
    'variedad' => 'pinot-noir',
    'cantBotellas' => 180,
    'añoProduccion' => 2016,
    'precioPorUnidad' => 70
];
$arrayVinitos[2] = [
    'variedad' => 'blanco',
    'cantBotellas' => 200,
    'añoProduccion' => 2011,
    'precioPorUnidad' => 90
];
$arrayVinitos[3] = [
    'variedad' => 'tintillo',
    'cantBotellas' => 500,
    'añoProduccion' => 2022,
    'precioPorUnidad' => 15
];

$arrayFiltrado = filtrar($arrayVinitos);
print_r($arrayFiltrado);

/**Funcion para filtrar el array original
 * @param array $vinos
 * @return array
 */
function filtrar($vinos){
    $arrayVinosFiltrado = [];
    foreach ($vinos as $key => $value) {
        $variedad = $value['variedad'];
        $arrayVinosFiltrado[$variedad] = ['cantBotellas' => $value['cantBotellas'],
                                          'precioPromedio' => $value['precioPorUnidad']];
    };
    return $arrayVinosFiltrado;
};
