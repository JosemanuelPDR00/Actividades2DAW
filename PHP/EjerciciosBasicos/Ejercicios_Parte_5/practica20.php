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
        Minimo:<input type="number" name="minimo" id="minimo">
        Maximo:<input type="number" name="maximo" id="maximo">
        Tamaño:<input type="number" name="tamaño" id="tamaño">
        <input type="submit" value="enviar">
    </form>

    <?php
    $minimo = $_POST['minimo'];
    $maximo = $_POST['maximo'];
    $tamaño = $_POST['tamaño'];
    
    function generaArrayInt($minimo, $maximo, $tamaño){
        $array = new SplFixedArray($tamaño);
        for($i = 0; $i < $tamaño; $i++){
            $array[$i] = rand($minimo, $maximo);
        }
        return $array;
    }
    
    var_dump(generaArrayInt($minimo, $maximo, $tamaño));

    ?>
</body>
</html>