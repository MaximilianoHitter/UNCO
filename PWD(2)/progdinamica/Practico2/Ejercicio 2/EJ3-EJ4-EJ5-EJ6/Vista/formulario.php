<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/bootstrap-5.1.3-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="styles/css/styles.css" />
    <script src="styles/bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>

<body>
    <form class="row g-3 needs-validation" action="../Controlador/recibir.php" method="post" novalidate>
        <div class="col-md-4">
            <label for="validationCustom01" class="form-label">Nombre:</label>
            <input type="text" class="form-control" id="validationCustom01" value="" name="nombre" required>
            <div class="invalid-feedback">
                Nombre inválido
            </div>
        </div>
        <div class="col-md-4">
            <label for="validationCustom02" class="form-label">Apellido:</label>
            <input type="text" class="form-control" id="validationCustom02" value="" name="apellido" required>
            <div class="invalid-feedback">
                Apellido inválido
            </div>
        </div>
        <div class="col-md-4">
            <label for="validationCustom02" class="form-label">Edad:</label>
            <input type="number" class="form-control" id="validationCustom02" name="edad" required>
            <div class="invalid-feedback">
                Edad inválida
            </div>
        </div>
        <div class="col-md-6">
            <label for="validationCustom03" class="form-label">Dirección:</label>
            <input type="text" class="form-control" id="validationCustom03" name="direccion" required>
            <div class="invalid-feedback">
                Dirección inválida
            </div>
        </div>
        <br>
        <div class="col-md-6">
            <label for="validationCustom04" class="form-label">Nivel de estudios:</label>
            <select class="form-select" id="validationCustom04" name="estudio" required>
                <option selected disabled value="">Elegir...</option>
                <option value="Sin estudios" name="estudio">Sin estudios</option>
                <option value="Estudios primarios" name="estudio">Estudios primarios</option>
                <option value="Estudios secundarios" name="estudio">Estudios secundarios</option>
            </select>
            <div class="invalid-feedback">
                Por favor seleccione uno
            </div>
        </div>
        <br>

        <div class="col-12">
            <label for="sexo">Sexo:</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="femenino" id="invalidCheck" name="sexo">
                <label class="form-check-label" for="invalidCheck">
                    Femenino
                </label>
                <br>
                <input class="form-check-input" type="radio" value="masculino" id="invalidCheck" name="sexo">
                <label class="form-check-label" for="invalidCheck">
                    Masculino
                </label>
                <br>
                <input class="form-check-input" type="radio" value="otro" id="invalidCheck" name="sexo" checked>
                <label class="form-check-label" for="invalidCheck">
                    Otro
                </label>
                <div class="invalid-feedback">
                    Tenes que elegir uno
                </div>
            </div>
        </div>

        <div class="col-12">
        <label for="deporte">Deportes:</label>
            <div class="form-check" id="algo">
                <input class="form-check-input" type="checkbox" value="Voley" id="check" name="deporte[0]">
                <label class="form-check-label" for="invalidCheck">
                    Voley
                </label>
                <br>
                <input class="form-check-input" type="checkbox" value="Futbol" id="check" name="deporte[1]">
                <label class="form-check-label" for="invalidCheck">
                    Futbol
                </label>
                <br>
                <input class="form-check-input" type="checkbox" value="Golf" id="check" name="deporte[2]">
                <label class="form-check-label" for="invalidCheck">
                    Golf
                </label>
                <br>
                <input class="form-check-input" type="checkbox" value="Kendo" id="check" name="deporte[3]">
                <label class="form-check-label" for="invalidCheck">
                    Kendo
                </label>
                <br>
                <input class="form-check-input" type="checkbox" value="Kendo" id="check" name="deporte[4]" checked>
                <label class="form-check-label" for="invalidCheck">
                    Otros
                </label>
                <div class="invalid-feedback">
                    Debes elegir por lo menos uno
                </div>
            </div>
        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit">¡Enviar formulario!</button>
        </div>
    </form>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')
            
            //const deporte = document.querySelectorAll('.check');
            //console.log(deporte);

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    console.log(form);
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
</body>

</html>