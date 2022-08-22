<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/bootstrap-5.1.3-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="styles/css/styles.css" />
    <script src="styles/bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
    <title>Formulario de peliculas</title>
</head>

<body>
    <div class="col-mb-12 contenedor">
        <form class="" action="../Controlador/mostrarpelicula.php" method="POST" onsubmit="return validar();" novalidate>
            <fieldset class="titulo">
                <legend>
                    Cinem@ Cuevana
                </legend>
            </fieldset>
            <div class="alert alert-warning error" id="error" role="alert">
                Todos los campos son obligatorios
            </div>
            <div class="contenido">
                <fieldset class="grid1">
                    <div class="col-md-2 p1">
                        <label for="titulo" class="form-label">Título</label>
                        <input type="text" class="form-control input" id="titulo" placeholder="Título" onchange="return validarTitulo();" name="titulo" required>
                        <div class="invalid-feedback">

                        </div>
                    </div>
                    <div class="col-md-2 p2">
                        <label for="actores" class="form-label">Actores</label>
                        <input type="text" class="form-control input" id="actores" placeholder="Actores" onchange="return validarActores();" name="actores" required>
                        <div class="invalid-feedback">

                        </div>
                    </div>
                </fieldset>
                <fieldset class="grid1">
                    <div class="col-md-4 p1">
                        <label for="director" class="form-label">Director</label>
                        <input type="text" class="form-control input" id="director" placeholder="Director" onchange="return validarDirector();" name="director" required>
                        <div class="invalid-feedback">

                        </div>
                    </div>
                    <div class="col-md-4 p2">
                        <label for="guion" class="form-label">Guión</label>
                        <input type="text" class="form-control input" id="guion" placeholder="Guión" onchange="return validarGuion();" name="guion" required>
                        <div class="invalid-feedback">

                        </div>
                    </div>
                </fieldset>
                <fieldset class="grid1">
                    <div class="col-md-4 p1">
                        <label for="produccion" class="form-label">Producción</label>
                        <input type="text" class="form-control input" id="produccion" placeholder="Producción" onchange="return validarProduccion();" name="produccion" required>
                        <div class="invalid-feedback">

                        </div>
                    </div>
                    <div class="col-md-4 p2">
                        <label for="anio" class="form-label">Año</label>
                        <input type="number" class="form-control input" id="anio" name="anio" onchange="return validarAnio()" required>
                        <div class="invalid-feedback " id="anioV">
                            El año deben ser 4 números
                        </div>
                    </div>
                </fieldset>
                <fieldset class="grid1">
                    <div class="col-md-4 p1">
                        <label for="nacionalidad" class="form-label">Nacionalidad</label>
                        <input type="text" class="form-control input" id="nacionalidad" placeholder="Nacionalidad" onchange="return validarNacionalidad();" name="nacionalidad" required>
                        <div class="invalid-feedback">

                        </div>
                    </div>
                    <div class="col-md-4 p2">
                        <label for="genero" class="form-label">Género</label>
                        <select class="form-select input" id="genero" name="genero"  required>
                            <option value="comedia">Comedia</option>
                            <option value="drama">Drama</option>
                            <option value="terror">Terror</option>
                            <option value="romance">Romance</option>
                            <option value="suspenso">Suspenso</option>
                            <option value="otro" selected>Otro</option>
                        </select>
                        <div class="invalid-feedback">
                            Debe seleccionar al menos uno
                        </div>
                    </div>
                </fieldset>


                <fieldset class="grid2">
                    <div class="col-md-4 p1">
                        <label for="duracion" class="form-label">Duración</label>
                        <input type="number" class="form-control input" id="duracion" onchange="return validarDuracion();" name="duracion" required>
                        <div class="invalid-feedback " id="duracionV">
                            Deben ser 3 números
                        </div>
                        <label class="form-label">(minutos)</label>
                    </div>
                    <div class="col-md-4 p2">
                        <label for="form-check">Público</label>
                        <section>
                            <div class="form-check check1">
                                <input class="form-check-input" type="radio" name="publico" value="todo publico" id="publico" checked>
                                <label class="form-check-label" for="publico">
                                    Todo público
                                </label>
                            </div>
                            <div class="form-check check2">
                                <input class="form-check-input" type="radio" name="publico" value="mayores de 7 años" id="publico">
                                <label class="form-check-label" for="publico">
                                    Mayores de 7 años
                                </label>
                            </div>
                            <div class="form-check check3">
                                <input class="form-check-input" type="radio" name="publico" value="mayores de 18 años" id="publico">
                                <label class="form-check-label" for="publico">
                                    Mayores de 18 años
                                </label>
                            </div>
                        </section>

                    </div>
                </fieldset>



                <fieldset>
                    <div class="col-md-12">
                        <label for="titulo" class="form-label">Sinopsis</label>
                        <input type="textarea" class="form-control textarea input" id="sinopsis" name="sinopsis">
                    </div>
                </fieldset>


                <div class="col-12 botones">
                    <button class="btn btn-primary" type="submit">Enviar</button>
                    <button class="btn btn-primary" type="reset">Borrar</button>
                </div>
            </div>

            <script>
                //selectores
                const error = document.getElementById('error');
                const titulo = document.getElementById('titulo');
                const actores = document.getElementById('actores');
                const director = document.getElementById('director');
                const guion = document.getElementById('guion');
                const produccion = document.getElementById('produccion');
                const nacionalidad = document.getElementById('nacionalidad');
                const sinopsis = document.getElementById('sinopsis');
                //selectores de validacion
                const anio = document.getElementById('anio');
                const anioV = document.getElementById('anioV');
                const duracion = document.getElementById('duracion');
                const duracionV = document.getElementById('duracionV');
                const boton = document.getElementById('submit');
                let validaciones = [];
                validaciones[0] = 'false';
                validaciones[1] = 'false';
                validaciones[2] = 'false';
                validaciones[3] = 'false';
                validaciones[4] = 'false';
                validaciones[5] = 'false';
                validaciones[6] = 'false';
                validaciones[7] = 'false';
                validaciones[8] = 'false';


                function validarAnio() {
                    console.log(anio);
                    let anioContenido = anio.value;
                    if (anioContenido.length < 4 || anioContenido.lengt > 4) {
                        anio.classList.remove('gut');
                        anio.classList.add('bad');
                        anioV.style.display = 'block';
                        anioV.innerHTML = 'El año debe poseer 4 numeros';
                        validaciones[0] = 'false';
                        return (false);
                    } else {
                        anio.classList.remove('bad');
                        anio.classList.add('gut');
                        anioV.style.display = 'none';
                        validaciones[0] = 'true';
                        return (true);
                    }

                }


                function validarDuracion() {
                    let duracionContenido = duracion.value;
                    if (duracionContenido.length != 3) {
                        duracion.classList.remove('gut');
                        duracion.classList.add('bad');
                        duracionV.style.display = 'block';
                        duracionV.innerHTML = 'La duración debe tener 3 numeros';
                        validaciones[1] = 'false';
                        return (false);
                    } else {
                        duracion.classList.remove('bad');
                        duracion.classList.add('gut');
                        duracionV.style.display = 'none';
                        validaciones[1] = 'true';
                        return (true);
                    }
                }

                function validarTitulo(){
                    if(titulo.value != ''){
                        validaciones[2] = 'true';
                        titulo.classList.add('gut');
                        titulo.classList.remove('bad');
                        return true;
                    }else{
                        validaciones[2] = 'false';
                        titulo.classList.add('bad');
                        titulo.classList.remove('gut');
                        return false;
                    }
                }

                function validarActores(){
                    if(actores.value != ''){
                        validaciones[3] = 'true';
                        actores.classList.add('gut');
                        actores.classList.remove('bad');
                        return true;
                    }else{
                        validaciones[3] = 'false';
                        actores.classList.add('bad');
                        actores.classList.remove('gut');
                        return false;
                    }
                }

                function validarDirector(){
                    if(director.value != ''){
                        validaciones[4] = 'true';
                        director.classList.add('gut');
                        director.classList.remove('bad');
                        return true;
                    }else{
                        validaciones[4] = 'false';
                        director.classList.add('bad');
                        director.classList.remove('gut');
                        return false;
                    }
                }

                function validarGuion(){
                    if(guion.value != ''){
                        validaciones[5] = 'true';
                        guion.classList.add('gut');
                        guion.classList.remove('bad');
                        return true;
                    }else{
                        validaciones[5] = 'false';
                        guion.classList.add('bad');
                        guion.classList.remove('gut');
                        return false;
                    }
                }

                function validarProduccion(){
                    if(produccion.value != ''){
                        validaciones[6] = 'true';
                        produccion.classList.add('gut');
                        produccion.classList.remove('bad');
                        return true;
                    }else{
                        validaciones[6] = 'false';
                        produccion.classList.add('bad');
                        produccion.classList.remove('gut');
                        return false;
                    }
                }

                function validarNacionalidad(){
                    if(nacionalidad.value != ''){
                        validaciones[7] = 'true';
                        nacionalidad.classList.add('gut');
                        nacionalidad.classList.remove('bad');
                        return true;
                    }else{
                        validaciones[7] = 'false';
                        nacionalidad.classList.add('bad');
                        nacionalidad.classList.remove('gut');
                        return false;
                    }
                }

                function validarSinopsis(){
                    if(sinopsis.value != ''){
                        validaciones[8] = 'true';
                        sinopsis.classList.add('gut');
                        sinopsis.classList.remove('bad');
                        return true;
                    }else{
                        validaciones[8] = 'false';
                        sinopsis.classList.add('bad');
                        sinopsis.classList.remove('gut');
                        return false;
                    }
                }


                function validar(){
                    validarTitulo();
                    validarAnio();
                    validarActores();
                    validarDirector();
                    validarGuion();
                    validarProduccion();
                    validarNacionalidad();
                    validarSinopsis();
                    validarDuracion();
                     if(validarTitulo() && validarActores() && validarDirector() && validarGuion() && validarProduccion() && validarNacionalidad() && validarSinopsis() && validarAnio() && validarDuracion()){
                        error.style.display = 'none';
                        return true;
                    }else{
                        error.style.display = 'block';
                        return false;
                    } 
                }

            </script>
        </form>
    </div>
</body>

</html>