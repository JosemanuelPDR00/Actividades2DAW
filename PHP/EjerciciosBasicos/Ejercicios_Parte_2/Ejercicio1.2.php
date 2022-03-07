<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Resultado</title>
    </head>
    <body>
        <?php
        
            $numero1 = $_GET['numero1'];
            $numero2 = $_GET['numero2'];
            
            echo "El resultado de la multiplicación es: "; echo $numero1*$numero2;
        ?>
    </body>
</html>
