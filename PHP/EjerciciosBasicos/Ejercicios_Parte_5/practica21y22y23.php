<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Minimo y Maximo del Array</h1>

    <?php
    $array = [2,5,8,9,255,15,334];
    
    function minimoArrayInt($array){
        $minimo = $array[0];
        foreach($array as $numero){
            if($numero < $minimo){
                $minimo = $numero;
            }
        }
        return $minimo;
    }

    function maximoArrayInt($array){
        $maximo = $array[0];
        foreach($array as $numero){
            if($numero > $maximo){
                $maximo = $numero;
            }
        }
        return $maximo;
    }

    function mediaArrayInt($array){
        $total=0;
        $media=0;
        foreach($array as $num){
            $total+= $num;
        }
        $media=$total/count($array);
        return $media;
    }




    echo "Minimo: ".minimoArrayInt($array)."<br>";
    echo "Maximo: ".maximoArrayInt($array)."<br>";
    echo "Media:".mediaArrayInt($array);
    
    ?>
</body>
</html>