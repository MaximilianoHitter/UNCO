<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="asd.php" method="get">
        <label for="name">Escriba su nombre:</label>
        <input type="text" name="name" value="" id="name">
        <input type="submit" value="¡Ingresar!">
    </form>
    <?php
        if(isset($_GET['name'])){
            $nombre = $_GET['name'];
            echo "<h1>Bienvenido $nombre</h1>";
        }
    ?>
    
</body>
</html>