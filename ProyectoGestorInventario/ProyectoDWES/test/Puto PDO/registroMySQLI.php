<?php


if (isset($_POST['enviar'])) {

    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    $comprobar = getimagesize($_FILES['imagen']['tmp_name']);
    if ($comprobar !== false) {
        $imagen = $_FILES['imagen']['tmp_name'];
        $imgDatos = addslashes(file_get_contents($imagen));

        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $cantidad = $_POST['cantidad'];
        $proveedor = $_POST['proveedor'];
        $categoria = $_POST['categoria'];
        $nif = $_POST['nif'];
        define('NOMBRE_SERVIDOR', 'localhost');
        define('NOMBRE_USUARIO', 'adminGestor');
        define('PASSWORD', 'aa');
        define('NOMBRE_BD', 'gestor');

        $conexion = new PDO('mysql:host='. NOMBRE_SERVIDOR . '; dbname=' . NOMBRE_BD, NOMBRE_USUARIO, PASSWORD);
        /*require_once("./../../app/conexion.inc.php");
        $conexion = Conexion::openConexion();*/
        try {
            $consulta = $conexion->exec("INSERT INTO Producto (Nif,cantidad,proveedor,nombreProducto,fotoProducto,categoria,precio,descripcion) VALUES ('$nif','$cantidad','$proveedor','$nombre','$imgDatos','$categoria','$precio','$descripcion')");
            if ($consulta) {
                echo "Datos subidos correctamente";
            } else {
                echo "Error";
            }
        } catch (PDOException $err) {
            echo "ERROR: " . $err->getMessage();
            exit();
        }
    }else{
        echo "todo mal";
    }
}
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
    <form action="#" method="POST" enctype="multipart/form-data">
        <input type="text" name="nombre" required>
        <br>
        <input type="number" name="cantidad" required>
        <br>
        <input type="text" name="proveedor" required>
        <br>
        <input type="text" name="categoria" required>
        <br>
        <input type="number" name="precio" required>
        <br>
        <textarea name="descripcion" id="" cols="30" rows="10" required></textarea>
        <br>
        <input type="file" name="imagen" required>
        <br>
        <input type="text" name="nif" id="" required>
        <br>
        <input type="submit" name="enviar" value="Enviar">
    </form>
</body>

</html>