<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/registroProducto.css">
</head>

<body>
    <div id="contenedorImagen">
        <img src="../img/LOGO.png" alt="Logo">
    </div>
    <h2>REGISTRA UN NUEVO PRODUCTO</h2>
    <form action="./../app/controller/solicitarProducto.php" method="post" enctype="multipart/form-data">
        <input type="number" name="unidades" placeholder="Unidades" required>
        <input type="hidden" value="<?php echo $_GET['nif'] ?>" name="nif" required>
        <input type="submit" name="solicitud" id="registro" value="Registrar Producto">
    </form>
</body>

</html>