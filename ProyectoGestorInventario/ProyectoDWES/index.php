<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <div id="logo">
        <img src="./img/LOGO.png" alt="logo">
    </div>
    <div id="contenedorGeneral">
        <form id="contenedorInfo" action="./app/controller/login.php" method="POST" enctype="multip">
            <input type="text" name="correo" id="usuario" placeholder="Correo electrónico" required>
            <input type="password" name="passwd" id="contraseña" placeholder="Contraseña" required>
            <div>
                <input type="checkbox" name="recuerdame" id="recuerdame">
                <label for="recuerdame">Recuerdame</label>
            </div>
            <input type="submit" name="submit" value="Iniciar" id="login">
            <div id="registro">
                <p>¿No tienes cuenta? <a href="./templates/crearUsuario.html">Registrate</a></p>
            </div>
        </form>
    </div>
</body>

</html>