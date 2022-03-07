<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRACTICA19</title>
</head>
<body>
    <?php
    try{
        $conexion=new PDO('mysql:host=localhost;dbname=dwes', 'josema', '123456');
    }catch(PDOException $e){
        echo "Se ha producido un error en la conexion".$e->getMessage(); 
        exit();
    }
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <label for="producto">Selecciona un producto</label>
        <select name="producto">
            <?php
                try{
                    $productos=$conexion->query('SELECT cod,nombre_corto FROM producto');
                    while($producto = $productos->fetch()){
                        echo "<option value='".$producto['cod']."'>".$producto['nombre_corto']."</option>";
                    }
                    $producto=null;
                    $productos=null;
                }catch(PDOException $e){
                    echo "Se ha producido un error en la seleccion del producto ".$e->getMessage();
                    exit();
                }
            ?>
        </select>
        
        <br><br>
        
        <label for="tienda">Selecciona una tienda</label>
        <select name="tienda">
            <?php
                try{
                    $tiendas=$conexion->query('SELECT nombre,cod FROM tienda');
                    while($tienda = $tiendas->fetch()){
                        echo "<option value='".$tienda['cod']."'>".$tienda['nombre']."</option>";
                    }
                    $tienda=null;
                    $tiendas=null;
                }catch(PDOException $e){
                    echo "Se ha producido un error en la seleccion de la tienda ".$e->getMessage();
                    exit();
                }
            ?>
        </select>
        
        <br><br>
        
        <label for="unidades">Introduce las unidades</label>
        <input type="number" name="unidades">
        
        <br><br>

        <input type="submit" name="enviar" value="ENVIAR"></input>
    </form>
    <?php
    try{
        if(isset($_POST['enviar'])&&isset($_POST['unidades'])){
            
            $producto=$_POST['producto'];
            $tienda=$_POST['tienda'];
            $unidades=$_POST['unidades'];
            
            $consultaExiste=$conexion->query('SELECT producto,tienda,unidades FROM stock WHERE producto="'.$producto.'" AND tienda="'.$tienda.'"');
            if($mostrar=$consultaExiste->fetch()){
                $consultaActualizar = $conexion->prepare('UPDATE stock SET unidades=:unidades WHERE tienda=:tienda AND producto=:producto');
                $consultaActualizar->bindParam(":unidades",$unidades);
                $consultaActualizar->bindParam(":tienda",$tienda);
                $consultaActualizar->bindParam(":producto",$producto);
                $consultaActualizar->execute();
            }else{
                $consultaInsertar = $conexion->prepare('INSERT INTO stock VALUES (:producto, :tienda, :unidades)');
                $consultaInsertar->bindParam(":producto", $producto);
                $consultaInsertar->bindParam(":tienda", $tienda);
                $consultaInsertar->bindParam(":unidades", $unidades);
                $consultaInsertar->execute();
            }
        }
        $conexion = null;
    }catch(PDOException $e){
        echo "Se ha producido un error en la operacion ".$e->getMessage();
        exit();
    }
    ?>
</body>
</html>