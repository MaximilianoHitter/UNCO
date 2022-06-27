<?php
/*
Comentario: Tuve que optar por hacer que los campos de clave primaria de las tablas de Empresa, Responsable y Viaje no sean AUTO_INCREMENT porque en algunos métodos no podía obtener el id y no me permitia llamar al metodo modificar.
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
$base = new BaseDatos();
if($base->Iniciar()){
    if($base->Ejecutar("DELETE FROM viaje")){
        echo "Se borró contenido de viaje.\n";
    }else{
        echo "No se borró contenido de viaje.\n";
    }
    if($base->Ejecutar("DELETE FROM empresa")){
        echo "Se borro contenido de empresa.\n";
    }else{
        echo "No se borró contenido empresa.\n";
    }
    if($base->Ejecutar("DELETE FROM responsable")){
        echo "Se borró contenido responsable.\n";
    }else{
        echo "No se borró contenido responsable.\n";
    }
}else{
    echo "No se pudo borrar ningún dato anterior.\n";
}

//Creacion e insert de una empresa
$objEmpresa1 = new Empresa();
$objEmpresa1->cargarDatos(1, 'PepitosCompany', 'Calle falsa 123');
if($objEmpresa1->insertar()){
    echo "Se inserto la empresa.\n";
}else{
    echo "No se insertó la empresa.\n";
    echo $objEmpresa1->getMensajeOp();
};
//Funciono!

//Modificacion de empresa
$objEmpresa1->cargarDatos(1, '404Company', 'En la UNCO');
if($objEmpresa1->modificar()){
    echo "Se modificó la empresa.\n";
}else{
    echo "No se modificó la empresa.\n";
    echo $objEmpresa1->getMensajeOp();
}
//Funciono!

//Eliminar la empresa
if($objEmpresa1->eliminar()){
    echo "Se borró la empresa.\n";
}else{
    echo "No se borró la empresa.\n";
    echo $objEmpresa1->getMensajeOp();
}
//Funciono!

//Crear nueva empresa
$objEmpresa2 = new Empresa();
$objEmpresa2->cargarDatos(2, 'JuanitosAndPalmitos', 'Calle Cuadrada 360');
if($objEmpresa2->insertar()){
    echo "Se inserto la empresa.\n";
}else{
    echo "No se insertó la empresa.\n";
    echo $objEmpresa2->getMensajeOp();
};
//Funciono!

//Crear otra empresa
$objEmpresa3 = new Empresa();
$objEmpresa3->cargarDatos(3, 'ASD', 'ASD');
if($objEmpresa3->insertar()){
    echo "Se inserto la empresa.\n";
}else{
    echo "No se insertó la empresa.\n";
    echo $objEmpresa3->getMensajeOp();
};
//Funciono!

//Crear responsable
$objResponsable1 = new ResponsableV();
$objResponsable1->cargarDatos(1, 12345, 'Aquiles', 'Bailo');
if($objResponsable1->insertar()){
    echo "Se inserto el responsable.\n";
}else{
    echo $objResponsable1->getMensajeOp();
};
//Funciono!

//Se inserta viaje
$objViaje1 = new Viaje();
$objViaje1->cargarDatos(1, 'Barilo', 50, $objEmpresa2, $objResponsable1, 1500, 'Cama', 'Solo ida');
/*echo $objViaje1->__toString();
die();*/
if($objViaje1->insertar()){
    echo "Se inserto el viaje.\n";
}else{
    echo $objViaje1->getMensajeOp();
};
//Funciono!

//Modificar los datos de viaje
//Tener en cuenta que solo se pueden usar como datos de empresa el $objEmpresa2 y como responsable $objResponsable1
$objViaje1->cargarDatos(1, 'PachaMama', 40, $objEmpresa2, $objResponsable1, 1200, 'Semi-cama', 'Solo vuelta');
if($objViaje1->modificar()){
    echo "Se modificó el viaje.\n";
}else{
    echo "No se modificó el viaje.\n";
    echo $objViaje1->getMensajeOp();
};
//Funciono!

//Eliminar los datos del viaje
if($objViaje1->eliminar()){
    echo "Se eliminó el viaje.\n";
}else{
    echo "No se eliminó el viaje.\n";
    echo $objViaje1->getMensajeOp();
};
//Funciono!

//Ver todas las empresas
$arrayEmpresas = Empresa::listar();
print_r($arrayEmpresas);
echo $mensaje = Empresa::getMensajeFallo();



