

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
    $array = [256,215,47741,87458,9995,62666,407,854854,622];
    $numero = $_POST['numeroIntro'];

    function estaEnArrayInt($array, $numero){
        $comprobacion = false;
        foreach($array as $valor){
            if($valor == $numero){
                $comprobacion = true;
            }
        }
        return $comprobacion;
    }

    function posicionEnArray($array, $numero){
        $posicion = 0;
        foreach($array as $pos => $valor){
            if($valor == $numero){
                $posicion = $pos;
                break;
            }
        }
        return $posicion;
    }

    echo "Esta en el array: ".estaEnArrayInt($array,$numero)."<br>";
    echo "Posicion del numero en el array: ". posicionEnArray($array,$numero);
    
    ?>
</body>
</html>