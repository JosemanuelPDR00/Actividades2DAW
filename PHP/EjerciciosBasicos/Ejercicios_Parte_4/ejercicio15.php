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
        <form action="#" method="post">
            Base:<input type="number" name="base"><br>
            Exponente:<input type="number" name="exponente"><br>
            <input type="submit" value="Enviar">
        </form>
        <?php
            $base= $_POST['base'];
            $exponente= $_POST['exponente'];
            
            for($i=1;$i<=$exponente;$i++){
                echo "<p>$base<sup>$i</sup></p>";
            }
        ?>
    </body>
</html>
