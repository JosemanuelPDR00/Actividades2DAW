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
        <input type="submit" value="enviar">
    </form>

    <?php
    $numeroIntro = $_POST['numeroIntro'];
    
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

    echo voltea($numeroIntro);
    
    ?>
</body>
</html>