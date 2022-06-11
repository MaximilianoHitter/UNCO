<?php
include_once '../datos/Persona.php';
//echo 'Versión actual de PHP: ' . phpversion();
    

	// creo un obj Persona
	$obj_Persona =  new Persona();
	
	//Busco todas las personas almacenadas en la BD
	$colPersonas =$obj_Persona->listar();
	foreach ($colPersonas as $unaPersona){
	
		echo $unaPersona;
		echo "-------------------------------------------------------";
	}
	
	$obj_Persona->cargar(27091730, "Pepe", "Suarez", "pepe@mail.com");
	$respuesta=$obj_Persona->insertar();
	// Inserto el OBj Persona en la base de datos
	if ($respuesta==true) {
			echo "\nOP INSERCION;  La persona fue ingresada en la BD";
			$colPersonas =$obj_Persona->listar("");
			foreach ($colPersonas as $unaPersona){
		
				echo $unaPersona;
				echo "-------------------------------------------------------";
			}
	}else 
		echo $obj_Persona->getmensajeoperacion();
	
	
	// modifico la perosna
	$obj_Persona->setNombre("Nombre Modificado");
	$respuesta = $obj_Persona->modificar();
	if ($respuesta==true) {
			//Busco todas las personas almacenadas en la BD y veo la modificacion realizada
			$colPersonas =$obj_Persona->listar();
	
			echo " \nOP MODIFICACION: Los datos fueron actualizados correctamente";
			foreach ($colPersonas as $unaPersona){
				echo $unaPersona;
				echo "-------------------------------------------------------";
		}	
	}else
			echo $obj_Persona->getmensajeoperacion();
	
	// elimino la persona
	$respuesta =$obj_Persona->eliminar();
	if ($respuesta==true) {
		//Busco todas las personas almacenadas en la BD y veo la modificacion realizada
		echo " \nOP ELIMINACION tos fueron eliminados correctamente";
		$colPersonas =$obj_Persona->listar();
	
		foreach ($colPersonas as $unaPersona){
	
			echo $unaPersona;
			echo "-------------------------------------------------------";
		}
	}else
		echo $obj_Persona->getmensajeoperacion();

?>