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
            echo 'Tu nota media es de: ', round($nota_media), '&nbsp';
            
            if(round($nota_media)<=4){
                echo 'Insuficiente';
            }elseif(round($nota_media)==5){
                echo 'Suficiente';
            }elseif(round($nota_media)==6){
                echo 'Bien';
            }elseif(round($nota_media)==7){
                echo 'Notable';
            }elseif(round($nota_media)==8){
                echo 'Notable';
            }elseif(round($nota_media)==9){
                echo 'Sobresaliente';
            }elseif(round($nota_media)==10){
                echo 'Sobresaliente';
            }
            
        ?>
    </body>
</html>
