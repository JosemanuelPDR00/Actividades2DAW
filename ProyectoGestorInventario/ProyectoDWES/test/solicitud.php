<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="./../solicitarProducto.php" method="post">
        <input type="text" name="nif" value="<?php if(isset($_GET['nif'])){
            echo $_GET['nif'];
        }
         ?>">
        <br>
        <input type="number" name="unidades">
        <br>
        <input type="submit" value="Enviar" name="solicitud">
    </form>
    <a href="./../login.php?close=close">
        Cerrar sesion
    </a>
</body>

</html>