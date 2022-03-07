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
            $combinacion=$_POST['combinacion'];
            $oportunidades=$_POST['oportunidades'];
            $combinacionCorrecta=1234;
            
            if(!isset($combinacion) && !isset($oportunidades)){
                echo"<form action='#' method='post'>
                        <input type='number' name='combinacion'>
                        <input type='hidden' name='oportunidades' value='4'>
                        <input type='submit' value='Enviar'>
                    </form>";
            }else{
                if($oportunidades>1){
                    if($combinacion == $combinacionCorrecta){
                        echo 'Apertura correcta de la caja fuerte';
                    }else{
                        $oportunidades--;
                        echo 'Combinacion INCORRRECTA intentelo de nuevo, te quedan: ',$oportunidades,' oportunidades';
                    ?>
                    <form action="#" method="post">
                        <p>Numero Secreto:</p>
                        <input type="number" name="combinacion">
                        <input type="hidden" name="oportunidades" value="<?php echo $oportunidades?>">
                        <input type="submit" value="Enviar">
                    </form>
            <?php
                        
                    }
                }
            }
            
            
        ?>
    </body>
</html>
