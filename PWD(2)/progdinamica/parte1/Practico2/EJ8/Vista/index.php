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
    <form class="row g-3 needs-validation" novalidate>
        <div class="col-md-4">
            <label for="validationCustom01" class="form-label">Edad:</label>
            <input type="number" class="form-control" id="validationCustom01" name="edad" required>
            <div class="invalid-feedback">
                Debe ser un numero entero
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" name="mayor">
                <label class="form-check-label" for="invalidCheck">
                ¿Es estudiante?
                </label>
            </div>
        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit">¡Consultar!</button>
        </div>
    </form>
</body>

</html>