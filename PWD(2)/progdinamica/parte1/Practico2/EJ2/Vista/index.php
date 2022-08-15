<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="../Controlador/revision.php" method="get">
        <label>Ingrese la cantidad de horas de cursada de la materia Programación Web Dinámica</label>
        <br>
        <label for="lunes">Lunes:</label>
        <input type="number" name="lunes" id="lunes">
        <br>
        <label for="martes">Martes:</label>
        <input type="number" name="martes" id="martes">
        <br>
        <label for="miercoles">Miercoles:</label>
        <input type="number" name="miercoles" id="miercoles">
        <br>
        <label for="jueves">Jueves:</label>
        <input type="number" name="jueves" id="jueves">
        <br>
        <label for="viernes">Viernes:</label>
        <input type="number" name="viernes" id="viernes">
        <br>
        <input type="submit" value="Enviar">
    </form>
</body>

</html>