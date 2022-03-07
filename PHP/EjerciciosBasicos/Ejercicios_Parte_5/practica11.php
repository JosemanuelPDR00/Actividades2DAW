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
    
    function pegaPorDetras($numeroIntro, $digito){
        $numero = $numeroIntro;
        $numero *= 10;
        $numero += $digito;
        return $numero;
    }

    echo pegaPorDetras($numeroIntro,$digito);
    
    ?>
</body>
</html>