<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        $nombreCorto=$_GET['nombre_corto'];

        $conexion=new PDO('mysql:host=localhost;dbname=dwes', 'josema', '123456');

        $sql=$conexion->query("SELECT nombre_corto,nombre,descripcion,PVP,cod FROM producto WHERE nombre_corto='$nombreCorto'");

        $fila = $sql->fetch();
    
    ?>
        <form action="actualizar.php" method="POST">
            <div id="contenedorGeneral">

            <label for="nombreCorto" id="nombreCorto">Nombre Corto: </label>
            <input type="text" name="nombreCorto" value="<?php echo $fila['nombre_corto']?>">
            <br><br>
            <label for="nombreProducto" id="nombreProducto">Nombre Producto: </label>
            <input type="text" name="nombreProducto" value="<?php echo $fila['nombre']?>">
            <br><br>
            <label for="descripcion" id="descripcion">Descripcion: </label>
            <input type="text" name="descripcion" value="<?php echo $fila['descripcion']?>">
            <br><br>
            <label for="precio" id="precio">Precio: </label>
            <input type="text" name="precio" value="<?php echo $fila['PVP']?>">
            <br><br>
            <input type="hidden" name="codigo" value="<?php echo $fila['cod']?>">
            <br><br>
            <input type="submit" name="editar" value="EDITAR" id="editar"></input>
            <input type="submit" name="cancelar" value="CANCELAR" id="cancelar"></input>

            </div>
        </form>

    <?php

        $fila=null;
        $sql=null;
        $conexion=null;

    ?>


</body>
</html>