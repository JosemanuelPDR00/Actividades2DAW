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
        <h2>Introduce un numero para averiguar el primer digito.</h2><br>
        <form action="#" method="get">
            <input type="number" name="num">
            <input type="submit" value="Enviar">
        </form>
        <br>
        <?php
            $num= $_GET['num'];
            
            if($num<0){
                $num= -$num; 
            }
            
            if($num<10){
                $num=$num;
            }
            
            if($num<100){
                $num=$num/10;
            }
            
            if($num<1000){
                $num=$num/100;
            }
            
            if($num<10000){
                $num=$num/1000;
            }
            
            if($num<100000){
                $num=$num/10000;
            }
            
            if($num>=100000){
                echo "Tienes que introducir un numero maximo de 5 dígitos.";
            }
            
            
            
            echo "El primer digito de tu numero introducido es: ",$num;
        ?>
    </body>
</html>
