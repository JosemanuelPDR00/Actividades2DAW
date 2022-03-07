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
        <h2>Introduce un numero del 1 al 7.</h2><br>
        <form action="#" method="get">
            <input type="number" name="num">
            <input type="submit" value="Enviar">
        </form>
        <br>
        <?php
            $num= $_GET['num'];
            
            if($num==1){
                echo 'Lunes';
            }elseif($num==2){
                echo 'Martes';
            }elseif($num==3){
                echo 'Miercoles';
            }elseif($num==4){
                echo 'Jueves';
            }elseif($num==5){
                echo 'Viernes';
            }elseif($num==6){
                echo 'Sabado';
            }elseif($num==7){
                echo 'Domingo';
            }else{
                echo 'Un numero del 1 al 7 CRACK...';
            }
        ?>
    </body>
</html>
