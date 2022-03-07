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
            $num=$_POST['num'];
            $contador=$_POST['contador'];
            $totalImpares=$_POST['totalImpares'];
            $contadorImpares=$_POST['contadorImpares'];
            $mayorPares=$_POST['mayorPares'];
            
            if(!isset($num)){
                $contador=0;
                $totalImpares=0;
                $contadorImpares=0;
                $mayorPares=0;
            }
            
            if($num>0){
                $contador++;
                if($num%2==0){
                    if($num>$mayorPares){
                        $mayorPares=$num;
                    }
                }else{
                    $contadorImpares++;
                    $totalImpares+=$num;
                }
            }
            
            if(!isset($num) || $num>0){
            ?>
            <form action='#' method='post'>
                <input type='number' name='num'>
                <input type='hidden' name='contador' value='<?php echo $contador; ?>' >
                <input type='hidden' name='totalImpares' value='<?php echo $totalImpares; ?>' >
                <input type='hidden' name='contadorImpares' value='<?php echo $contadorImpares; ?>' >
                <input type='hidden' name='mayorPares' value='<?php echo $mayorPares; ?>'>
                <input type='submit' value='Enviar'>
            </form>
            <?php
            }
            
            if($num<0){
                echo "Contador: ",$contador,"<br>";
                echo "Total Impares: ",$totalImpares,"<br>";
                echo "Contador Impares: ",$contadorImpares,"<br>";
                echo "Mayor Pares: ",$mayorPares,"<br>";
                echo "Media Impares: ",$totalImpares/$contadorImpares;
            }
            
        ?>
    </body>
</html>
