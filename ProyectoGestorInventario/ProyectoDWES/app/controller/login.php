<?php 
//si se pulsa el boton enviar se harán las comprobaciones
if(isset($_POST['submit'])){
    if(isset($_POST['correo']) && isset($_POST['passwd'])){
        //creacion de variables
        $correo = $_POST['correo'];
        $passwd = $_POST['passwd'];

        //accedemos al archivo para hacer la conexion a base de datos
        require_once("./../db/conexion.inc.php");
        $conexion = Conexion::openConexion();
        //consulta para obtener los datos del usuario
        $existe = $conexion->query("SELECT nombre,correo,pass,idUser FROM Usuario WHERE correo='$correo'");
        //fetch para acceder a la informacion de la consulta
        $comprobacion=$existe->fetch();
        //si no coinciden las pass se muestra un aviso sino se crean sesiones
        if(!password_verify($passwd,$comprobacion['pass'])){
            echo "Contraseña incorrecta, intentelo de nuevo";
            header("Location: ./../../index.php");
        }else{
            $user = $comprobacion['nombre'];
            $idUser = $comprobacion['idUser'];

            //inicios de las sesiones
            session_start();
            $_SESSION['nombre'] = $user;
            $_SESSION['correo'] = $correo;
            $_SESSION['pass'] = $passwd;
            $_SESSION['idUser'] = $idUser;
            echo "Sesion iniciada";
            header("Location: ./gestorLogica.php");
        }
    }
}
//si se pulsa el boton de cerrar sesion, se destruiran las sesiones asignadas previamente
if(isset($_GET['close'])){
    //se cierra la sesion nombre
    if(isset($_SESSION['nombre'])){
        unset($_SESSION['nombre']);
    }
    //se cierra la sesion correo
    if(isset($_SESSION['correo'])){
        unset($_SESSION['correo']);
    }
    //se cierra la sesion pass
    if(isset($_SESSION['pass'])){
        unset($_SESSION['pass']);
    }
    if(isset($_SESSION['idUser'])){
        unset($_SESSION['idUser']);
    }
    //destruccion de la sesiones
    session_destroy();
    header("Location: ./../../index.php");
}