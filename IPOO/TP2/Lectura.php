<?php
class Lectura{
    //Atributos
    private $objLibroLeyendo;
    private $paginaRegistro;
    static $coleccionLecturas = [];

    //Constructo
    public function __construct($objLibroEnLectura, $paginasLeidas){
        if(!in_array($objLibroEnLectura, Lectura::$coleccionLecturas)){
            $this->objLibroLeyendo = $objLibroEnLectura;
            $this->paginaRegistro = $paginasLeidas;
            array_push(Lectura::$coleccionLecturas, $objLibroEnLectura);
        }
        
    }

    //Metodos
    //getter y setter
    public function getObjLibroLeyendo(){
        return $this->objLibroLeyendo->__toString();
    }

    public function setObjLibroLeyendo($objLibroLeyendo){
        $this->objLibroLeyendo = $objLibroLeyendo;
        $this->paginaRegistro = 1;
    }

    public function getPaginaRegistro(){
        return $this->paginaRegistro;
    }

    public function setPaginaRegistro($paginaRegistro){
        $this->paginaRegistro = $paginaRegistro;
    }

    /**Metodo para pasar a la siguiente página
     * @param void
     * @return void
     */
    public function siguientePagina(){
        $paginaActualIncrementada = $this->getPaginaRegistro() + 1;
        $cantidadPaginas = $this->objLibroLeyendo->getCantPaginas();
        if($paginaActualIncrementada > $cantidadPaginas){
            $this->setPaginaRegistro(0);
        }else{
            $this->setPaginaRegistro($paginaActualIncrementada);
        };
    }

    /**Metodo para retroceder una pagina
     * @param void
     * @return void
     */
    public function retrocederPagina(){
        $paginaActualDecrementada = $this->getPaginaRegistro() - 1;
        if($paginaActualDecrementada <= 0){
            $this->setPaginaRegistro(0);
        }else{
            $this->setPaginaRegistro($paginaActualDecrementada);
        };
    }

    /**Metodo para ir a una pagina
     * @param int $paginaBuscada
     * @return string
     */
    public function irPagina($paginaBuscada){
        $str = 'La página ha sido actualizada.';
        $cantidadPaginas = $this->objLibroLeyendo->getCantPaginas();
        if($paginaBuscada <= $cantidadPaginas && $paginaBuscada > 0){
            $this->setPaginaRegistro($paginaBuscada);
        }else{
            $str = 'La página no se ha podido actualizar.';
        };
        return $str;
    }

    //Metodo toString
    public function __toString(){
        $toString = "
        Información del libro: \n
        {$this->getObjLibroLeyendo()}\n
        Página actual: {$this->getPaginaRegistro()}";
        return $toString;
    }

    //getter de coleccion
    public function getColeccion(){
        return Lectura::$coleccionLecturas;
    }

    /*voy a realizar 3 metodos setter diferentes
    El primero setColeccionAgregar servirá para meter un libro a la coleccion,
    El segundo setColeccionBorrar servirá para que se borre toda la coleccion,
    El tercero setColeccionBorrarLibro servirá para buscar y borrar un libro de la coleccion*/
    public function setColeccionAgregar($objLibroAgregar){
        array_push(Lectura::$coleccionLecturas, $objLibroAgregar);
    }

    public function setColeccionBorrar(){
        Lectura::$coleccionLecturas = [];
    }

    public function setColeccionBorrarLibro($objLibroABorrar){
        $key = array_search($objLibroABorrar, Lectura::$coleccionLecturas);
        unset(Lectura::$coleccionLecturas[$key]);
    }

    /**Metodo para saber si un libro parámetro ya esta en la coleccion
     * @param obj $objLibro
     * @return boolean
     */
    public function libroLeido($objLibro){
        $boolean = false;
        if(in_array($objLibro, $this->getColeccion())){
            $boolean = true;
        };
        return $boolean;
    }

    /**Metodo paar retornar la sinopsis de un libro recibiend el titulo por parámetro
     * @param string $titulo
     * @return string
     */
    public function darSinopsis($titulo){
        $sinopsis = '';
        foreach ($this->getColeccion() as $key => $value) {
            if($value->getTitulo() == $titulo){
                $sinopsis = $value->getSinopsis();
            };
        };
        return $sinopsis;
    }

    /**Metodo para retornar todos los libros que fueron leidos y su año de edición es pasado por parametro
     * @param int &anioEdicion
     * @return array
     */
    public function leidosAnioEdicion($anioEdicion){
        $arrayLibrosLeidosEnAnio = array_filter($this->getColeccion(), function($libro) use ($anioEdicion){ return $libro->getAnioEdicion() == $anioEdicion;});
        return $arrayLibrosLeidosEnAnio;
    }

    /**Metodo para retornar todos los libros leidos por el nombre de autor
     * @param string $nombreAutor
     * @return array
     */
    public function darLibrosPorAutor($nombreAutor){
        $arrayLibrosLeidosPorAutor = array_filter($this->getColeccion(), function($libro) use ($nombreAutor){ return $libro->getNombreAutor() == $nombreAutor;});
        return $arrayLibrosLeidosPorAutor;
    }

}