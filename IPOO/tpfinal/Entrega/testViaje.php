<?php
/*
Volver a implementar las operaciones que permiten modificar el nombre, apellido y teléfono de un pasajero. Luego implementar la operación que agrega los pasajeros al viaje, solicitando por consola la información de los mismos. Se debe verificar que el pasajero no este cargado mas de una vez en el viaje. De la misma forma cargue la información del responsable del viaje


Comentario 0: Relacion pasajero viaje es 1 a 1. Relacion empresa viaje es 1 a N. Relacion responsable viaje es 1 a N.
Comentario 1: Tuve que optar por hacer que los campos de clave primaria de las tablas de Empresa, Responsable y Viaje no sean AUTO_INCREMENT porque en algunos métodos no podía obtener el id y no me permitia llamar al metodo modificar.
Comentario 2: A todas las clases les cree un atributo statico llamado MensajeFallo, asi como sus getter y setter estáticos y en cada clase también hay un 
metodo statico llamado listar, mas que nada me sentí en la necesidad de crear estos atributos y metodos de clase porque si me encontraba con un error mientras
se realizaba la búsqueda de todas las tuplas de la tabla no tenía donde guardar dicho error, ya que al no tener creada una instancia del objeto no podía llamar al 
atributo de instancia MensajeOperacion con el this.

1)Ejecute el script sql provisto para crear la base de datos bdviajes y sus tablas.  Yasssta

2)Implementar dentro de la clase TestViajes una operación que permita ingresar, modificar y eliminar la información de la empresa de viajes.

3)Implementar dentro de la clase TestViajes una operación que permita ingresar, modificar y eliminar la información de un viaje, teniendo en cuenta las particularidades expuestas en el dominio a lo largo del cuatrimestre.
*/
require_once('Empresa.php');
require_once('ResponsableV.php');
require_once('Viaje.php');
require_once('Pasajero.php');

//Borrar datos anteriores en la db 
/*$base = new BaseDatos();
if ($base->Iniciar()) {
    if ($base->Ejecutar("DELETE FROM viaje")) {
        echo "Se borró contenido de viaje.\n";
    } else {
        echo "No se borró contenido de viaje.\n";
    }
    if ($base->Ejecutar("DELETE FROM empresa")) {
        echo "Se borro contenido de empresa.\n";
    } else {
        echo "No se borró contenido empresa.\n";
    }
    if ($base->Ejecutar("DELETE FROM responsable")) {
        echo "Se borró contenido responsable.\n";
    } else {
        echo "No se borró contenido responsable.\n";
    }
} else {
    echo "No se pudo borrar ningún dato anterior.\n";
};*/

//Creacion e insert de una empresa
/*$objEmpresa1 = new Empresa();
$objEmpresa1->cargarDatos(1, 'PepitosCompany', 'Calle falsa 123');
if ($objEmpresa1->insertar()) {
    echo "Se inserto la empresa.\n";
} else {
    echo "No se insertó la empresa.\n";
    echo $objEmpresa1->getMensajeOp();
};*/
//Funciono!

//Modificacion de empresa
/*$objEmpresa1->cargarDatos(1, '404Company', 'En la UNCO');
if($objEmpresa1->modificar()){
    echo "Se modificó la empresa.\n";
}else{
    echo "No se modificó la empresa.\n";
    echo $objEmpresa1->getMensajeOp();
}*/
//Funciono!

//Eliminar la empresa
/*if($objEmpresa1->eliminar()){
    echo "Se borró la empresa.\n";
}else{
    echo "No se borró la empresa.\n";
    echo $objEmpresa1->getMensajeOp();
}*/
//Funciono!

//Crear nueva empresa
/*$objEmpresa2 = new Empresa();
$objEmpresa2->cargarDatos(2, 'JuanitosAndPalmitos', 'Calle Cuadrada 360');
if ($objEmpresa2->insertar()) {
    echo "Se inserto la empresa.\n";
} else {
    echo "No se insertó la empresa.\n";
    echo $objEmpresa2->getMensajeOp();
};*/
//Funciono!

//Crear otra empresa
/*$objEmpresa3 = new Empresa();
$objEmpresa3->cargarDatos(3, 'ASD', 'ASD');
if ($objEmpresa3->insertar()) {
    echo "Se inserto la empresa.\n";
} else {
    echo "No se insertó la empresa.\n";
    echo $objEmpresa3->getMensajeOp();
};*/
//Funciono!

//Crear responsable
/*$objResponsable1 = new ResponsableV();
$objResponsable1->cargarDatos(1, 12345, 'Aquiles', 'Bailo');
if ($objResponsable1->insertar()) {
    echo "Se inserto el responsable.\n";
} else {
    echo $objResponsable1->getMensajeOp();
};*/
//Funciono!

//Se inserta viaje
/*$objViaje1 = new Viaje();
$objViaje1->cargarDatos(1, 'Barilo', 50, $objEmpresa2, $objResponsable1, 1500, 'Cama', 'Solo ida');

if ($objViaje1->insertar()) {
    echo "Se inserto el viaje.\n";
} else {
    echo $objViaje1->getMensajeOp();
};*/
//Funciono!

//Modificar los datos de viaje
//Tener en cuenta que solo se pueden usar como datos de empresa el $objEmpresa2 y como responsable $objResponsable1
/*$objViaje1->cargarDatos(1, 'PachaMama', 40, $objEmpresa2, $objResponsable1, 1200, 'Semi-cama', 'Solo vuelta');
if($objViaje1->modificar()){
    echo "Se modificó el viaje.\n";
}else{
    echo "No se modificó el viaje.\n";
    echo $objViaje1->getMensajeOp();
};*/
//Funciono!

//Eliminar los datos del viaje
/*if($objViaje1->eliminar()){
    echo "Se eliminó el viaje.\n";
}else{
    echo "No se eliminó el viaje.\n";
    echo $objViaje1->getMensajeOp();
};*/
//Funciono!

//Ver todas las empresas
/*$arrayEmpresas = Empresa::listar();
print_r($arrayEmpresas);
echo $mensaje = Empresa::getMensajeFallo();*/

//Inicio del menu general
function opcionesMenu()
{
    //Menu inicial
    echo "Menu general.\n 1. Menu pasajero\n 2. Menu responsable\n 3. Menu viaje\n 4. Menu empresa.\n 5. Salir\n";
}

//Menu pasajero
function opcionesPasajero()
{
    //Menu pasajero
    $quedarse = true;
    while ($quedarse) {
        echo "Menu pasajero.\n 1. Ver pasajeros.\n 2. Buscar pasajero.\n 3. Modificar pasajero.\n 4. Eliminar pasajero.\n 5. Cargar pasajero.\n 6. Salir\n";
        $selected = intval(trim(fgets(STDIN)));
        switch ($selected) {
            case '1':
                //ver pasajeros
                $arrayPasajeros = Pasajero::listar();
                if(count($arrayPasajeros) == 0){
                    echo "No hay pasajeros.\n";
                }else{
                    //print_r($arrayPasajeros);
                    $lista = "";
                    foreach ($arrayPasajeros as $key => $pasajero) {
                        $strPasajero = $pasajero->__toString();
                        $lista .= $strPasajero;   
                    }
                    echo $lista;
                }
                break;

            case '2':
                //buscar pasajero 
                echo "Ingrese el documento de un pasajero: \n";
                $dni = intval(trim(fgets(STDIN)));
                $objPasajero = new Pasajero();
                if ($objPasajero->buscar($dni)) {
                    echo $objPasajero->__toString();
                } else {
                    echo "No se encontró el pasajero.\n";
                }
                break;

            case '3':
                //Modificar pasajero 
                echo "Ingrese el documento de un pasajero: \n";
                $dni = intval(trim(fgets(STDIN)));
                $objPasajero = new Pasajero();
                if ($objPasajero->buscar($dni)) {
                    echo $objPasajero->__toString();
                    echo "Ingrese el nombre: \n";
                    $nombrePas = trim(fgets(STDIN));
                    if ($nombrePas != '') {
                        $objPasajero->setPnombre($nombrePas);
                    }
                    echo "Ingrese el apellido: \n";
                    $apellidoPas = trim(fgets(STDIN));
                    if ($apellidoPas != '') {
                        $objPasajero->setPapellido($apellidoPas);
                    }
                    echo "Ingrese el telefono: \n";
                    $telefonoPas = intval(trim(fgets(STDIN)));
                    if ($telefonoPas != '') {
                        $objPasajero->setPtelefono($telefonoPas);
                    }
                    $quedar = true;
                    while ($quedar) {
                        echo "Ingrese el id de un viaje existente: \n";
                        $idViaje = intval(trim(fgets(STDIN)));
                        $objViaje = new Viaje();
                        if (!$objViaje->buscar($idViaje)) {
                            echo "No existe dicho viaje.\n";
                        } else {
                            $quedar = false;
                        }
                    }
                    if ($objPasajero->modificar()) {
                        echo "Los datos se han modificado.\n";
                    } else {
                        echo "No se ha podido modificar.\n";
                    }
                } else {
                    echo "No se encontró el pasajero.\n";
                }
                break;

            case '4':
                //eliminar pasajero 
                echo "Ingrese el documento de un pasajero: \n";
                $dni = intval(trim(fgets(STDIN)));
                $objPasajero = new Pasajero();
                if ($objPasajero->buscar($dni)) {
                    if ($objPasajero->eliminar()) {
                        echo "El pasajero ha sido eliminado.\n";
                    } else {
                        echo "El pasajero no se ha podido eliminar.\n";
                    }
                } else {
                    echo "No se encontró el pasajero.\n";
                }
                break;

            case '5':
                //cargar un pasajero
                echo "Ingrese el dni: \n";
                $dni = intval(trim(fgets(STDIN)));
                $objPasajero = new Pasajero();
                if ($objPasajero->buscar($dni)) {
                    echo "Ese pasajero ya existe.\n";
                } else {
                    $objPasajero->setRdocumento($dni);
                    echo "Ingrese el nombre: \n";
                    $nombrePas = trim(fgets(STDIN));
                    $objPasajero->setPnombre($nombrePas);
                    echo "Ingrese el apellido: \n";
                    $apellidoPas = trim(fgets(STDIN));
                    $objPasajero->setPapellido($apellidoPas);
                    echo "Ingrese el telefono: \n";
                    $telefonoPas = intval(trim(fgets(STDIN)));
                    $objPasajero->setPtelefono($telefonoPas);
                    $quedar = true;
                    while($quedar){
                        echo "Ingrese el número de viaje existente: \n";
                        $idViaje = intval(trim(fgets(STDIN)));
                        $objViaje = new Viaje();
                        if($objViaje->buscar($idViaje)){
                            $objPasajero->setObjViaje($objViaje);
                            $quedar = false;
                        }else{
                            echo "Dicho viaje no existe.\n";
                        }
                    }
                    if ($objPasajero->insertar()) {
                        echo "Se ha ingresado al pasajero.\n";
                    } else {
                        echo "No se ha podido ingresar al pasajero.\n";
                        echo $objPasajero->getMensajeOp();
                    }
                    
                }
                break;

            case '6':
                $quedarse = false;
                break;

            default:
                break;
        }
    }
}

//Menu responsable
function opcionesResponsable()
{
    //Menu responsable 

    $quedarse = true;
    while ($quedarse) {
        echo "Menu responsable.\n 1. Ver responsables.\n 2. Buscar responsable.\n 3. Modificar responsable.\n 4. Eliminar responsable.\n 5. Crear responsable\n 6. Salir\n";
        $selected = intval(trim(fgets(STDIN)));
        switch ($selected) {
            case '1':
                //ver responsables
                $arregloResponsables = ResponsableV::listar();
                if (count($arregloResponsables) == 0) {
                    echo "No hay responsables.\n";
                } else {
                    //print_r($arregloResponsables);
                    $lista = "";
                    foreach ($arregloResponsables as $key => $responsable) {
                        $strResponsable = $responsable->__toString();
                        $lista.= $strResponsable;
                    }
                    echo $lista;
                }
                break;

            case '2':
                //buscar responsable
                echo "Ingrese el número de empleado: \n";
                $rnumero = intval(trim(fgets(STDIN)));
                $objResponsable = new ResponsableV();
                if ($objResponsable->buscar($rnumero)) {
                    echo $objResponsable->__toString();
                } else {
                    echo "No se ha encontrado al responsable.\n";
                }
                break;

            case '3':
                //modificar responsable
                echo "Ingrese el número de empleado: \n";
                $rnumero = intval(trim(fgets(STDIN)));
                $objResponsable = new ResponsableV();
                if ($objResponsable->buscar($rnumero)) {
                    echo $objResponsable->__toString();
                    echo "Ingrese el número de licencia: \n";
                    $rnumlicencia = intval(trim(fgets(STDIN)));
                    if ($rnumlicencia != '') {
                        $objResponsable->setNumLicencia($rnumlicencia);
                    }
                    echo "Ingrese el nombre: \n";
                    $rnombre = trim(fgets(STDIN));
                    if ($rnombre != '') {
                        $objResponsable->setNombre($rnombre);
                    }
                    echo "Ingrese el apellido: \n";
                    $rapellido = trim(fgets(STDIN));
                    if ($rapellido != '') {
                        $objResponsable->setApellido($rapellido);
                    }
                    if ($objResponsable->modificar()) {
                        echo "Se han modificado los datos.\n";
                    } else {
                        echo "No se han podido modificar los datos.\n";
                    }
                } else {
                    echo "No se ha encontrado al responsable.\n";
                }
                break;

            case '4':
                //eliminar responsable
                echo "Ingrese el número de empleado: \n";
                $rnumero = intval(trim(fgets(STDIN)));
                $objResponsable = new ResponsableV();
                if ($objResponsable->buscar($rnumero)) {
                    if ($objResponsable->eliminar()) {
                        echo "Se ha eliminado al responsable.\n";
                    } else {
                        echo "No se ha podido eliminar.\n";
                        echo $objResponsable->getMensajeOp();
                    }
                } else {
                    echo "No se ha encontrado al responsable.\n";
                }
                break;

            case '5':
                //crear responsable 
                echo "Ingrese el número de empleado: \n";
                $rnumero = intval(trim(fgets(STDIN)));
                $objResponsable = new ResponsableV();
                if ($objResponsable->buscar($rnumero)) {
                    echo "Ese numero de empleado ya existe.\n";
                } else {
                    $objResponsable->setNumEmpleado($rnumero);
                    echo "Ingrese el número de licencia: \n";
                    $rnumlicencia = intval(trim(fgets(STDIN)));
                    $objResponsable->setNumLicencia($rnumlicencia);
                    echo "Ingrese el nombre: \n";
                    $rnombre = trim(fgets(STDIN));
                    $objResponsable->setNombre($rnombre);
                    echo "Ingrese el apellido: \n";
                    $rapellido = trim(fgets(STDIN));
                    $objResponsable->setApellido($rapellido);
                    if ($objResponsable->insertar()) {
                        echo "El responsable ha sido cargado.\n";
                    } else {
                        echo "El responsable no ha sido cargado1.\n";
                        echo $objResponsable->getMensajeOp();
                    }
                }
                break;

            case '6':
                $quedarse = false;
                break;

            default:
                # code...
                break;
        }
    }
}

//Menu viaje
function opcionesViaje()
{

    $quedarseViaje = true;
    while ($quedarseViaje) {
        echo "Menu viaje.\n 1. Ver viajes.\n 2. Buscar viaje.\n 3. Modificar viaje.\n 4. Eliminar viaje.\n 5. Crear viaje\n 6. Salir\n";
        $selected = intval(trim(fgets(STDIN)));
        switch ($selected) {
            case '1':
                //ver viajes
                $arrayViajes = Viaje::listar();
                if (count($arrayViajes) == 0) {
                    echo "No hay viajes.\n";
                } else {
                    //print_r($arrayViajes);
                    $lista = "";
                    foreach ($arrayViajes as $key => $viaje) {
                        $strViaje = $viaje->__toString();
                        $lista .= $strViaje;
                    }
                    echo $lista;
                }
                break;

            case '2':
                //buscar viaje
                echo "Ingrese el número de viaje: \n";
                $idViaje = intval(trim(fgets(STDIN)));
                $objViaje = new Viaje();
                if($objViaje->buscar($idViaje)) {
                    echo $objViaje->__toString();
                } else {
                    echo "No se encontró dicho viaje.\n";
                }
                break;

            case '3':
                //modificar viaje
                echo "Ingrese el número de viaje: \n";
                $idViaje = intval(trim(fgets(STDIN)));
                $objViaje = new Viaje();
                if ($objViaje->buscar($idViaje)) {
                    echo $objViaje->__toString();
                    echo "Ingrese el destino: \n";
                    $vdestino = trim(fgets(STDIN));
                    if($vdestino != ''){
                        $objViaje->setVdestino($vdestino);
                    }
                    echo "Ingrese cantidad maxima de pasajeros: \n";
                    $vcantmaxpasajeros = intval(trim(fgets(STDIN)));
                    if($vcantmaxpasajeros != 0){
                        $objViaje->setCantMaxPasajeros($vcantmaxpasajeros);
                    }
                    $quedar = true;
                    while ($quedar) {
                        echo "Ingrese el id de una empresa existente: \n";
                        $idEmpresa = intval(trim(fgets(STDIN)));
                        $objEmpresa = new Empresa();
                        if (!$objEmpresa->buscar($idEmpresa)) {
                            echo "No existe dicha empresa.\n";
                        } else {
                            $quedar = false;
                        }
                    }
                    $objViaje->setIdempresaObj($objEmpresa);
                    $quedar = true;
                    while ($quedar) {
                        echo "Ingrese el numero de un responsable existente: \n";
                        $rnumeroempleado = intval(trim(fgets(STDIN)));
                        $objResponsable = new ResponsableV();
                        if (!$objResponsable->buscar($rnumeroempleado)) {
                            echo "No existe dicho empleado.\n";
                        } else {
                            $quedar = false;
                        }
                    }
                    $objViaje->setResponsableObj($objResponsable);
                    echo "Ingrese el importe: \n";
                    $vimporte = trim(fgets(STDIN));
                    if($vimporte != 0){
                        $objViaje->setVimporte($vimporte);
                    }
                    echo "Ingrese el tipo de asiento: \n";
                    $tipoasiento = trim(fgets(STDIN));
                    if($tipoasiento != ''){
                        $objViaje->setTipoasiento($tipoasiento);
                    }
                    echo "Es ¿ida o vuelta?.\n";
                    $idaovuelta = trim(fgets(STDIN));
                    if($idaovuelta != ''){
                        $objViaje->setIdayvuelta($idaovuelta);
                    }
                    if($objViaje->modificar()){
                        echo "Se ha modificado correctamente el viaje.\n";
                    }else{
                        echo "Ha fallado la modificacion del viaje.\n";
                        echo $objViaje->getMensajeOp();
                    }
                } else {
                    echo "No se encontró dicho viaje.\n";
                    echo $objViaje->getMensajeOp();
                }
                break;

            case '4':
                //eliminar viaje
                echo "Recuerde que para eliminar un viaje no debe haber pasajeros añadidos en el mismo.\n";
                echo "Ingrese el número de viaje: \n";
                $idViaje = intval(trim(fgets(STDIN)));
                $objViaje = new Viaje();
                if ($objViaje->buscar($idViaje)) {
                    if($objViaje->eliminar()){
                        echo "El viaje se ha eliminado correctamente.\n";
                    }else{
                        echo "El viaje no ha podido eliminarse.\n";
                        echo $objViaje->getMensajeOp();
                    }
                } else {
                    echo "No se encontró dicho viaje.\n";
                }
                break;

            case '5':
                //crear viaje 
                $quedarse = true;
                while ($quedarse) {
                    echo "Ingrese el id del viaje: \n";
                    $idViaje = intval(trim(fgets(STDIN)));
                    $objViaje = new Viaje();
                    if($objViaje->buscar($idViaje)){
                        echo "El id de viaje ya esta utilizado.\n";
                    }else{
                        $objViaje->setIdviaje($idViaje);
                        $quedarse = false;
                    }
                    echo "Ingrese el destino: \n";
                    $vdestino = trim(fgets(STDIN));
                    $objViaje->setVdestino($vdestino);
                    echo "Ingrese la cantidad máxima de pasajeros: \n";
                    $vcantmaxpasajeros = intval(trim(fgets(STDIN)));
                    $objViaje->setCantMaxPasajeros($vcantmaxpasajeros);
                    $quedarse = true;
                    while ($quedarse) {
                        echo "Ingrese el id de una empresa existente: \n";
                        $idEmpresa = intval(trim(fgets(STDIN)));
                        $objEmpresa = new Empresa();
                        if($objEmpresa->buscar($idEmpresa)){
                            $quedarse = false;
                            $objViaje->setIdempresaObj($objEmpresa);
                           
                        }else{
                            echo "Dicho id de empresa no existe.\n";
                        }
                    }
                    $quedarse = true;
                    while ($quedarse) {
                        echo "Ingrese el número de un responsable.\n";
                        $rnumeroempleado = intval(trim(fgets(STDIN)));
                        $objResponsable = new ResponsableV();
                        if(!$objResponsable->buscar($rnumeroempleado)){
                            echo "Dicho responsable no existe.\n";
                        }else{
                            $quedarse = false;
                            $objViaje->setResponsableObj($objResponsable);
                        }
                    }
                    echo "Ingrese el importe: \n";
                    $vimporte = trim(fgets(STDIN));
                    $objViaje->setVimporte($vimporte);
                    echo "Ingrese el tipo de asiento: \n";
                    $tipoasiento = trim(fgets(STDIN));
                    $objViaje->setTipoasiento($tipoasiento);
                    echo "Es ¿ida o vuelta?.\n";
                    $idaovuelta = trim(fgets(STDIN));
                    $objViaje->setIdayvuelta($idaovuelta);
                    echo $objViaje->__toString();
                    if($objViaje->insertar()){
                        echo "El viaje se ha insertado.\n";
                    }else{
                        echo "El viaje no se ha insertado.\n";
                        echo $objViaje->getMensajeOp();
                    };
                };
                break;

            case '6':
                $quedarseViaje = false;
                break;

            default:
                
                break;
        }
    }
}

//Menu empresa
function opciontesEmpresa()
{
    $quedarse = true;
    while ($quedarse) {
        echo "Menu empresa.\n 1. Ver empresas.\n 2. Buscar empresa.\n 3. Modificar empresa.\n 4. Eliminar empresa.\n 5. Cargar empresa.\n 6. Salir\n";
        $selected = intval(trim(fgets(STDIN)));
        switch ($selected) {
            case '1':
                //ver empresas
                $arregloEmpresas = Empresa::listar();
                if (count($arregloEmpresas) == 0) {
                    echo "No hay empresas cargadas.\n";
                } else {
                    //print_r($arregloEmpresas);
                    $lista = "";
                    foreach ($arregloEmpresas as $key => $empresa) {
                        $strEmpresa = $empresa->__toString();
                        $lista .= $strEmpresa;
                    }
                    echo $lista;
                }
                break;

            case '2':
                //buscar empresa
                echo "Ingrese el número de empresa: \n";
                $idempresa = intval(trim(fgets(STDIN)));
                $objEmpresa = new Empresa();
                if ($objEmpresa->buscar($idempresa)) {
                    echo $objEmpresa->__toString();
                } else {
                    echo "No existe la empresa.\n";
                }
                break;

            case '3':
                //modificar empresa
                echo "Ingrese el número de empresa: \n";
                $idempresa = intval(trim(fgets(STDIN)));
                $objEmpresa = new Empresa();
                if ($objEmpresa->buscar($idempresa)) {
                    echo $objEmpresa->__toString();
                    echo "Ingrese el nombre: \n";
                    $enombre = trim(fgets(STDIN));
                    echo "Ingrese la dirección: \n";
                    $edireccion = trim(fgets(STDIN));
                    if ($objEmpresa->cargarDatos($idempresa, $enombre, $edireccion)) {
                        if ($objEmpresa->insertar()) {
                            echo "Se ha modificado la empresa.\n";
                        } else {
                            echo "No se ha modificado la empresa.\n";
                            echo $objEmpresa->getMensajeOp();
                        }
                    } else {
                        echo "No se han ingresado los datos.\n";
                        echo $objEmpresa->getMensajeOp();
                    }
                } else {
                    echo "No existe la empresa.\n";
                }
                break;

            case '4':
                //eliminar empresa
                echo "Ingrese el número de empresa: \n";
                $idempresa = intval(trim(fgets(STDIN)));
                $objEmpresa = new Empresa();
                if ($objEmpresa->buscar($idempresa)) {
                    if($objEmpresa->eliminar()){
                        echo "La empresa se ha eliminado.\n";
                    }else{
                        echo "La empresa no se ha podido eliminar.\n";
                        echo $objEmpresa->getMensajeOp();
                    }
                } else {
                    echo "No existe la empresa.\n";
                }
                break;

            case '5':
                //cargar empresa
                $quedar = true;
                while ($quedar) {
                    echo "Ingrese el id de la empresa: \n";
                    $idEmpresa = intval(trim(fgets(STDIN)));
                    $objEmpresa = new Empresa();
                    if($objEmpresa->buscar($idEmpresa)){
                        echo "El id ya esta utilizado.\n";
                    }else{
                        $quedar = false;
                        $objEmpresa->setIdempresa($idEmpresa);
                    }
                }
                echo "Ingrese el nombre de la empresa: \n";
                $enombre = trim(fgets(STDIN));
                $objEmpresa->setNombre($enombre);
                echo "Ingrese la dirección de la empresa: \n";
                $edireccion = trim(fgets(STDIN));
                $objEmpresa->setEdireccion($edireccion);
                if($objEmpresa->insertar()){
                    echo "La empresa se ha insertado.\n";
                }else{
                    echo "La empresa no se ha podido insertar.\n";
                    echo $objEmpresa->getMensajeOp();
                }
                
                break;

            case '6':
                $quedarse = false;
                break;

            default:
                # code...
                break;
        }
    }
}

$salidaGeneral = true;
while ($salidaGeneral) {
    opcionesMenu();
    $selected = intval(trim(fgets(STDIN)));
    switch ($selected) {
        case '1':
            //pasajero
            opcionesPasajero();
            break;

        case '2':
            //responsable 
            opcionesResponsable();
            break;

        case '3':
            //viaje
            opcionesViaje();
            break;

        case '4':
            //empresa 
            opciontesEmpresa();
            break;

        case '5':
            $salidaGeneral = false;
            break;

        default:
            break;
    }
}
