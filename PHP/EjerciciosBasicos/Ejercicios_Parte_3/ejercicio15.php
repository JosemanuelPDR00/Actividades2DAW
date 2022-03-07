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
        <h2>Juego de la Infidelidad, responde con Verdadero o Falso.</h2><br>
        <form action="#" method="get">
            <h3>1. Tu pareja parece estar más inquieta de lo normal sin ningún motivo aparente.</h3>
            <input type="text" name="preg1">
            <h3>2. Ha aumentado sus gastos de vestuario.</h3>
            <input type="text" name="preg2">
            <h3>3. Ha perdido el interés que mostraba anteriormente por ti.</h3>
            <input type="text" name="preg3">
            <h3>4. Ahora se afeita y se asea con más frecuencia (si es hombre) o ahora se arregla el pelo y se asea con más frecuencia (si es mujer).</h3>
            <input type="text" name="preg4">
            <h3>5. No te deja que mires la agenda de su teléfono móvil.</h3>
            <input type="text" name="preg5">
            <h3>6. A veces tiene llamadas que dice no querer contestar cuando estás tú delante.</h3>
            <input type="text" name="preg6">
            <h3>7. Últimamente se preocupa más en cuidar la línea y/o estar bronceado/a.</h3>
            <input type="text" name="preg7">
            <h3>8. Muchos días viene tarde después de trabajar porque dice tener mucho más trabajo.</h3>
            <input type="text" name="preg8">
            <h3>9. Has notado que últimamente se perfuma más.</h3>
            <input type="text" name="preg9">
            <h3>10. Se confunde y te dice que ha estado en sitios donde no ha ido contigo.</h3>
            <input type="text" name="preg10"><br><br>

            <input type="submit" value="Enviar">
            
        </form>
        <br>
        <?php
            $preg1= $_GET['preg1'];
            $preg1= strtolower($preg1);
            $preg2= $_GET['preg2'];
            $preg2= strtolower($preg2);
            $preg3= $_GET['preg3'];
            $preg3= strtolower($preg3);
            $preg4= $_GET['preg4'];
            $preg4= strtolower($preg4);
            $preg5= $_GET['preg5'];
            $preg5= strtolower($preg5);
            $preg6= $_GET['preg6'];
            $preg6= strtolower($preg6);
            $preg7= $_GET['preg7'];
            $preg7= strtolower($preg7);
            $preg8= $_GET['preg8'];
            $preg8= strtolower($preg8);
            $preg9= $_GET['preg9'];
            $preg9= strtolower($preg9);
            $preg10= $_GET['preg10'];
            $preg10= strtolower($preg10);
            
            $puntuacion=0;
            
            if($preg1=="verdadero"){
                $puntuacion= $puntuacion+3;
            }else{
                $puntuacion= $puntuacion+0;
            }
            
            if($preg2=="verdadero"){
                $puntuacion= $puntuacion+3;
            }else{
                $puntuacion= $puntuacion+0;
            }
            
            if($preg3=="verdadero"){
                $puntuacion= $puntuacion+3;
            }else{
                $puntuacion= $puntuacion+0;
            }
            
            if($preg4=="verdadero"){
                $puntuacion= $puntuacion+3;
            }else{
                $puntuacion= $puntuacion+0;
            }
            
            if($preg5=="verdadero"){
                $puntuacion= $puntuacion+3;
            }else{
                $puntuacion= $puntuacion+0;
            }
            
            if($preg6=="verdadero"){
                $puntuacion= $puntuacion+3;
            }else{
                $puntuacion= $puntuacion+0;
            }
            
            if($preg7=="verdadero"){
                $puntuacion= $puntuacion+3;
            }else{
                $puntuacion= $puntuacion+0;
            }
            
            if($preg8=="verdadero"){
                $puntuacion= $puntuacion+3;
            }else{
                $puntuacion= $puntuacion+0;
            }
            
            if($preg9=="verdadero"){
                $puntuacion= $puntuacion+3;
            }else{
                $puntuacion= $puntuacion+0;
            }
            
            if($preg10=="verdadero"){
                $puntuacion= $puntuacion+3;
            }else{
                $puntuacion= $puntuacion+0;
            }
            
            if($puntuacion<=10){
                echo "Tu pareja es fiel a ti, no te preocupes.";
            }elseif($puntuacion<23){
                echo "Ten cuidado, puede que en la vida de tu pareja haya otra persona.";
            }else{
                echo "Tu pareja seguramente tenga a alguien mas en su vida.";
            }
            
        ?>
    </body>
</html>