<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor</title>
    <link rel="stylesheet" href="../.././css/styleInicio.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Exo:wght@300&family=Lacquer&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Exo:wght@700&display=swap" rel="stylesheet">
</head>

<body>
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
        <li class="apartados"><a href="./login.php?close=close">Cerrar sesion</a></li>
    </nav>
    <?php
        endforeach;
    ?>
    <main id="contenedorTexto">

        <div id="contenedorLogo">
            <img src="../.././img/LOGO.png" alt="LOGO" id="imagenLogo">
        </div>

        <div id="contenedorTabla">
            <table>
                <tr>
                    <th>Nombre</th>
                    <th>Proveedor</th>
                    <th>Categoría</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Detalles</th>
                </tr>
                <?php
                    //Vamos a recoger el array creado en gestorLogica y mostrar la tabla
                    foreach($articulos as $articulo):
                ?>
                <tr>
                    <td><?php echo $articulo['nombreProducto']; ?></td>
                    <td><?php echo $articulo['proveedor']; ?></td>
                    <td><?php echo $articulo['categoria']; ?></td>
                    <td><?php echo $articulo['cantidad']; ?> uds.</td>
                    <td><?php echo $articulo['precio']; ?> €</td>
                    <td><a href="./detallesProducto.php?nif=<?php echo $articulo['Nif']; ?>">Detalles</a>
                    </td>
                </tr>
                <?php
                    endforeach;
                ?>
            </table>
            <?php 
            for($i=1;$i<=$total_paginas;$i++){

                echo "<a href='?pagina=" .$i."'>".$i."</a>  ";
    
            }
            ?>
        </div>

    </main>

</body>

</html>