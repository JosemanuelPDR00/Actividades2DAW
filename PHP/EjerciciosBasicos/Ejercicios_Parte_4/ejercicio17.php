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
            <input type="number" name="numIntro">
            <input type="submit" value="Enviar">
        </form>
        <?php
            $numIntro=$_POST['numIntro'];
            $resultado;
            
            if($numIntro>0){
            for($i=$numIntro;$i<=$numIntro+100;$i++){
                
                $resultado+=$i;
                
            }
            echo $resultado;
            }else{
                echo "Introduzca un numero positivo.";
            }
            
        ?>
    </body>
</html>
