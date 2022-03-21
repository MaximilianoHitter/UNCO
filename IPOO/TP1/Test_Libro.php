<?php
require_once('Libro.php');
$arrayLibros = [];
$objLibro = new Libro(123, 'Los acantilados', 2020, 'Cambalache', 'Pepe', 'Juarez');
array_push($arrayLibros, $objLibro);
$objLibro = new Libro(124, 'Los palmeras', 2019, 'CumbiaATR', 'Cacho', 'Pestaña');
array_push($arrayLibros, $objLibro);
$objLibro = new Libro(125, 'Pepe y las pepas', 2015, 'Arcor', 'Julio', 'Pepon');
array_push($arrayLibros, $objLibro);
//print_r($arrayLibros);

if(iguales($objLibro, $arrayLibros)){
    echo "El libro ya esta cargado.\n";
}else{
    echo "El libro no esta cargado.\n";
}

$array = librosdeEditoriales($arrayLibros, 'Cambalache');
print_r($array);


/**Funcion para ver si un libro esta en el array 
 * @param obj $libro
 * @param array $libreria
 * @return boolean
*/
function iguales($libro, $libreria){
    $esta = false;
    if(in_array($libro, $libreria)){
        $esta = true;
    };
    return $esta;
}

/**Funcion para saber todos los libros publicados por una editorial
 * @param array $libreria
 * @param string $editorial
 * @return array
 */
function librosdeEditoriales($libreria, $editorial){
    $arrayEditorial = [];
    foreach ($libreria as $key => $value) {
        $libro = $value;
        if($libro->getEditorial == $editorial){//falta saber como acceder al metodo getEditorial de libro
            array_push($arrayEditorial, $libro);
        };
    };
    return $arrayEditorial;
}
