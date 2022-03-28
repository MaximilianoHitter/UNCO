<?php
require_once('Libro.php');
require_once('Persona.php');
$arrayLibros = [];
$objLibro = new Libro(123, 'Los acantilados', 2020, 'Cambalache', 'Pepe', 'Juarez', 'DNI', 36925847, 1200, 'Un libro muy bonito');
$libro1 = $objLibro;
array_push($arrayLibros, $objLibro);
$objLibro = new Libro(124, 'Los palmeras', 2019, 'CumbiaATR', 'Cacho', 'Pestaña', 'LC', 123345678, 500, 'Un libro muy cortito');
$libro2 = $objLibro;
array_push($arrayLibros, $objLibro);
$objLibro = new Libro(125, 'Pepe y las pepas', 2015, 'Arcor', 'Julio', 'Pepon', 'DNI', 25456789, 2000, 'Un libro re largo');
$libro3 = $objLibro;
array_push($arrayLibros, $objLibro);
//print_r($arrayLibros);

if(iguales($objLibro, $arrayLibros)){
    echo "El libro ya esta cargado.\n";
}else{
    echo "El libro no esta cargado.\n";
}

$array = librosdeEditoriales($arrayLibros, 'Cambalache');
print_r($array);


//getter y setter de isbn
$ISBN = $objLibro->getISBN();
echo "El ISBN es: $ISBN.\n";
$objLibro->setISBN(10005423);

//getter y setter de titulo
$titulo = $objLibro->getTitulo();
echo "El título es: $titulo.\n";
$objLibro->setTitulo('Pepe y los pepazos en pepelandia');

//getter y setter del año de edicion
$anioEdicion = $objLibro->getAnioEdicion();
echo "El año de edición fue: $anioEdicion.\n";
$objLibro->setAnioEdicion(2000);

//getter y setter de editorial
$editorial = $objLibro->getEditorial();
echo "La editorial es: $editorial.\n";
$objLibro->setEditorial('Pepito');

//getter y setter de nombre y apellidod el autor
$autorNombre = $objLibro->getNombreAutor();
$autorApellido = $objLibro->getApellidoAutor();
$nombreCompleto = $autorNombre . ' ' . $autorApellido;
echo "El autor es $nombreCompleto.\n";

//getter y setter de cantidad de paginas
$cantidadPaginas = $objLibro->getCantPaginas();
echo "El libro posee $cantidadPaginas páginas";
$objLibro->setCantPaginas(1200);

//getter y setter de sinopsis
$descripcion = $objLibro->getSinopsis();
echo $descripcion;
$objLibro->setSinopsis('Ahora se trata de...');

//toString
echo $objLibro->__toString();

$editorialConsulta = 'Arcor';
if($objLibro->perteneceEditorial($editorialConsulta)){
    echo "El libro pertenece a la editorial $editorialConsulta.\n";
}else{
    echo "El libro no pertenece a la editorial $editorialConsulta.\n";
};

$nombreLibro = $objLibro->getTitulo();
$aniosDePublicado = $objLibro->aniosdesdeEdicion();
echo "El libro $nombreLibro fue publicado hace $aniosDePublicado años.\n";

$comprobado = $objLibro->esIgual($libro1);
if($comprobado){
    echo "Ambos libros poseen igual ISBN.\n";
}else{
    echo "Son dos libros diferentes.\n";
}

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
        $editorialLibro = $value->getEditorial();
        if($editorialLibro == $editorial){//falta saber como acceder al metodo getEditorial de libro
            array_push($arrayEditorial, $libro);
        };
    };
    return $arrayEditorial;
}


