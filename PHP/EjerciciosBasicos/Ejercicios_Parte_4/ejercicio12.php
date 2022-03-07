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
            <input type="number" name="limite">
            <input type="submit" value="Enviar">
        </form>
        
        <?php
            
        $limite= $_POST['limite'];
	$fibonacci  = array(0,1);
        
	for($i=2;$i<=$limite;$i++){
	    // El valor actual es la suma de la posición actual -1 y la posición actual -2
		echo $fibonacci[] = $fibonacci[$i-1]+$fibonacci[$i-2]."<br/>";
	}           
            
        ?>
    </body>
</html>
