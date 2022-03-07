<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Racional</title>
</head>
<body>
    <?php
    
        include_once('./Racional.php');
    
        //Falta crear la instancia de STING
        $valor1 = new Racional(1,6);

        echo $valor1;

    ?>
</body>
</html>