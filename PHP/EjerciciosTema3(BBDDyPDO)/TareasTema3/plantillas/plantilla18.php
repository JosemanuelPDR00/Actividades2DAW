<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRACTICA18</title>
</head>
<body>
    <?php
        $conexion=new PDO('mysql:host=localhost;dbname=dwes', 'josema', '123456');
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <label for="producto">Selecciona un producto</label>
        <select name="producto">
            <?php
                $productos=$conexion->query('SELECT cod,nombre_corto FROM producto');
                while($producto = $productos->fetch()){
                    echo "<option value='".$producto['cod']."'>".$producto['nombre_corto']."</option>";
                }
                $producto=null;
                $productos=null;
            ?>
        </select>
        
        <br><br>
        
        <label for="tienda">Selecciona una tienda</label>
        <select name="tienda">
            <?php
                $tiendas=$conexion->query('SELECT nombre,cod FROM tienda');
                while($tienda = $tiendas->fetch()){
                    echo "<option value='".$tienda['cod']."'>".$tienda['nombre']."</option>";
                }
                $tienda=null;
                $tiendas=null;
            ?>
        </select>
        
        <br><br>
        
        <label for="unidades">Introduce las unidades</label>
        <input type="number" name="unidades">
        
        <br><br>

        <input type="submit" name="enviar" value="ENVIAR"></input>
    </form>
    <?php
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
    ?>
</body>
</html>