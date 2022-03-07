<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 1</title>
    </head>
    <body>
        <h2>Introduce el dia de la semana que quieras saber la primera hora de clases.</h2><br>
        <form action="#" method="get">
            <input type="text" name="dia">
            <input type="submit" value="Enviar">
        </form><br>
        
        <?php
            $dia = $_GET['dia'];
            $dia = strtolower($dia);
            
            if($dia=="lunes"){
            
                echo "Despliegue de Aplicaciones Web";
                
            }elseif($dia=="martes"){
                
                echo "Desarrollo Web en Entorno Servidor";
                
            }elseif($dia=="miercoles"){  
                
                echo "Desarrollo Web en Entorno Servidor";
                
            }elseif($dia=="jueves"){
                
                echo "Empresa e Iniciativa Emprendedora";
            }elseif($dia=="viernes"){
                
                echo "Desarrollo Web en Entorno Servidor";
                
            }else{
                echo "<form action='#' method='get'>
            <input type='text' name='dia'>
            <input type='submit' value='Enviar'>
            </form>";
            }
            
        ?>
    </body>
</html>
