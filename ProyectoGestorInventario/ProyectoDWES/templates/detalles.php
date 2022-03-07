<?php
// Configuramos la salida de errores para que se muestren todos
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="witdh=device,initial-scale=1.0">
    <meta name="lang" content="es-ES">
    <meta name="author" content="Emilio">
    <meta name="keywords" content="computers,programming,web design,html,html,html5,css,php">
    <meta name="description" content="Realización de los detalles del producto del gestor de inventario">
    <!-- Este script es necesario para que funcione la generación del código QR -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Detalles</title>
    <link rel="stylesheet" href="./../../css/detalles.css" title="style">
    <link rel="icon" type="image/png" href="./../img/LOGO.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Exo:wght@300&family=Lacquer&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Exo:wght@700&display=swap" rel="stylesheet">

</head>

<body>
    <!-- Menu hamburguesa -->
    <input type="checkbox" id="invisibleCheckbox">
    <div id="contenedorHamburguesa">
        <span class="lineaHamburguesa" id="linea1"></span>
        <span class="lineaHamburguesa" id="linea2"></span>
        <span class="lineaHamburguesa" id="linea3"></span>
    </div>
    <?php
        //Vamos a recoger el array creado en gestorLogica y mostrar la tabla
        foreach($users as $dato):
    ?>
    <nav id="barraDesplegable">
        <img class="fotoPerfil" src="data:image/png;charset=utf8;base64,<?php echo base64_encode($dato['foto']); ?>"
            alt="imagenProducto">
        <span id="nombreUsuario"><?php echo $dato['nombre']?></span>
        <li class="apartados"><a href="./../../templates/registroProducto.html">Registrar Producto</a></li>
        <li class="apartados"><a
                href="./../../templates/solicitarProducto.php?nif=<?php echo $fetchDatos['Nif'] ?>">Solicitar
                Producto</a></li>
        <li class="apartados"><a href="./gestorLogica.php">Ver Productos</a></li>
        <li class="apartados"><a href="./login.php?close=close">Cerrar sesion</a></li>
    </nav>
    <?php
        endforeach;
    ?>

    <!-- Logo -->
    <div class="logo"><img src="./../../img/LOGO.png" alt="LOGO"></div>

    <!-- Contenido de la página -->
    <div class="contenido">
        <div class="imagen">
            <img src="data:image/png;charset=utf8;base64,<?php echo base64_encode($fetchDatos['fotoProducto']); ?>"
                alt="imagenProducto">
        </div>
        <div class="datos">
            <div class="nombre"><?php echo $fetchDatos['nombreProducto']; ?></div>
            <div class="precio"><?php echo $fetchDatos['precio']; ?>€</div>
            <div class="unidades"><?php echo $fetchDatos['cantidad']; ?></div>
            <div class="descripcion"><?php echo $fetchDatos['descripcion']; ?></div>
        </div>
        <div class="formularios">
            <form id="generarQR" action="" onsubmit="return false">
                <input class="boton qr" type="submit" value="Generar QR">
                <input id="nombre" type="hidden" value="<?php echo $fetchDatos['nombreProducto']; ?>">
                <input id="precio" type="hidden" value="<?php echo $fetchDatos['precio']; ?>€">
                <input id="cantidad" type="hidden" value="<?php echo $fetchDatos['cantidad']; ?>">
                <input id="descripcion" type="hidden" value="<?php echo $fetchDatos['descripcion']; ?>">
                <!-- Aquí mostraremos cuando el usuario clickee el código QR -->
                <div class="codigoQR"></div>
            </form>
            <form action="./../../templates/solicitarProducto.php" method="get">
                <input type="hidden" name="nif" value="<?php echo $fetchDatos['Nif'] ?>">
                <input class=" boton pedido" type="submit" value="Hacer pedido">
            </form>
        </div>
    </div>
    <script>
    // Usamos AJAX para hacer que en el div se genere el QR con los datos que le hemos pasado de forma oculta por el formulario
    $(document).ready(function() {
        $("#generarQR").submit(function() {
            $.ajax({
                url: './generarQR.php',
                type: 'POST',
                data: {
                    nombre: $('#nombre').val(),
                    precio: $('#precio').val(),
                    cantidad: $('#cantidad').val(),
                    descripcion: $('#descripcion').val(),
                },
                success: function(respuesta) {
                    $(".codigoQR").html(respuesta);
                },
            });
        });
    });
    </script>
</body>

</html>