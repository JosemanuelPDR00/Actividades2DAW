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
        <input type="number" name="numRotacion" id="numRotacion">
        <input type="submit" value="enviar">
    </form>

    <?php
    $numRotacion = $_POST['numRotacion'];
    $array = [2,4,6,8,10,12,20];

    function rotaIzquierdaArrayInt($array, $numRotacion){
        for($i=0;$i<$numRotacion;$i++){
            array_push($array,array_shift($array));
        }
        return $array;
    }

    function rotaDerechaArrayInt($array, $numRotacion){
        for($i=0;$i<$numRotacion;$i){
            $last = array_pop($array);
            array_unshift($array, $last);
        }
        return $array;
    }

    echo ": IZQUIERDA". var_dump(rotaIzquierdaArrayInt($array,$numRotacion))."<br>";
    echo ": DERECHA".var_dump(rotaDerechaArrayInt($array,$numRotacion));

    
    ?>
</body>
</html>