<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="../Controlador/cuenta.php" method="post">
        <label for="numero1">Primer número:</label>
        <input type="text" name="numero1" id="numero1">
        <br>
        <label for="numero2">Segundo número:</label>
        <input type="text" name="numero2" id="numero2">
        <br>
        <label for="operacion">Operación:</label>
        <select name="operacion" id="operacion">
            <option value="suma" >Suma</option>
            <option value="resta" >Resta</option>
            <option value="multiplicacion" >Multiplicacion</option>
            <option value="division" >Division</option>
        </select>
        <br>
        <input type="submit" name="submit" value="Enviar">
    </form>
</body>
</html>