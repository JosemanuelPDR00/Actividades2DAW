<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRACTICA 5</title>
</head>
<body>
    <form action="#" method="POST">
        <input type="number" name="numeroIntro" id="numeroIntro">
        <input type="submit" value="enviar">
    </form>

    <?php

    $numeroIntro = $_POST['numeroIntro'];
    
    function digitos($numeroIntro){
        $dig=0;
        $contador = $numeroIntro;
        while($contador>0){
            $contador = $contador/10;
            $contador = floor($contador);
            $dig++;
        }
        return $dig;
    }

    echo digitos($numeroIntro);
    
    ?>
</body>
</html>