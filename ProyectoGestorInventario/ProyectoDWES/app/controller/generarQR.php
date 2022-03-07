<?php
    // Hacemos la muestra de errores, en caso de que los hubiera
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    // Recogemos todas las variables enviadas por POST
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];
    $descripcion = $_POST['descripcion'];

    // Creamos una variable con todo el texto que queremos que aparezca en el QR
    $textoQR = "Nombre del producto: ".$nombre." || Precio: ".$precio." || Cantidad: ".$cantidad." || Descripcion: ".$descripcion;

    // Hacemos un urlencode para poder meter la información en el QR que escanee el usuario
    $textoLink = urlencode($textoQR);
    echo '<img src="http://api.qrserver.com/v1/create-qr-code/?data='.$textoLink.'&size=200x200&bgcolor=EDF2EF">';
?>