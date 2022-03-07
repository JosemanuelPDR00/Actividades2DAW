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
    
        try{
            $base = new PDO("mysql:host=localhost; dbname=gestor", "jose", "aa");

            $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $base->exec("SET CHARACTER SET utf8");

            //registros a mostrar
            $tamagno_paginas=3;

            //pagina que se va a mostrar
            $pagina=1;

            //cuando el usuario clickee, en un enlace de la paginacion, hace lo siguiente
            if(isset($_GET["pagina"])){
                //si pagina es == 1, me manda a la misma pagina, asi obtenemos la primera, sino
                if($_GET["pagina"]==1){

                    header("Location:paginacion.php");

                //guardamos el valor que ha clickeado, y con ese dato trabajaremos
                }else{

                    $pagina=$_GET["pagina"];

                }
            }


            
            //Epieza por 1-1*0=0
            $empezar_desde=($pagina-1)*$tamagno_paginas;

            $sql_total="SELECT Nif,nombreProducto,descripcion,precio,categoria FROM Producto";

            $resultado=$base->prepare($sql_total);

            $resultado->execute(array());

            //nemero de registros que nos dará la consulta
            $num_filas=$resultado->rowCount();

            //Con esto comprobamos el numero de paginas que vamos a tener
            $total_paginas=ceil($num_filas/$tamagno_paginas);

            echo "Numero de registros: ". $num_filas ."<br>";
            echo "Mostramos ". $tamagno_paginas." por pagina.<br>";
            echo "Mostrando la pagina ". $pagina . " de " . $total_paginas ."<br><br>";
            
            $resultado->closeCursor();
            
            $sql_limite="SELECT Nif,nombreProducto,descripcion,precio,categoria FROM Producto LIMIT $empezar_desde,$tamagno_paginas";
            
            $resultado=$base->prepare($sql_limite);
            
            $resultado->execute(array());
            
            while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
                echo "Codigo: ".$registro['Nif']."Nombre: ".$registro['nombreProducto']."Descripcion: ".$registro['descripcion']."Precio: ".$registro['precio']."Familia: ".$registro['categoria']."<br><br>";
            }


        }catch(Exception $e){

            echo "Linea de error: ".$e->getLine();

        }
    

        //------------------------------PAGINACION------------------------------------

        for($i=1;$i<=$total_paginas;$i++){

            echo "<a href='?pagina=" .$i."'>".$i."</a>  ";

        }

    ?>

</body>

</html>