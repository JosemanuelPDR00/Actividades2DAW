<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset='UTF-8'>
        <title></title>
    </head>
    <body>
        
        <?php
            
            $agenda= unserialize($_POST['agenda']);
            
            //inicializamos variables
            $nombre = $_POST['nombre'];
            $telefono = $_POST['telefono'];
            
            //si el nombre esta seteado, la clave es el nombre y el valor el telefono.
            if(isset($nombre)){
                $agenda[$nombre]=$telefono;
            }
            
            //si no esta vacio el nombre muestra la tabla de la agenda.
            if(!empty($nombre)){
            ?>
                <table border='1'>
                    <?php
                        foreach($agenda as $nombre => $telefono){
                            echo '<tr>','<td>',$nombre,'</td>','<td>',$telefono,'</td>','</tr>';
                        }
                    ?>
                </table>
            <?php
            }
            
            //si esta vacio el nombre muestra el mensaje de introducir un nombre.
            if(empty($nombre)){
                
            ?>
                <table border='1'>
                    <?php
                        foreach($agenda as $nombre => $telefono){
                            echo '<tr>','<td>',$nombre,'</td>','<td>',$telefono,'</td>','</tr>';
                        }
                    ?>
                </table>
            <?php
                echo 'Debes de introducir un nombre';
            }
            
            ?>
        
        <!--Formulario-->
        <fieldset>
            <legend>Agenda de contactos</legend>
            <form action='#' method='post'>
                <input type='text' name='nombre' placeholder='nombre'>
                <input type='text' name='telefono' placeholder='telefono'>
                <input type='hidden' name='agenda' value='<?php echo serialize($agenda);?>'>
                <input type='submit' value='Enviar'>
            </form>
        </fieldset>

    </body>
</html>
