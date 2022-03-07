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
        <input type="number" name="digito" id="digito">
        <input type="submit" value="enviar">
    </form>

    <?php
    $numeroIntro = $_POST['numeroIntro'];
    $digito = $_POST['digito'];

    
    function voltea($numeroIntro){
        $reves = 0;
        $inversion=$numeroIntro;
        while($inversion>0){

            $reves=$reves*10;

            $reves+= $inversion%10;

            $inversion=$inversion/10;

            $inversion=floor($inversion);
        }
        
        return $reves;
    }


    function pegaPorDelante($numero, $digito){
        $numeroCompleto = voltea($numero);
        $numeroCompleto *= 10;
        $numeroCompleto += $digito;
        $numeroCompleto = voltea($numeroCompleto);
        return $numeroCompleto;
    }

    echo pegaPorDelante($numeroIntro,$digito);
    
    ?>
</body>
</html>