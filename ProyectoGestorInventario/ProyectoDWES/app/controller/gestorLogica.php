<?php
    ini_set('display_errors',1);
    error_reporting(E_ALL);
    require_once("./../db/conexion.inc.php");
    $conexion = Conexion::openConexion();
    
    try{
        //registros a mostrar
        $tamagno_paginas=5;

        //pagina que se va a mostrar
        $pagina=1;

        //cuando el usuario clickee, en un enlace de la paginacion, hace lo siguiente
        if(isset($_GET["pagina"])){
            //si pagina es == 1, me manda a la misma pagina, asi obtenemos la primera, sino
            if($_GET["pagina"]==1){

                header("Location:gestorLogica.php");

            //guardamos el valor que ha clickeado, y con ese dato trabajaremos
            }else{
                $pagina=$_GET["pagina"];
            }
        }

        //Epieza por 1-1*0=0
        $empezar_desde=($pagina-1)*$tamagno_paginas;

        $sql_total="SELECT Nif,cantidad,proveedor,nombreProducto,categoria,precio FROM Producto";

        $resultado=$conexion->prepare($sql_total);
        $resultado->execute(array());

        //numero de registros que nos dará la consulta
        $num_filas=$resultado->rowCount();

        //Con esto comprobamos el numero de paginas que vamos a tener
        $total_paginas=ceil($num_filas/$tamagno_paginas);

        $resultado->closeCursor();
        
        $sql_limite="SELECT Nif,cantidad,proveedor,nombreProducto,categoria,precio FROM Producto LIMIT $empezar_desde,$tamagno_paginas";
        
        $resultado=$conexion->prepare($sql_limite);
        $resultado->execute(array());
        
        while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
            $articulos[]=$registro;
        }

        $datosUser="SELECT nombre,foto FROM Usuario";

        $usuario=$conexion->prepare($datosUser);
        $usuario->execute(array());
        
        while($info=$usuario->fetch(PDO::FETCH_ASSOC)){
            $users[]=$info;
        }
        
    }catch(PDOException $err){
        echo "Error consultando la base de datos ". $err->getMessage();
        die();
    }
    $conexion = Conexion::closeConexion();
    require('./../../templates/gestor.php');
    
    
    