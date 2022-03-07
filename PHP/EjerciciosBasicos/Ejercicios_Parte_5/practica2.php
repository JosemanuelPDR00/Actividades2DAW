<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>esPrimo</title>
</head>
<body>
    <form action="#" method="POST">
        <input type="number" name="numeroIntro" id="numeroIntro">
        <input type="submit" value="enviar">
    </form>
    <?php 
    
    $numeroIntro = $_POST['numeroIntro'];

    function esPrimo($numeroIntro){
        $num=$numeroIntro;
        
        if($num==2||$num==3||$num==5){
            return true;
        }else if($num%2==0||$num%3==0||$num%5==0){
            return false;
        }else{
            return true;
        }
    }

    if(esPrimo($numeroIntro)){
        echo "El numero introducido es PRIMO";
    }else{
        echo "El numero introducido NO es PRIMO";
    }

    ?>
</body>
</html>