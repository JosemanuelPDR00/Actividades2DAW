<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="#" method="POST">
        <input type="number" name="numeroIntro" id="numeroIntro">
        <input type="number" name="numeroIntro2" id="numeroIntro2">
        <input type="submit" value="enviar">
    </form>

    <?php
    $numeroIntro = $_POST['numeroIntro'];
    $numeroIntro2 = $_POST['numeroIntro2'];
    
    function juntaNumeros($numeroIntro,$numeroIntro2){

        $numeroAgregado = '';
        
        for ( $i=0;$i<1;$i++){
            $numeroAñadido  = $numeroIntro. $numeroIntro2;
            $numeroAgregado .= $numeroAñadido;
        }
        return $numeroAgregado;
    }

    echo juntaNumeros($numeroIntro,$numeroIntro2);
    
    ?>
</body>
</html>