<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

if (isset($_POST['registro'])) {
    //Comprobamos que la imagen se ha enviado
    $comprobar = getimagesize(($_FILES['imagen']['tmp_name']));
    if ($comprobar !== false) {
        //Comprobamos que todos los campos necesarios han sido rellenados en el formulario
        if (isset($_POST['nombre']) && isset($_POST['correo']) && isset($_POST['apellido1']) && isset($_POST['fechaNac']) && isset($_POST['passwd'])) {
            $nombre = $_POST['nombre'];
            $correo = $_POST['correo'];
            $apellido1 = $_POST['apellido1'];
            $fechaNac = $_POST['fechaNac'];
            //Encriptación de la contraseña
            $passwd = password_hash($_POST['passwd'], PASSWORD_DEFAULT);
            //Almacenamos la imagen y la preparamos para su inserción en base de datos
            $imagen = $_FILES['imagen']['tmp_name'];
            $fotoPerfil = addslashes(file_get_contents($imagen));
            //Formateamos la fecha para almacenarla en la base de datos
            $fechaNac = date('Y-m-d', strtotime($_POST['fechaNac']));
            //El segundo apellido es opcional, si se ha introducido lo recogemos, si no, lo dejamos vacío
            if (isset($_POST['apellido2'])) {
                $apellido2 = $_POST['apellido2'];
            } else {
                $apellido2 = "";
            }
            // require_once("./../db/conexion.inc.php");
            // $conexion = Conexion::openConexion();
            define('NOMBRE_SERVIDOR', 'localhost');
            define('NOMBRE_USUARIO', 'adminGestor');
            define('PASSWORD', 'aa');
            define('NOMBRE_BD', 'gestor');

            $conexion = new PDO('mysql:host='. NOMBRE_SERVIDOR . '; dbname=' . NOMBRE_BD, NOMBRE_USUARIO, PASSWORD);
            //Primero comprobamos si el usuario existe en la base de datos
            $existe = $conexion->query("SELECT * FROM Usuario WHERE correo='$correo'");
            if ($registro = $existe->fetch()) {
                echo "Este correo ya existe en la base de datos";
                header("Location: ./../../templates/crearUsuario.html");
            } else {
                try {
                    $insertar = $conexion->exec("INSERT INTO Usuario (nombre,correo,pass,foto,apellido1,apellido2,fechaNac) VALUES ('$nombre','$correo','$passwd','$fotoPerfil','$apellido1','$apellido2','$fechaNac')");
                    echo "Registrto completo";
                    header("Location: ./../../index.php");
                } catch (PDOException $err) {
                    echo "Error insertando el usuario: " . $err->getMessage();
                }
            }
        }
    }
}