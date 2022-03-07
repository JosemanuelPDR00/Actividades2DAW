<?php 
error_reporting(E_ALL);
ini_set('display_errors', '1');
    $nif = "015X";

    //accedemos al archivo para hacer la conexion a base de datos
    require_once("./../app/conexion.inc.php");
    $conexion = Conexion::openConexion();
    
    //consulta para obtener los datos del producto
    try{
        $datosProducto = $conexion->query("SELECT * FROM Producto WHERE Nif='$nif'");
        $fetchDatos = $datosProducto->fetch(PDO::FETCH_ASSOC);
        ?>
<img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($fetchDatos['fotoProducto']); ?>">

<?php
        
    }catch(PDOException $err){
        echo $err->getMessage();
    }
    
   // var_dump($fetchDatos);
    //se muestran los daots del producto
    //Llamamos a la vista (detalles.php)
  
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
//header("Content-type: image/png");
//echo $fetchDatos['fotoProducto'];
//var_dump($fetchDatos['fotoProducto']);
    ?>
</body>
<div class="galeria">
</div>

</html>