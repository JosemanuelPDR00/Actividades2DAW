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
    
    function posicionDeDigito($numero, $digito){
        
        $posicion = -1;
        $contar = $numero;
        $operacion = $numero;
        $longitud = -1;
        $cifra = 0;

        while($contar > 0){

            $contar = $contar / 10;
            $contar = floor($contar);
            $longitud ++;
        }

        while($operacion > 0){

            $cifra=$operacion % 10;

            if($cifra==$digito){
                $posicion=$longitud;
            }

            $operacion=$operacion / 10;
            $operacion=floor($operacion);
            $longitud --;
        }

        return $posicion;
    }

    echo posicionDeDigito($numeroIntro,$digito);
    
    ?>
</body>
</html>