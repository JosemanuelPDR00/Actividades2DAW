<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Tabla de traducción</title>
    </head>
    <body>
        <table>
            <?php
            $intro1=español;
            $intro2=ingles;
            
            $palabra1=coche;
            $palabra2=autobus;
            $palabra3=moto;
            $palabra4=casa;
            $palabra5=perro;
            $palabra6=gato;
            $palabra7=ordenador;
            $palabra8=raton;
            $palabra9=teclado;
            $palabra10=mesa;
            
            $traduccion1=car;
            $traduccion2=bus;
            $traduccion3=moped;
            $traduccion4=home;
            $traduccion5=dog;
            $traduccion6=cat;
            $traduccion7=computer;
            $traduccion8=mouse;
            $traduccion9=keyboard;
            $traduccion10=table;
            
            echo "<table border='1'><tr><th>$intro1</th><th>$intro2</th></tr>"
                    . "<tr><td>$palabra1</td><td>$traduccion1</td></tr>"
                    . "<tr><td>$palabra2</td><td>$traduccion2</td></tr>"
                    . "<tr><td>$palabra3</td><td>$traduccion3</td></tr>"
                    . "<tr><td>$palabra4</td><td>$traduccion4</td></tr>"
                    . "<tr><td>$palabra5</td><td>$traduccion5</td></tr>"
                    . "<tr><td>$palabra6</td><td>$traduccion6</td></tr>"
                    . "<tr><td>$palabra7</td><td>$traduccion7</td></tr>"
                    . "<tr><td>$palabra8</td><td>$traduccion8</td></tr>"
                    . "<tr><td>$palabra9</td><td>$traduccion9</td></tr>"
                    . "<tr><td>$palabra10</td><td>$traduccion10</td></tr>"
            
            
            ?>            
        </table>
    </body>
</html>
