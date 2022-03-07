<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

if(isset($_POST['enviar'])){
    $comprobar = getimagesize($_FILES['imagen']['tmp_name']);
    if($comprobar !== false){
        if (isset($_POST['nombre']) && isset($_POST['cantidad']) && isset($_POST['proveedor']) && isset($_POST['categoria']) && isset($_POST['precio']) && isset($_POST['descripcion']) && isset($_POST['nif'])) {
            $imagen = $_FILES['imagen']['tmp_name'];
            $imgDatos = addslashes(file_get_contents($imagen));

            $nombre = $_POST['nombre'];
            $cantidad = $_POST['cantidad'];
            $proveedor = $_POST['proveedor'];
            $categoria = $_POST['categoria'];
            $precio = $_POST['precio'];
            $descripcion = $_POST['descripcion'];
            $nif = $_POST['nif'];

            //require_once("./../../app/conexion.inc.php");
            //$conexion = Conexion::openConexion();
            //Por alguna ESTUPIDA RAZÓN si llamo a los archivos de configuración la subida de la imagen no es correcta
            //Si uso los datos COPIADOS DESDE EL MISMO ARCHIVO FUNCIONA
            //ESTO QUÉ COJONES ES
            define('NOMBRE_SERVIDOR', 'localhost');
            define('NOMBRE_USUARIO', 'adminGestor');
            define('PASSWORD', 'aa');
            define('NOMBRE_BD', 'gestor');

            $conexion = new PDO('mysql:host='. NOMBRE_SERVIDOR . '; dbname=' . NOMBRE_BD, NOMBRE_USUARIO, PASSWORD);

            //Primero comprobamos si el producto existe en la base de datos
            $existe = $conexion->query("SELECT cantidad FROM Producto WHERE Nif='$nif'");
            if($registro = $existe->fetch()){
                //Si existe, recogemos la cantidad que ya existe de ese producto y la actualizamos
                $cantidad += $registro['cantidad'];
                try{
                    $actualizar = $conexion->exec("UPDATE Producto SET cantidad='$cantidad' WHERE Nif='$nif'");
                }catch(PDOException $err){
                    echo "Error actualizando el producto: " . $err->getMessage();
                    
                }
            }else{
                //Si no existe, creamos un nuevo producto
                try{
                    $insertar = $conexion->exec("INSERT INTO Producto (Nif,cantidad,proveedor,nombreProducto,fotoProducto,categoria,precio,descripcion) VALUES ('$nif','$cantidad','$proveedor','$nombre','$imgDatos','$categoria','$precio','$descripcion')");
                }catch (PDOException $err){
                    echo "Error insertando el producto: " . $err->getMessage();
                }
            }
        }
    }
}

header("Location: ./gestorLogica.php");