<?php
class Libro{
    //Atributos
    private $ISBN;
    private $titulo;
    private $anioEdicion;
    private $editorial;
    private $objAutor;
    private $cantPaginas;
    private $sinopsis;

    //Constructor
    public function __construct($isbn, $tituloLibro, $anioEd, $editorialLibro, $autorNombre, $autorApellido, $tipoDocumento, $numDocumento, $paginas, $descripcion){
        $this->ISBN = $isbn;
        $this->titulo = $tituloLibro;
        $this->anioEdicion = $anioEd;
        $this->editorial = $editorialLibro;
        $this->objAutor = new Persona($autorNombre, $autorApellido, $tipoDocumento, $numDocumento);
        $this->cantPaginas = $paginas;
        $this->sinopsis = $descripcion;
    }

    //Metodos
    //getter y setter 
    public function getISBN(){
        return $this->ISBN;
    }

    public function setISBN($ISBN){
        $this->ISBN = $ISBN;
    }

    public function getTitulo(){
        return $this->titulo;
    }

    public function setTitulo($titulo){
        $this->titulo = $titulo;
    }

    public function getAnioEdicion(){
        return $this->anioEdicion;
    }

    public function setAnioEdicion($anioEdicion){
        $this->anioEdicion = $anioEdicion;
    }

    public function getEditorial(){
        return $this->editorial;
    }

    public function setEditorial($editorial){
        $this->editorial = $editorial;
    }

    public function getNombreAutor(){
        $objAutor = $this->objAutor;
        return $objAutor->getNombreStr();
    }

    public function setNombreAutor($nombreAutor){
        $objAutor = $this->objAutor;
        $objAutor->setNombreStr($nombreAutor);
    }

    public function getApellidoAutor(){
        $objAutor = $this->objAutor;
        return $objAutor->getApellidoStr();
    }

    public function setApellidoAutor($apellidoAutor){
        $objAutor = $this->objAutor;
        $objAutor->setApellidoStr($apellidoAutor);
    }

    public function getCantPaginas(){
        return $this->cantPaginas;
    }

    public function setCantPaginas($cantPaginas){
        $this->cantPaginas = $cantPaginas;
    }

    public function getSinopsis(){
        return $this->sinopsis;
    }

    public function setSinopsis($sinopsis){
        $this->sinopsis = $sinopsis;
    }

    //Metodo toString
    public function __toString(){
        $str = "ISBN: {$this->getISBN()}.\n
                Título: {$this->getTitulo()}.\n
                Año de edición: {$this->getAnioEdicion()}.\n
                Editorial: {$this->getEditorial()}.\n
                Nombre del autor: {$this->objAutor->getNombreStr()} {$this->objAutor->getApellidoStr()}.\n
                Cantidad de páginas: {$this->getCantPaginas()}.\n
                Sinopsis: {$this->getSinopsis()}.\n";
        return $str;
    }

    /**Metodo para saber si el libro pertener a una editorial parametro
     * @param string $peditorial
     * @return boolean
     */
    public function perteneceEditorial($peditorial){
        $perteneceEditorial = false;
        if($this->editorial == $peditorial){
            $perteneceEditorial = true;
        };
        return $perteneceEditorial;
    }

    /**Metodo para retornar la cantidad de años que pasaron desde la publicacion
     * @param void
     * @return int
     */
    public function aniosdesdeEdicion(){
        $year = date('Y');
        $aniosPublicado = $year - $this->anioEdicion;
        return $aniosPublicado;
    }
    
    /**Metodo para saber si el libro por parametro tiene mismo ISBN que el objeto
     * @param obj $libro
     * @return boolean
     */
    public function esIgual($libro){
        $ISBNaComprobar = $libro->getISBN();
        $comprobacion = false;
        if($ISBNaComprobar == $this->getISBN()){
            $comprobacion = true;
        };
        return $comprobacion;
    }

    
}