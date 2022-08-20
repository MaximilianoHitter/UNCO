<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="styles/bootstrap-5.1.3-dist/css/bootstrap.min.css" >
    <link rel="stylesheet" href="styles/css/styles.css">
    <script src="styles/bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
    <title>Algo nuevo</title>
  </head>
  <body>
    <form method="post" action="index.php">
    <div class="mb-3">
      <label for="nombre" class="form-label"
        >Nombre</label
      >
      <input
        name="nombre"
        type="text"
        class="form-control"
        id="nombre"
      />
    </div>
    <div class="mb-3">
      <label for="email" class="form-label"
        >Email</label
      >
      <input
        name="email"
        type="email"
        class="form-control"
        id="email"
        placeholder="name@example.com"
      />
    </div>
    <div class="mb-3">
      <label for="textarea" class="form-label"
        >Textarea</label
      >
      <textarea
        name="comentario"
        class="form-control"
        id="comentario"
        rows="3"
      ></textarea>
    </div>
    <button type="submit" class="btn btn-dark">Enviar</button>
    <hr>
    <?php
      if(isset($_POST)){
        if(!empty($_POST['email'])){
          $email = $_POST['email'];
        }
        if(!empty($_POST['comentario'])){
          $comentario = $_POST['comentario'];
        }
        if(!empty($_POST['nombre'])){
          $nombre = $_POST['nombre'];
          echo "<div class=\"alert alert-success\" role=\"alert\">¡$nombre felicidades! Hemos registrado tu mail y tu comentario</div>";
        }
        

      }else{
        echo "<div class=\"alert alert-warning\" role=\"alert\">Aún no hemos recibido tu comentario</div>";
      }
    ?>
    </form>
    
    

  </body>
</html>
