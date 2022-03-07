<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Horario</title>
    </head>
    <body>
        <?php
            $curso="2WEM";
            $lunes=lunes;
            $martes=martes;
            $miercoles=miercoles;
            $jueves=jueves;
            $viernes=viernes;
            $hora1="8:25 a 9:20";
            $hora2="9:20 a 10:15";
            $hora3="10:15 a 11:10";
            $hora4="11:30 a 12:25";
            $hora5="12:25 a 13:20";
            $hora6="13:20 a 14:15";            
            $DIW= DesIntWeb;
            $DES=DesEntServidor;
            $DAW=DespliegueApWeb;
            $E=Empresas;
            $DEC=DesEntCliente;
            
            echo "<table color=red border='1'><tr><th>$Curso DAW 2021/2022</th></tr>"
                    . "<tr><td></td><td>$lunes</td><td>$martes</td><td>$miercoles</td><td>$jueves</td><td>$viernes</td></tr>"
                    . "<tr><td>$hora1</td><td>$DAW</td><td>$DES</td><td>$DES</td><td>$E</td><td>$DES</td></tr>"
                    . "<tr><td>$hora2</td><td>$DAW</td><td>$DES</td><td>$DES</td><td>$DEC</td><td>$DES</td></tr>"
                    . "<tr><td>$hora3</td><td>$DEC</td><td>$DIW</td><td>$E</td><td>$DEC</td><td>$DIW</td></tr>"
                    . "<tr><td>R</td><td>E</td><td>C</td><td>R</td><td>E</td><td>O</td></tr>"
                    . "<tr><td>$hora4</td><td>$DEC</td><td>$DIW</td><td>$DAW</td><td>$DIW</td><td>$DIW</td></tr>"
                    . "<tr><td>$hora5</td><td>$DES</td><td>$DEC</td><td>$DAW</td><td>$DIW</td><td>$E</td></tr>"
                    . "<tr><td>$hora6</td><td>$DES</td><td>$DEC</td><td>$DIW</td><td>$DAW</td><td>$DIW</td></tr>"
        ?>
    </body>
</html>
