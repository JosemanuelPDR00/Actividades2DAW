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
            $kb= $_GET['kb'];
            
            echo "$kb","Kb son: ", $kb / 1024, "Mb.";
        ?>
    </body>
</html>
