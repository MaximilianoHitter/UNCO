<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/bootstrap-5.1.3-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="styles/css/styles.css" />
    <script src="styles/bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
    <title>Horarios de cursadas</title>
</head>

<body>
    <br>
    <h1>Horarios de Programación Web Dinámica</h1>
    <br>
    <form class="row g-3 needs-validation" action="../Controlador/revision.php" method="GET" novalidate>
        <div class="col-md-8">
            <label for="validationCustom01" class="form-label">Lunes</label>
            <input type="number" class="form-control ancho" id="validationCustom01" name='lunes' required>
            <div class="valid-feedback">
                Good!
            </div>
            <div class="invalid-feedback">
                Debe completar el campo
            </div>
        </div>
        <br>
        <br>
        <div class="col-md-8">
            <label for="validationCustom01" class="form-label">Martes</label>
            <input type="number" class="form-control ancho" id="validationCustom01" name='martes' required>
            <div class="valid-feedback">
                Good!
            </div>
            <div class="invalid-feedback">
                Debe completar el campo
            </div>
        </div>
        <br>
        <br>
        <div class="col-md-8">
            <label for="validationCustom01" class="form-label">Miercoles</label>
            <input type="number" class="form-control ancho" id="validationCustom01" name='miercoles' required>
            <div class="valid-feedback">
                Good!
            </div>
            <div class="invalid-feedback">
                Debe completar el campo
            </div>
        </div>
        <br>
        <br>
        <div class="col-md-8">
            <label for="validationCustom01" class="form-label">Jueves</label>
            <input type="number" class="form-control ancho" id="validationCustom01" name='jueves' required>
            <div class="valid-feedback">
                Good!
            </div>
            <div class="invalid-feedback">
                Debe completar el campo
            </div>
        </div>
        <br>
        <br>
        <div class="col-md-8">
            <label for="validationCustom01" class="form-label">Viernes</label>
            <input type="number" class="form-control ancho" id="validationCustom01" name='viernes' required>
            <div class="valid-feedback">
                Good!
            </div>
            <div class="invalid-feedback">
                Debe completar el campo
            </div>
        </div>
        <br>
        <br>
        <div class="col-12">
            <button class="btn btn-primary" type="submit">¡Enviar!</button>
        </div>
    </form>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
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