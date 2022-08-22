<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/bootstrap-5.1.3-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="styles/css/styles.css" />
    <script src="styles/bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
    <title>Cine Cinema</title>
</head>

<body>
    <form class="row g-3 needs-validation" method="POST" action="../Controlador/validar.php" novalidate>
        <div class="col-md-4">
            <label for="validationCustom01" class="form-label">Edad:</label>
            <input type="number" class="form-control" id="validationCustom01" name="edad" required>
            <div class="invalid-feedback">
                Debe ser un numero entero
            </div>
            <div class="col-md-9">
                <label for="validationCustom04" class="form-label">Estado:</label>
                <select class="form-select" id="validationCustom04" name="mayor" required>
                    <option selected disabled value="">Estudios...</option>
                    <option value="true">Estudiante</option>
                    <option value="false">No estudiante</option>
                </select>
                <div class="invalid-feedback">
                Debe elegir si esta estudiando o no
            </div>
            </div>
        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit">¡Consultar!</button>
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