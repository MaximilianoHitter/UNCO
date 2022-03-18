<?php
$arrayEncuestas = [];
do{
    echo "Nombre: \n";
    $nombrePersona = trim(fgets(STDIN));
    echo "¿Cantidad aproximada de dinero que piensa invertir en sus próximas vacaciones?\n";
    $cantDinero = trim(fgets(STDIN));
    echo "¿Cuantas veces viajó a San Martín?\n";
    $viajesSMA = trim(fgets(STDIN));
    echo "¿Cuantas veces viajó a Bariloche?\n";
    $viajesBari = trim(fgets(STDIN));
    echo "¿Cual es el medio de transporte por excelencia que utiliza para sus vacaciones: Auto o Colectivo?\n";
    $transporte = trim(fgets(STDIN));
    $arrayEncuestas = registrarEncuesta($nombrePersona, $cantDinero, $viajesSMA, $viajesBari, $transporte, $arrayEncuestas);
    echo "¿Desea realizar otra encuesta?: ";
    $respuesta = strtolower(trim(fgets(STDIN)));
}while($respuesta == 'si');

//1. Cantidad de personas encuestadas
$cantDeEncuestas = cantidadPersonasEncuestadas($arrayEncuestas);
echo "Punto 1. Se han realizado $cantDeEncuestas encuestas.\n";

//2. porcentaje de personas que conocen ambos destinos
$porcentajeSMAyBari = porcentajeAmbosDestinos($arrayEncuestas);
$porcentajeSMAyBari = ($porcentajeSMAyBari / $cantDeEncuestas)*100;
echo "Punto 2. El porcentaje de personas que visitaron ambos destinos es $porcentajeSMAyBari.\n";

//3.Personas que mas viajaron a cada destino
$arrayInfoMejorTurista = infoPersona($arrayEncuestas);
$nombreSMA = $arrayInfoMejorTurista['sanmartin']['nombrePersona'];
$transporteSanMartin = $arrayInfoMejorTurista['sanmartin']['transporte'];
echo "El turista con mas viajes a San Martin fue $nombreSMA y su transporte por excelencia es $transporteSanMartin.\n";
$nombreBari = $arrayInfoMejorTurista['bariloche']['nombrePersona'];
$transporteBariloche = $arrayInfoMejorTurista['bariloche']['transporte'];
echo "El turista con mas viajes a Bariloche fue $nombreBari y su transporte por excelencia es $transporteBariloche.\n";
//echo "El turista con mas viajes a San Martin fue $arrayInfoMejorTurista['sanmartin']['nombrePersona'] y su transporte por excelencia es $arrayInfoMejorTurista['sanmartin']['transporte']\n"; ?

//4. Promedio de inversion
$subPromedio = darPromedio($arrayEncuestas);
$promedioInversion = $subPromedio / $cantDeEncuestas;
echo "El promedio de inversión para estas vacaciones fue de $promedioInversion.\n";


/**Funcion para registrar los datos de la encuesta
 * @param string $nombre
 * @param int $dinero
 * @param int $cantsanmartin
 * @param int $cantbariloche
 * @param string $mediotransporte
 * @param array $datos
 * @return array
 */
function registrarEncuesta($nombre, $dinero, $cantsanmartin, $cantbariloche, $mediotransporte, $datos){
    $arrayDeEncuesta = ['nombre' => $nombre,
                        'dinero' => $dinero,
                        'cantsanmartin' => $cantsanmartin,
                        'cantbariloche' => $cantbariloche,
                        'mediotransporte' => $mediotransporte];
    array_push($datos, $arrayDeEncuesta);
    return $datos;
};

/**Funcion para saber la cantidad de personas encuestadas
 * @param array $datos
 * @return int
 */
function cantidadPersonasEncuestadas($datos){
    $cantidad = count($datos);
    return $cantidad;
};

/**Funcion para saber el porcentaje de gente que visito ambos lugares
 * @param array $datos
 * @return float
 */
function porcentajeAmbosDestinos($datos){
    $contador = 0;
    foreach ($datos as $key => $value) {
        if($value['cantsanmartin'] > 0 && $value['cantbariloche'] > 0){
            $contador++;
        };
    };
    return $contador;
};

/**Funcion para obtener un array asociativo con la persona que mas veces viajo a cada destino y que tipo de transporte utiliza dicha persona
 * @param array $datos
 * @return array
 */
function infoPersona($datos){
    $nombrePersonaSMA = '';
    $cantViajesSMA = 0;
    $transporteSMA = '';
    $nombrePersonaBari = '';
    $cantViajesBari = 0;
    $transporteBari = '';
    foreach ($datos as $key => $value) {
        if($value['cantsanmartin'] > $cantViajesSMA){
            $nombrePersonaSMA = $value['nombre'];
            $transporteSMA = $value['mediotransporte'];
        };
        if($value['cantbariloche'] > $cantViajesBari){
            $nombrePersonaBari = $value['nombre'];
            $transporteBari = $value['mediotransporte'];
        };
    };
    $arrayMejoresTuristas = ['sanmartin' => ['nombrePersona' => $nombrePersonaSMA, 'transporte' => $transporteSMA],
                             'bariloche' => ['nombrePersona' => $nombrePersonaBari, 'transporte' => $transporteBari]];
    return $arrayMejoresTuristas;
};

/**Funcion para obtener el número total de inversion entre todos los turistas
 * @param array $datos
 * @return float
 */
function darPromedio($datos){
    $acumulador = 0;
    foreach ($datos as $key => $value) {
        $acumulador += $value['dinero'];
    };
    return $acumulador;
};