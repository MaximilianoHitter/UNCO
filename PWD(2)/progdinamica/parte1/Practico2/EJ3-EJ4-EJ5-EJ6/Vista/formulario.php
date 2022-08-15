<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/styles.css">
    <title>Document</title>
</head>
<body>
    <form action="../Controlador/recibir.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre">
        <br>
        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" id="apellido">
        <br>
        <label for="edad">Edad:</label>
        <input type="number" name="edad" id="edad">
        <br>
        <label for="direccion">Direccion:</label>
        <input type="text" name="direccion" id="direccion">
        <br>
        <label for="estudio">Nivel de estudio:</label>
        <br>
        <input type="radio" name="estudio" value="Sin estudios">
        <label for="Sin estudios" class="label1">Sin estudios</label>
        <br>
        <input type="radio" name="estudio" value="Estudios primarios">
        <label for="Estudios primarios" class="label1">Estudios primarios</label>
        <br>
        <input type="radio" name="estudio" value="Estudios secundarios">
        <label for="Estudios secundarios" class="label1">Estudios secundarios</label>
        <br>
        <label for="sexo">Sexo:</label>
        <br>
        <input type="radio" name="sexo" value="Masculino">
        <label for="Masculino" class="label1">Masculino</label>
        <br>
        <input type="radio" name="sexo" value="Femenino">
        <label for="Femenino" class="label1">Femenino</label>
        <br>
        <input type="radio" name="sexo" value="Otro">
        <label for="Otro" class="label1">Otro</label>
        <br>
        <label for="deporte">Deportes favoritos</label>
        <br>
        <input type="checkbox" name="deporte[0]" index="0" value="Voley">
        <label for="deporte" class="label1">Voley</label>
        <br>
        <input type="checkbox" name="deporte[1]" index="1" value="Futbol">
        <label for="deporte" class="label1">Futbol</label>
        <br>
        <input type="checkbox" name="deporte[2]" index="2" value="Golf">
        <label for="deporte" class="label1">Golf</label>
        <br>
        <input type="checkbox" name="deporte[3]" index="3" value="Kendo">
        <label for="deporte" class="label1">Kendo</label>
        <br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>