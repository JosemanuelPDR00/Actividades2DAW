<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PlantillaLogin</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="logo">
        <img src="./img/LOGO.png" alt="logo">
    </div>
    <div id="contenedorGeneral">
        <div id="contenedorInfo">
            <input type="text" name="usuario" id="usuario" placeholder="Usuario">
            <input type="text" name="contraseña" id="contraseña" placeholder="Contraseña">
            <div>
                <input type="checkbox" name="recuerdame" id="recuerdame">
                <label for="recuerdame">Recuerdame</label>
            </div>
            <input type="button" value="Login" id="login">
            <div id="registro">
                <p>¿No tienes cuenta? <a>Registrate</a></p>
            </div>
        </div>
    </div>
</body>
</html>