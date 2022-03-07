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
            <input type="number" name="numIntroducido">
            <input type="submit" value="Enviar">
        </form>
        <?php
            $numIntroducido= $_POST['numIntroducido'];
            
            
            if(!isset($numIntroducido)){
                echo    "<form action='#' method='post'>
                        <input type='number' name='numIntroducido'>
                        <input type='submit' value='Enviar'>
                        </form>";
            }else{
                for($i=1;$i<=10;$i++){
                echo "<tr><td>$numIntroducido</td><td>x</td><td>$i</td><td>=</td><td>",$i*$numIntroducido,"</td></tr>","<br>";
                }
            }
                
        ?>
    </body>
</html>
