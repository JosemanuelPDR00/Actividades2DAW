<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>esCapicua</title>
</head>
<body>
    <form action="#" method="POST">
        <input type="number" name="numeroIntro" id="numeroIntro">
        <input type="submit" value="enviar">
    </form>
    <?php 
    
    $numeroIntro = $_POST['numeroIntro'];

    function capicua($numeroIntro){
        $cadena="";
        for($i=0;$i<strlen($numeroIntro);$i++){
            $num=$numeroIntro[$i];
            $cadena.=$num;
        }
        $cadena=strrev($cadena);
        return $cadena;
    }

    $cadenaComparar = capicua($numeroIntro);

    if($numeroIntro==$cadenaComparar){
        echo "EL NUMERO INTRODUCIDO ES CAPICUA";
    }else{
        echo "EL NUEMRO INTRODUCIDO NO ES CAPICUA";
    }

    ?>
</body>
</html>