<?php
require_once('Viaje.php');
echo "Bienvenido a Viaje Feliz!\n";
echo "Ingrese los siguientes datos:\n";
echo "----------------\n";
echo "Ingrese el código del viaje: \n";
$codigoViaje = trim(fgets(STDIN));
echo "Ingrese el destino: \n";
$destinoViaje = trim(fgets(STDIN));
echo "Ingrese la máxima cantidad de asientos: \n";
$cantAsientos = trim(fgets(STDIN));

//['nombre'=>, 'apellido'=>, 'DNI'=>] para pasajero
$objViaje = new Viaje($codigoViaje, $destinoViaje, $cantAsientos);
$terminal = true;
do{
    echo menu();
    $opcion = trim(fgets(STDIN));
    switch ($opcion) {
        case '1':
            echo "El viaje posee el código: {$objViaje->getCodigoViajeInt()}. \n";
            echo "Ingrese el nuevo código: \n";
            $codigo = trim(fgets(STDIN));
            $codgo = intval($codigo);
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
            if($objViaje->hayLugar()){
                echo "Ingrese los datos de un pasajero: \n";
                $pasajero = tomarDatos();
                echo $objViaje->agregarPasajero($pasajero);
            }else{
                echo "No hay mas lugare en este viaje.\n";
            }            
            break;

        case '5':
            echo "Ingrese los datos del pasajero a quitar: \n";
            $pasajero = tomarDatos();
            echo $objViaje->quitarPasajero($pasajero);
            break;

        case '6':
            echo "Ingrese los datos del pasajero a modificar: \n";
            $pasajero = tomarDatos();
            echo "Ingrese los nuevos datos: \n";
            $pasajero2 = tomarDatos();
            echo $objViaje->modificarDatosPasajero($pasajero, $pasajero2);
            break;

            
        case '7':
            echo $objViaje;
            break;

        default:
            $terminal = false;
            break;
    }


}while($terminal);

function menu(){
    return $menu = "Elija una opción:\n
    1. Modificar el código del viaje.\n
    2. Modificar el destino del viaje.\n
    3. Modificar la cantidad de asientos del viaje.\n
    4. Agregar Pasajero. \n
    5. Quitar Pasajero. \n
    6. Modificar Pasajero. \n
    7. Ver viaje. \n
    8. Salir. \n";
}


function tomarDatos(){
    echo "Nombre: \n";
    $nombre = trim(fgets(STDIN));
    echo "Apellido: \n";
    $apellido = trim(fgets(STDIN));
    echo "DNI: \n";
    $dni = intval(trim(fgets(STDIN)));
    $pasajero = ['nombre'=>$nombre, 'apellido'=>$apellido, 'DNI'=>$dni];
    return $pasajero;
}


//$pasajero1 = ['nombre'=>'Juan', 'apellido'=>'Perez', 'DNI'=>12345678];
//$pasajero2 = ['nombre'=>'Pablo', 'apellido'=>'Jerez', 'DNI'=>12345679];
//$pasajero3 = ['nombre'=>'Emilio', 'apellido'=>'Perico', 'DNI'=>12345680];
