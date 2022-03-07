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
        <h2>Introduce una hora exacta del dia.</h2><br>
        <form action="#" method="get">
            <input type="number" name="hora">
            <input type="submit" value="Enviar">
        </form>
        <br>
        
        <?php
            $hora = $_GET['hora'];
            
            if($hora>=6 && $hora<=12){
                 echo "Buenos dias ...";
            }elseif($hora>=13 && $hora<=20){
                echo "Buenas tardes ...";
            }elseif($hora>=21 && $hora<=24){
                echo "Buenas noches ...";
            } elseif ($hora>=1 && $hora<=5) {
                echo "Buenas noches ...";
            }
        ?>
    </body>
</html>
