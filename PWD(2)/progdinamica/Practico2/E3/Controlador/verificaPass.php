<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Vista/styles/bootstrap-5.1.3-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../Vista/styles/css/styles.css" />
    <script src="../Vista/styles/bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
    <title>Recibimiento</title>
</head>

<body>
    <div class="col-mb-5">
        <?php
        $usuarios = array('pepito@gmail.com' => '123456789a', 'carlos@hotmail.com' => 'pepito456', 'algo@algo.com' => '123asd123');
        if (isset($_POST)) {
            //guardar datos
            if (isset($_POST['email'])) {
                $email = $_POST['email'];
            } else {
                $email = '';
            }
            if (isset($_POST['password'])) {
                $password = $_POST['password'];
            } else {
                $password = '';
            }
            //verificacion de campos por las dudas
            if ($email != '' && $password != '') {
                //var_dump($usuarios[$email]);
                //var_dump(key_exists($email, $usuarios));
                //verificar si esta en el array el email 
                if (key_exists($email, $usuarios)) {
                    if ($usuarios[$email] == $password) {
                        //hasta aca todo re genial
                        echo "<div class=\"alert alert-success\" role=\"alert\">
                        Bienvenido $email, su contraseña ha sido verificada
                      </div>";

                    } else {
                        //no esta bien la contraseña
                        echo "<div class=\"alert alert-warning\" role=\"alert\">
                        $email ha ingresado una contraseña inválida
                      </div>";
                    }
                } else {
                    //no existe usuario
                    echo "<div class=\"alert alert-danger\" role=\"alert\">
                    No hemos podido encontrar dicho usuario
                  </div>";
                }
            } else {
                //hubo algun error feo
                echo "<div class=\"alert alert-danger\" role=\"alert\">
                Algo se rompio por aquí :(
              </div>";
            }
        }
        ?>
    </div>
</body>

</html>