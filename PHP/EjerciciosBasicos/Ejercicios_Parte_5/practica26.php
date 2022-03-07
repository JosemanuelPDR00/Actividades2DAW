<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
    $array = [1,2,3,4,5,6,7,8,9];
    
    function volteaArrayInt($array){
        $voltea = new SplFixedArray(count($array));

        for($i=0,$j=(count($array)-1) ; $i<count($array) ; $i++,$j--){

            $voltea[$i] = $array[$j];

        }
        return $voltea;
    }
    
    echo volteaArrayInt($array);
    
    ?>
</body>
</html>