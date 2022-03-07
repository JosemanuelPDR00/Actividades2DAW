<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="JoseManuel Perez del Rio">
    <meta name="description" content="Proyecto 2 Desarrollo Interfaces Web">
    <title>recogidaPHP</title>
    <link rel="icon" type="imagen/x-icon" href="./img/lechuga.png" sizes="32x32">
</head>
<body>
    <?php
        $nombre = $_POST['nombre'];
        $apellido1 = $_POST['apellido1'];
        $apellido2 = $_POST['apellido2'];
        $correo = $_POST['correo'];
        $telefono = $_POST['telefono'];
        $fechanacimiento = $_POST['fechanacimiento'];
        $paisnacimiento = $_POST['paisnacimiento'];
        $genero = $_POST['genero'];

        echo "Nombre: ",$nombre,"<br>Primer apellido: ",$apellido1,"<br>Segundo apellido: ",$apellido2,
        "<br>Correo: ",$correo,"<br>Telefono: ",$telefono,"<br>Fecha nacimiento: ",$fechanacimiento,
        "<br>Pais nacimiento: ",$paisnacimiento,"<br>Genero: ",$genero;
    ?>
</body>
</html>