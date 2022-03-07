<?php 

if(isset($_GET['nif'])){

    $nif = $_GET['nif'];

    //accedemos al archivo para hacer la conexion a base de datos
    require_once("./../db/conexion.inc.php");
    $conexion = Conexion::openConexion();
    
    //consulta para obtener los datos del producto
    $datosProducto = $conexion->query("SELECT * FROM Producto WHERE nif='$nif'");
    //$fetchDatos = $datosProducto->fetch();
    $fetchDatos = $datosProducto->fetch(PDO::FETCH_ASSOC);
    
    $datosUser="SELECT nombre,foto FROM Usuario";

        $usuario=$conexion->prepare($datosUser);
        $usuario->execute(array());
        
        while($info=$usuario->fetch(PDO::FETCH_ASSOC)){
            $users[]=$info;
        }
    //se muestran los daots del producto
    //Llamamos a la vista (detalles.php)
    require('./../../templates/detalles.php');
}   