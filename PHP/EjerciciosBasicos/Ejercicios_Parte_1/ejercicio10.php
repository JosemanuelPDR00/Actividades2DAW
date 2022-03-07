<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Pirámide de asteriscos</title>
    </head>
    <body>
        <?php
            $filas=9;
            $cadena=null;
            
            for($i = 1; $i <= $filas; $i++){
                for($j = $i; $j <= $i; $j++){
                    $cadena .= "*";
                }
                echo $cadena."<br>";
            }
        ?>
    </body>
</html>