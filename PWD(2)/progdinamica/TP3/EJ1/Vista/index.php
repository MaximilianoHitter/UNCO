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
    <form action="../Controlador/recibirarchivo.php" method="post" id="formulario" onsubmit="return validar();" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="formFile" class="form-label">Seleccione un archivo para subir</label>
            <input class="form-control" type="file" id="archivo" name="archivo">
            <div class="invalid-feedback" id="validarT">
                Por favor seleccione un archivo
            </div>
        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit">Enviar archivo</button>
        </div>
    </form>

    <script>
        const formulario = document.getElementById('formulario');
        const archivo = document.getElementById('archivo');
        const validarT = document.getElementById('validarT');


        function validar() {
            if (archivo.value != '') {
                validarT.style.display = 'none';
                return true
            } else {
                validarT.style.display = 'block'
                return false
            }
        }
    </script>
</body>

</html>