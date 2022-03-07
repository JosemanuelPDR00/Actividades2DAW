<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="contenedorGeneral">

    <p id="parrafoSeleccion">Selecciona una familia de producto</p>
    <?php
        $conexion=new PDO('mysql:host=localhost;dbname=dwes', 'josema', '123456');
    ?>

    <div id="formulario">

    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        
        <select name="familia" id="selector">
            <?php
                $productos=$conexion->query('SELECT DISTINCT familia FROM producto');
                while($familia = $productos->fetch()){
                    echo "<option value='".$familia['familia']."'>".$familia['familia']."</option>";
                }
                $familia=null;
                $productos=null;
                $conexion=null;
            ?>    
        </select>
        <input type="submit" name="enviar" value="¡¡MOSTRAR!!" id="botonEnviar"></input>
    </form>
    </div>
    <?php
    
        if(isset($_POST['enviar'])){
            $familia=$_POST['familia'];

            $conexion=new PDO('mysql:host=localhost;dbname=dwes', 'josema', '123456');

            $sql=$conexion->query("SELECT nombre_corto,PVP FROM producto WHERE familia='$familia'");

            while($fila = $sql->fetch()){
    ?>
                <p id="opciones">Nombre Producto: <?php echo $fila['nombre_corto'] ?><br> Precio Producto: <?php echo $fila['PVP'] ?> <a href='editar.php?nombre_corto=<?php echo $fila['nombre_corto']?>'><input id="editarProducto" type='submit' name='editarProducto' value='¡¡EDITAR!!'></input></a><br><br>
    <?php
            }

            $fila=null;
            $sql=null;
        }
        $conexion=null;
    ?>
</div>
</body>
</html>