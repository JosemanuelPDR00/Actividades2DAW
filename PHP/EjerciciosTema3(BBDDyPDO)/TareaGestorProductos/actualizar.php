<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Producto</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        if(isset($_POST['cancelar'])){
            header("location:./listado.php");
        }
        
        $codigo = $_POST['codigo'];
        $nombreCorto = $_POST['nombreCorto'];
        $nombreProducto = $_POST['nombreProducto'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        
        $conexion = new PDO('mysql:host=localhost;dbname=dwes', 'josema', '123456');
        
        if(isset($_POST['editar'])){
            $productoActualizado = $conexion->exec("UPDATE producto SET nombre_corto='$nombreCorto', nombre='$nombreProducto', descripcion='$descripcion', PVP='$precio' WHERE cod='$codigo'");
            $productoActualizado=null;
            $conexion=null;
            header("location:./listado.php");
        }
    ?>
</body>
</html>