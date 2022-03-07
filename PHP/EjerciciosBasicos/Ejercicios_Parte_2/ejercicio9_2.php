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
            $radio= $_GET['radio'];
            $altura= $_GET['altura'];
            
            echo "El volumen del cono es de: ", (3.14 * ($radio * $radio) * $altura)/3 ;
        ?>
    </body>
</html>
