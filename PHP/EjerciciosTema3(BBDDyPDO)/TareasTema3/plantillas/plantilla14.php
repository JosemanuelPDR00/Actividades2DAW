<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Plantilla para Ejercicios Tema 3</title>
    <link href="dwes.css" rel="stylesheet" type="text/css">
</head>

<body>

	<?php

		$dwes = new PDO('mysql:host=localhost;dbname=dwes', 'dwes', '123456');

		$ok=true;
        $dwes->beginTransaction();
        if($dwes->exec("UPDATE stock SET unidades=1 WHERE producto='PAPYRE62GB' AND tienda=1")==0){
            $ok=false;
        }
        if($dwes->exec("INSERT INTO stock(producto,tienda,unidades) VALUES ('PAPYRE62GB',2,1)")==0){
            $ok=false;
        }

        if($ok){
            echo "Se ha guardado correctamente";
            $dwes->commit();
        }else{
            echo "Se cancelado la inserccion.";
            $dwes->rollBack();
        }
        
		$dwes=null;

	?>

</body>
</html>