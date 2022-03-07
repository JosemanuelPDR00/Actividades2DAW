<?php
//error_reporting(E_ALL);
//ini_set('display_errors', '1');

//Si la sesión está iniciada redirigmos al index
session_start();
if (isset($_SESSION) && $_SESSION['rol'] == 1){
    header('Location:' . './index.php', true, 301);
    exit();
}

//Conexión a la BD
$servidor = "localhost";
$usuario = "root";
$password = "root";
$bd = "employees";

$link = mysqli_connect($servidor,$usuario,$password,$bd) or die ("Error al hacer la conexion a la BD");

if (isset($_POST['login'])){
    //var_dump($_POST);

    $correo = $_POST['correo'];
    $passwd = $_POST['password'];

    $consulta = "SELECT * FROM administradores WHERE correo='$correo' AND password='$passwd'";
    $reusltado = mysqli_query($link,$consulta) or die ("Error al realizar consulta:".mysqli_error($link));
    $empleado = mysqli_fetch_array($reusltado);

    if (!is_null($empleado)){
        session_start();
        $_SESSION['nombre'] = $empleado['nombre'];
        $_SESSION['apellidos'] = $empleado['apellidos'];
        $_SESSION['rol'] = $empleado['rol'];
        $_SESSION['correo'] = $empleado['correo'];
        header('Location:' . './index.php', true, 301);
        exit();
    }
}


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">

</head>

<body>
<div class="container">

    <h1 class="text-center">GestionaEmpleados</h1>

    <form role="form" method="post" class="form-signin" action="<?php echo $_SERVER['PHP_SELF']?>">
        <h2 class="form-signin-heading">Introduce tu usuario</h2>
        <label for="correo" class="sr-only">Correo electrónico</label>
        <input type="email" name="correo" id="correo" class="form-control" placeholder="Correo electrónico"
               <?php
               if (isset($_POST['login']) && isset($_POST['correo']) && !empty($_POST['correo'])){
                   echo 'value="' . $_POST['correo']. '"';
               }
               ?>
               required autofocus>
        <label for="password" class="sr-only">Contraseña</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña" required>
        <!--<div class="checkbox">
            <label>
                <input type="checkbox" value="remember-me"> Recuerdame
            </label>
        </div>-->

        <!--?php
        if (isset($_POST['login'])){
            $validador -> mostrarError();
        }
        ?-->

        <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Iniciar sesión</button>
    </form>
    <div class="text-center">
        <a href="#">¿Olvidaste tu contraseña?</a>
    </div>
</div>

</body>
</html>
