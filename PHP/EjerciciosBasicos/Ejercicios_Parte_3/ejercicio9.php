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
            <input type="number" name="a"><br>
            <input type="number" name="b"><br>
            <input type="number" name="c"><br>
            <input type="submit" value="Enviar">
        </form>
        <br>
        <?php
            $a= $_GET['a'];
            $b= $_GET['b'];
            $c= $_GET['c'];
            
            $x= (-$b + sqrt(($b*$b)-4*$a*$c))/2*$a;
            $y= (-$b - sqrt(($b*$b)-4*$a*$c))/2*$a;
            
            echo "Las posibles soluciones son: ",$x," y ",$y;
            
        ?>
    </body>
</html>
