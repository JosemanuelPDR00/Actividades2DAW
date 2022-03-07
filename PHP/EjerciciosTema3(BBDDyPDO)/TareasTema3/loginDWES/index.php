<?php
// Configuramos la salida de errores para que se muestren todos
error_reporting(E_ALL);
ini_set('display_errors', '1');
// Incluimos la clase con las funciones para el inicio de sessión
include_once 'sessionControl.php';
// Creamos una constante para simular una cuenta de usuario
const cuenta = array('usuario' => "dwes", 'password' => "123456");

?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
        // Condicional para el boton de inicio de sessión
        if (isset($_POST['login'])) {
            // Comprobamos que se haya enviado usuario y contraseña
            if (isset($_POST['usuario']) && isset($_POST['password'])) {
                $usuario = $_POST['usuario'];
                $password = $_POST['password'];
                // Comprobamos si la contraseña coincide para iniciar la sesión
                if ((cuenta['password'] == $password) && (cuenta['usuario'] == $usuario)) {
                    echo "Datos correctos! </br>";
                    echo "Iniciando sessión... </br>";
                    SessionControl::initSession($usuario,1);
                    echo "Sesión iniciada! </br></br>";
                }
            }
        }
        // Condicional para el boton de cierre de sesión
        if (isset($_POST['logout'])) {
            echo "Cerrando sessión... </br>";
            SessionControl::closeSession();
            echo "Sesion cerrada! </br></br>";
        }

        // Condicional para mostrar datos de la sesión que este iniciada
        if (SessionControl::isSessionInit()) {
            echo "Los datos de la sesión son:" . '</br>';
            echo "Nombre del usuario: " . $_SESSION['usuario'] . '</br>';
            if ($_SESSION['rol'] == 1) {
                echo "Rol: admin". '</br></br>';
            }
        }
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
        <label for="usuario">Nombre de usuario</label>
        <input type="text" placeholder="Introduce tu nombre de usuario" name="usuario"
               <?php
               // Comprobacion para rellenar el nombre en caso de ser incorrecta la contraseña
               if (isset($_POST['login']) && isset($_POST['usuario']) && !empty($_POST['usuario'])) {
                   echo 'value="' . $_POST['usuario'] . '"';
               }
               ?>
               autofocus ></br>
        <label for="password">Contraseña</label>
        <input type="password" placeholder="Introduce tu contraseña" name="password" ></br>
        <input type="submit" name="login" value="Iniciar sesión">
        <?php
        if (SessionControl::isSessionInit()) {
            ?>
            <input type="submit" name="logout" value="Cerrar sessión">
            <?php
        }
        ?>
    </form>
</body>
</html>