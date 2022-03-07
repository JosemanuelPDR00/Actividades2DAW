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
        <?php
        
        $lado1= $_GET['lado1'];
        $lado2= $_GET['lado2'];
        
        echo "El área del rectangulo es: ", $lado1*$lado2;
        
        ?>
    </body>
</html>
