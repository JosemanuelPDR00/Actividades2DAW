<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>siguientePrimo</title>
</head>
<body>
    <form action="#" method="POST">
        <input type="number" name="numeroIntro" id="numeroIntro">
        <input type="submit" value="enviar">
    </form>
    <?php
    
    $numeroIntro = $_POST['numeroIntro'];
    
    function siguientePrimo($numeroIntro){

        $siguiente  = $numeroIntro;
        $confirma_primo = true;
        $primo = 0;

        while($primo == 0){
            $siguiente ++;

            for($i=2; $i<$siguiente; $i++){
                if(($siguiente % $i) == 0){
                    $confirma_primo = false;
                }
            }

            if($confirma_primo == true){
                $primo = $siguiente;
            }else{
                $confirma_primo = true;
            }
        }
        return $primo;
    }
    
    echo siguientePrimo($numeroIntro);
    
    ?>
</body>
</html>