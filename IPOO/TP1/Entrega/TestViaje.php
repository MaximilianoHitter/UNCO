<?php
require_once('Empresa.php');
require_once('ResponsableV.php');
require_once('Viaje.php');
require_once('Pasajero.php');
require_once('Terrestre.php');
require_once('Aereo.php');
//Con estos datos siempre va a intentar meter al 4 pasajero en el primer viaje, se puede probar cambiando en $viaje1 el tercer parametro por 3, o también cambiando los parametros 'Cama' por 'SemiCama' o también el 'Ida y Vuelta' por 'Ida' o 'Vuelta'
//Creacion de responsables
$responsable1 = new ResponsableV(15, 27, 'Pepe', 'Grillo');
$responsable2 = new ResponsableV(10, 75, 'Juanito', 'Pepin');
$responsable3 = new ResponsableV(13, 46, 'Karen', 'Karitas');
//Creacion de pasajeros
$pasajero1 = new Pasajero('Carlos', 'Chicote', 12345678, 45678);
$pasajero2 = new Pasajero('Juan', 'Pardo', 45678945, 102345);
$pasajero3 = new Pasajero('Lombre', 'Kilo', 4567852, 1234587);
$pasajero4 = new Pasajero('Lucia', 'Nole', 4679852, 4268753);
//Creacion empresa
$empresa1 = new Empresa('Cuchuflito');
//Creacion viajes
$viaje1 = new Terrestre(1, 'Bariloche', 15, $responsable1, 'Cama', 1500, 'Ida y Vuelta');
$viaje2 = new Aereo(2, 'SMA', 45, $responsable2, 2500, 'Ida y Vuelta', 566, 'Primera Clase', 'Juan Carlos Planes', 0);
$viaje3 = new Terrestre(3, 'BSAS', 20, $responsable3, 'Cama', 1800, 'Ida y Vuelta');
//
$array1 = [$pasajero1, $pasajero2, $pasajero3];
$viaje1->setArrayPasajeros($array1);
$array2 = [$pasajero2, $pasajero3, $pasajero1];
$viaje2->setArrayPasajeros($array2);
$array3 = [$pasajero3, $pasajero2, $pasajero1];
$viaje3->setArrayPasajeros($array3);
//
$arrayViajes = [$viaje1, $viaje2, $viaje3];
$empresa1->setArrayViajes($arrayViajes);

$finalizar = true;
do {
    echo menuPrincipal();
    $opcionPrincipal = trim(fgets(STDIN));
    switch ($opcionPrincipal) {
        case '1':
            echo $empresa1->__toString();
            
            break;

        case '2':
            echo "Indique el número de viaje que desea modificar.\n";
            $numViaje = trim(fgets(STDIN));
            $posicion = buscarViaje($numViaje, $empresa1);
            if($posicion >= 0){
                $arrayViaje = $empresa1->getArrayViajes();
                $objViaje = $arrayViaje[$posicion];
                $arrayViaje[$posicion] = viaje($objViaje);
                $empresa1->setArrayViajes($arrayViaje);
            }else{
                echo "No se ha encontrado el viaje.\n";
            }
            break;


        case '3':
            echo "Se venderá un viaje a la persona: \n
            {$pasajero4->__toString()}";
            $importe = $empresa1->venderPasaje($pasajero4);
            if($importe != null){
                echo "El importe es $ {$importe}.\n";
            }else{
                echo "No se ha podido vender el viaje.\n";
            }
            break;

        default:
            $finalizar = false;
            break;
    }
} while ($finalizar);





function buscarViaje($numeroViaje, $empresa){
    $noEncontrado = true;
    $arrayViajes = $empresa->getArrayViajes();
    $count = count($arrayViajes);
    $contador = 0;
    while ($noEncontrado && $contador < $count) {
        $viaje = $arrayViajes[$contador];
        $numero = $viaje->getCodigoViajeInt();
        if($numero == $numeroViaje){
            $noEncontrado = false;
            $posicion = $contador;
        }
    }
    if($noEncontrado){
        $posicion = null;
    }
    return $posicion;    
}

function viaje($objViaje){
    $terminal = true;
    do {
        echo menu();
        $opcion = trim(fgets(STDIN));
        switch ($opcion) {
            case '1':
                echo "El viaje posee el código: {$objViaje->getCodigoViajeInt()}. \n";
                echo "Ingrese el nuevo código: \n";
                $codigo = trim(fgets(STDIN));
                $codigo = intval($codigo);
                $objViaje->setCodigoViajeInt($codigo);
                break;

            case '2':
                echo "El viaje posee como destino a: {$objViaje->getDestinoStr()}. \n";
                echo "Ingrese el nuevo destino: \n";
                $destino = trim(fgets(STDIN));
                $objViaje->setDestinoStr($destino);
                break;

            case '3':
                echo "El viaje posee {$objViaje->getCantMaximaPasajerosInt()} asientos. \n";
                echo "Ingrese la nueva cantidad de asientos: \n";
                $cantidadAsientos = trim(fgets(STDIN));
                $cantidadAsientos = intval($cantidadAsientos);
                $objViaje->setCantMaximaPasajerosInt($cantidadAsientos);
                break;

            case '4':
                if ($objViaje->hayLugar()) {
                    echo "Ingrese los datos de un pasajero: \n";
                    $objPasajero = tomarDatos();
                    if ($objViaje->agregarPasajero($objPasajero)) {
                        echo "Pasajero agregado con exito.\n";
                    } else {
                        echo "El pasajero ya se encuentra en el viaje.\n";
                    }
                } else {
                    echo "No hay mas lugares en este viaje.\n";
                }
                break;

            case '5':
                echo "Ingrese el dni del pasajero a quitar: \n";
                $dniSeleccionado = intval(trim(fgets(STDIN)));
                if ($objViaje->quitarPasajero($dniSeleccionado)) {
                    echo "El pasajero se ha quitado.\n";
                } else {
                    echo "No se ha encontrado al pasajero.\n";
                }
                break;

            case '6':
                echo "Ingrese el dni del pasajero a modificar: \n";
                $dniPasajero = intval(trim(fgets(STDIN)));
                /*echo "Ingrese los nuevos datos: \n";
            $objPasajero2 = tomarDatos();*/
                if ($objViaje->modificarDatosPasajero($dniPasajero)) {
                    echo "Se han modificado los datos.\n";
                } else {
                    echo "No se ha encontrado al pasajero.\n";
                }
                break;


            case '7':
                echo $objViaje;
                break;


            case '8':
                $responsable = $objViaje->getResponsableDeViaje();
                echo $responsable;
                break;

            case '9':
                echo "Ingrese los nuevos datos del responsable: \n
            Número de empleado: ";
                $numEmpleado = trim(fgets(STDIN));
                echo "Número de licencia: \n";
                $numLicencia = trim(fgets(STDIN));
                echo "Nombre: \n";
                $nombre = trim(fgets(STDIN));
                echo "Apellido: \n";
                $apellido = trim(fgets(STDIN));
                $objResponsable = new ResponsableV($numEmpleado, $numLicencia, $nombre, $apellido);
                $objViaje->setResponsableDeViaje($objResponsable);
                break;

            default:
                $terminal = false;
                break;
        }
    } while ($terminal);
    return $objViaje;
}

function menu()
{
    $menu = "Elija una opción:\n
    1. Modificar el código del viaje.\n
    2. Modificar el destino del viaje.\n
    3. Modificar la cantidad de asientos del viaje.\n
    4. Agregar Pasajero. \n
    5. Quitar Pasajero. \n
    6. Modificar Pasajero. \n
    7. Ver viaje. \n
    8. Ver datos del responsable. \n 
    9. Modificar datos del responsable. \n
    10. Salir. \n";
    return $menu;
}

function menuPrincipal()
{
    $menu = "Elija una opción:\n
    1. Ver viajes de la empresa.\n
    2. Cambiar datos de un viaje.\n
    3. Vender un viaje a una persona.\n
    4. Salir.\n";
    return $menu;
}


function tomarDatos()
{
    echo "Nombre: \n";
    $nombre = trim(fgets(STDIN));
    echo "Apellido: \n";
    $apellido = trim(fgets(STDIN));
    echo "DNI: \n";
    $numDni = intval(trim(fgets(STDIN)));
    echo "Teléfono: \n";
    $telefono = trim(fgets(STDIN));
    $objPasajero = new Pasajero($nombre, $apellido, $numDni, $telefono);
    return $objPasajero;
}


//$pasajero1 = ['nombre'=>'Juan', 'apellido'=>'Perez', 'DNI'=>12345678];
//$pasajero2 = ['nombre'=>'Pablo', 'apellido'=>'Jerez', 'DNI'=>12345679];
//$pasajero3 = ['nombre'=>'Emilio', 'apellido'=>'Perico', 'DNI'=>12345680];
