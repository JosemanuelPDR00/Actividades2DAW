<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" >
    </head>
    <body>
        
        <?php  
            $num= $_POST['num'];
            $contador= $_POST['contador'];
            $resultado= $_POST['resultado'];
            
            if(!isset($num)){
                echo "<form action='#' method='post'>
                    <input type='number' name='num'><br>
                    <input type='hidden' name='contador' value=0><br>
                    <input type='hidden' name='resultado' value=0><br>
                    <input type='submit' value='Enviar'><br>
                </form>";
            }else {
                if($num>=0){
                    $contador++;
                    $resultado += $num;
        ?>
            <form action='#' method='post'>
                <input type='number' name='num'><br>
                <input type='hidden' name='contador' value='<?php echo $contador; ?>'><br>
                <input type='hidden' name='resultado' value='<?php echo $resultado; ?>'><br>
                <input type='submit' value='Enviar'><br>
            </form>
        <?php
                }else{
                    echo "La media de los numeros introducidos es...", $resultado/$contador;
                }
            }
        ?>
    </body>
</html>