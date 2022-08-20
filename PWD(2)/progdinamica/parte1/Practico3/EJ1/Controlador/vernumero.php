<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
      rel="stylesheet"
      href="../Vista/styles/bootstrap-5.1.3-dist/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="../Vista/styles/css/styles.css" />
    <script src="../Vista/styles/bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
    <title>Respuesta</title>
</head>

<body>
    <div class="alert alert-dark" role="alert">
        <?php
        if (isset($_POST)) {
            $numero = $_POST['numero'];
            $resultado = '';
            if ($numero < 0) {
                $resultado = 'Negativo';
            } elseif ($numero > 0) {
                $resultado = 'Positivo';
            } else {
                $resultado = 'Cero';
            }
            echo "El número ingresado es $resultado";
            echo "  <button type=\"button\" class=\"btn btn-success\"><a style=\"color:white\" href=\"../Vista/formulario.html\">Volver</a></button>";
        }
        ?>
    </div>

</body>

</html>