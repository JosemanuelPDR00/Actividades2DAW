<?php
require('funciones.php');

if(isset($_POST['enviar'])) {
    $dni = $_POST['dni'];
    validar_dni($dni);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validación de DNI</title>
</head>
<body>
    <h4>Introduce un DNI a validar</h4>
    <form action="#" method="post">
        <label for="dni">DNI: </label>
        <input type="text" name="dni" placeholder="Introduce un DNI">
        <input type="submit" name="enviar" value="enviar">
    </form>
</body>
</html>