<?php
require_once('Viaje.php');
require_once('Pasajero.php');
require_once('ResponsableV.php');


echo "Para usar un viaje ya precargado ingrese si.\n";
$patron = trim(fgets(STDIN));

if($patron == 'si' || $patron == 'Si' || $patron == 'SI'){
    $objResponsable = new ResponsableV(45, 1500, 'Pepe', 'Perez');
    $objViaje = new Viaje(123456, 'Bariloche', 20, $objResponsable);
    $objPasajero1 = new Pasajero('Juan', 'Escamilla', 12345678, 123456789);
    $objPasajero2 = new Pasajero('Carlos', 'Fernandez', 45678945, 456789456);
    $objPasajero3 = new Pasajero('Marcos', 'Ramirez', 45678912, 4567891346);
    $objViaje->agregarPasajero($objPasajero1);
    $objViaje->agregarPasajero($objPasajero2);
    $objViaje->agregarPasajero($objPasajero3);
}else{
    echo "Bienvenido a Viaje Feliz!\n";
    echo "Ingrese los siguientes datos:\n";
    echo "----------------\n";
    echo "Ingrese el código del viaje: \n";
    $codigoViaje = trim(fgets(STDIN));
    echo "Ingrese el destino: \n";
    $destinoViaje = trim(fgets(STDIN));
    echo "Ingrese la máxima cantidad de asientos: \n";
    $cantAsientos = trim(fgets(STDIN));
    echo "Ingrese los datos del responsable del viaje: \n";
    echo "Número de empleado: \n";
    $numEmpleado = trim(fgets(STDIN));
    echo "Número de licencia: \n";
    $numLicencia = trim(fgets(STDIN));
    echo "Nombre: \n";
    $nombre = trim(fgets(STDIN));
    echo "Apellido: \n";
    $apellido = trim(fgets(STDIN));

    $objResponsable = new ResponsableV($numEmpleado, $numLicencia, $nombre, $apellido);
    $objViaje = new Viaje($codigoViaje, $destinoViaje, $cantAsientos, $objResponsable);
}

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
                $objPasajero = tomarDatos();
                if($objViaje->agregarPasajero($objPasajero)){
                    echo "Pasajero agregado con exito.\n";
                }else{
                    echo "El pasajero ya se encuentra en el viaje.\n";
                }
            }else{
                echo "No hay mas lugares en este viaje.\n";
            }            
            break;

        case '5':
            echo "Ingrese el dni del pasajero a quitar: \n";
            $dniSeleccionado = intval(trim(fgets(STDIN)));
            if($objViaje->quitarPasajero($dniSeleccionado)){
                echo "El pasajero se ha quitado.\n";
            }else{
                echo "No se ha encontrado al pasajero.\n";
            }
            break;

        case '6':
            echo "Ingrese el dni del pasajero a modificar: \n";
            $dniPasajero = intval(trim(fgets(STDIN)));
            /*echo "Ingrese los nuevos datos: \n";
            $objPasajero2 = tomarDatos();*/
            if($objViaje->modificarDatosPasajero($dniPasajero)){
                echo "Se han modificado los datos.\n";
            }else{
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


}while($terminal);

function menu(){
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


function tomarDatos(){
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
