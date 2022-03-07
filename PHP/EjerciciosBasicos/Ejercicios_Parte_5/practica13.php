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
        <input type="number" name="inicio" id="inicio">
        <input type="number" name="final" id="final">
        <input type="submit" value="enviar">
    </form>

    <?php
    $numeroIntro = $_POST['numeroIntro'];
    $inicio = $_POST['inicio'];
    $final = $_POST['final'];
    
    function quitaPorDetras($numeroIntro, $digito){
        
        $numeroCortar = $numeroIntro;
        $contador = 0;

        while($contador<$digito){
            $numeroCortar=floor($numeroCortar/10);
            $contador++;
        }

        return $numeroCortar;
    }

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
    
    function quitaPorDelante($numeroIntro, $digito){
        $resta = voltea($numeroIntro);
        $resta = quitaPorDetras($resta, $digito);
        $resta = voltea($resta);
        return $resta;
    }

    function trozoDeNumero($numeroIntro, $inicio, $final){
        $partir = $numeroIntro;
        $partir = quitaPorDetras($partir, $final);
        $partir = quitaPorDelante($partir, $inicio);
        return $partir;
    }

    echo trozoDeNumero($numeroIntro,$inicio,$final);
    
    ?>
</body>
</html>