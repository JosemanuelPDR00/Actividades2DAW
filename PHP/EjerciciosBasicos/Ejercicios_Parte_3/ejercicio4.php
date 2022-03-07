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
        <h2>Introduce el numero de horas extras trabajadas para calcular el sueldo mensual.</h2><br>
        <form action="#" method="get">
            <input type="number" name="num">
            <input type="submit" value="Enviar">
        </form>
        <br>
        <?php
            $num= $_GET['num'];
            $total;
            
            $total=40*12+$num*16;
            echo 'El sueldo de este mes con horas incluidas es de: ',$total,'€';
        ?>
    </body>
</html>
