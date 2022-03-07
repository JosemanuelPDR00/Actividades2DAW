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
    
    function quitaPorDetras($numeroIntro, $digito){
        
        $numeroCortar = $numeroIntro;
        $contador = 0;

        while($contador<$digito){
            $numeroCortar=floor($numeroCortar/10);
            $contador++;
        }

        return $numeroCortar;
    }

    echo quitaPorDetras($numeroIntro,$digito)
    ?>
</body>
</html>