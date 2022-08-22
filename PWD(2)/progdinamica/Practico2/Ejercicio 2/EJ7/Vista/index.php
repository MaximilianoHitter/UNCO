<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/bootstrap-5.1.3-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="styles/css/styles.css" />
    <script src="styles/bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
    <title>Mini Calculadora</title>
</head>

<body>
    <form class="row g-3 needs-validation" action="../Controlador/cuenta.php" method="POST" novalidate>
        <div class="col-md-4">
            <label for="validationCustom01" class="form-label">Primer número:</label>
            <input type="number" class="form-control" id="validationCustom01" name="numero1" required>
            <div class="valid-feedback">
                Good!
            </div>
            <div class="invalid-feedback">
                Debe ser un número
            </div>
        </div>
        <div class="col-md-4">
            <label for="validationCustom02" class="form-label">Segundo número:</label>
            <input type="number" class="form-control" id="validationCustom02" name="numero2" required>
            <div class="valid-feedback">
                Good!
            </div>
            <div class="invalid-feedback">
                Debe ser un número
            </div>
        </div>

        <div class="col-md-3">
            <label for="validationCustom04" class="form-label">Operación</label>
            <select class="form-select" id="validationCustom04" name="operacion" required>
                <option value="suma">Suma</option selected>
                <option value="resta">Resta</option>
                <option value="multiplicacion">Multiplicacion</option>
                <option value="division">Division</option>
            </select>
            <div class="invalid-feedback">
                Elija una operación
            </div>
        </div>

        <div class="col-12">
            <button class="btn btn-primary" type="submit">Realizar la operación</button>
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