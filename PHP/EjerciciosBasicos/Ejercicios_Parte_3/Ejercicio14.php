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
        <h2>Introduce un numero para ver si es multiplo de dos y de cinco.</h2><br>
        <form action="#" method="get">
            <input type="number" name="num"><br>
            <input type="submit" value="Enviar">
        </form>
        <br>
        <?php
            $num= $_GET['num'];
            
            if($num%2){
                echo "Numero Impar<br>";
            }else{
                echo "Numero Par<br>";
            }
            
            if($num%5){
                echo "NO es multiplo de 5.";
            }else{
                echo "Es multiplo de 5.";
            }
        ?>
    </body>
</html>
