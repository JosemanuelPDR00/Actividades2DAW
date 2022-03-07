<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Potencia</title>
</head>
<body>
    <form action="#" method="POST">
        BASE:<input type="number" name="base" id="base">
        
        Exponente<input type="number" name="exponente" id="exponente">
        
        <input type="submit" value="enviar">
    </form>
    <br>RESULTADO: 

    <?php
    
    $base = $_POST['base'];
    $exponente = $_POST['exponente'];
    
    function potencia ($base, $exponente){

        $potencia=1;

        for($i=0; $i<$exponente; $i++){
            $potencia *= $base;
        }

        return $potencia;
    }
    
    echo potencia($base,$exponente);
    
    ?>
</body>
</html>