<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h2>Introduce tus tres notas para hacer la media.</h2><br>
        <form action="#" method="get">
            <input type="number" name="num1">
            <input type="number" name="num2">
            <input type="number" name="num3">
            <input type="submit" value="Enviar">
        </form>
        <br>
        <?php
            $num1= $_GET['num1'];
            $num2= $_GET['num2'];
            $num3= $_GET['num3'];
            
            $nota_media=($num1+$num2+$num3)/3;
            echo 'Tu nota media es de: ', $nota_media;
        ?>
    </body>
</html>
