<?php
//error_reporting(E_ALL);
//ini_set('display_errors', '1');

//Si la sesión no está iniciada redirigmos al login
session_start();
if (!isset($_SESSION) || $_SESSION['rol'] != 1){
    header('Location:' . './login.php', true, 301);
    exit();
}

//Si se ha pulsado cerrar sesión
if (isset($_POST['Logout'])){
    session_start();
    unset($_SESSION);
    session_destroy();
    header('Location:' . './login.php', true, 301);
    exit();
}

include_once 'funciones.php';

//Conexión a la BD
$servidor = "localhost"; 
$usuario = "root";
$password = "root";
$bd = "employees";
    
$link = mysqli_connect($servidor,$usuario,$password,$bd) or die ("Error al hacer la conexion a la BD");

/* Primero, intentamos recoger por GET el modo e id */
$modo = $_GET['modo'];
$id = $_GET['id'];

/* Si alguno de los formularios indicados abajo, hizo POST, realizamos su función. */
if(isset($_POST['Editar'])){
    /* La utilización de explode la hacemos para separar el dia, mes y año para su correcta inserción en la BD*/
    $fecha = explode("/", $_POST['fecha_nacimiento']);

    $editado = editarEmpleado($link, $_POST['id'], $_POST['nombre'], $_POST['apellidos'], $_POST['dni'], $fecha[0], $fecha[1], $fecha[2], $_POST['salario']);
    if ($editado){
        echo "Usuario editado corectamente";
    }
}else if (isset($_POST['Crear'])){
    /* La utilización de explode la hacemos para separar el dia, mes y año para su correcta inserción en la BD*/
    $fecha = explode("/", $_POST['fecha_nacimiento']);

    $creado = crearEmpleado($link, $_POST['nombre'], $_POST['apellidos'], $_POST['dni'], $fecha[0], $fecha[1], $fecha[2], $_POST['salario']);
    if ($creado){
        echo "Usuario creado corectamente";
    }
}else if (isset($_POST['Eliminar'])){

    $eliminado = eliminarEmpleado($link, $_POST['id']);
    if ($eliminado){
        echo "Usuario eliminado corectamente";
    }
}

/* Tras haber realizado o no, alguna de las funciones anteriores, cargamos el listado de todos los usuarios, manteniendo asi actualizada la lista. */
$empleados = listarEmpleados($link);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Gestiona empleados</title>
    <meta name="author" content="">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="bootstrap.min.css" rel="stylesheet">
</head>

<body>
<h3 class="text-center">Web app para listar, editar, crear y eliminar empleados</h3>

<div class="container col-md-2">
    <div class="panel panel-default">
        <div class="panel-heading"><h4 class="panel-title">Logueado como:<?php if($_SESSION['rol'] == 1) echo " Administrador"?></h4></div>
        <div class="panel-body">
            <form role="form" action="" method="post">
                <div class="form-group"><label>Nombre: <?php echo $_SESSION['nombre']?></label></div>
                <div class="form-group"><label>Apellidos: <?php echo $_SESSION['apellidos']?></label></div>
                <div class="form-group"><label>Correo: <?php echo $_SESSION['correo']?></label></div>
                <button class="btn btn-primary" type="submit" name="Logout">Cerrar sesión</button>
            </form>
        </div>
    </div>
</div>

<div class="table-responsive well">
    <table class="table">
        <thead>
        <tr style="font-weight: bold;">
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>DNI</th>
            <th>F. Nacimiento</th>
            <th>Salario</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        <?php
        /* Por cada entrada recogida de la BD formamos una fila con los datos de dicho empleado. Además de formar por cada uno de ellos, dos hipervinculos que por GET pasaran el modo y la id */
        while ($empleado = mysqli_fetch_array($empleados)){
            ?>
            <tr>
                <td><?php echo $empleado[0]?></td>
                <td><?php echo $empleado[1]?></td>
                <td><?php echo $empleado[2]?></td>
                <td><?php echo $empleado[3]?></td>
                <td><?php echo $empleado[4]?></td>
                <td><?php echo $empleado[5]?></td>
                <td><a href="index.php?id=<?php echo $empleado[0]?>&modo=1">Editar</a>|<a href="index.php?id=<?php echo $empleado[0]?>&modo=2">Eliminar</a></td>
            </tr>
            <?php
        }

        ?>
        </tbody>
    </table>
</div>
<?php
/* Llegados este punto si el usuario selecciona alguno de los hipervinculos o no, se cargará el form determinado */
if(isset($modo) && !is_null($modo)){
    /* Para el caso de seleccionar la edicion cargariamos este modo */
    if ($modo==1  && isset($id) && !is_null($id)){
        $datos = listarEmpleado($link, $id);

        while ($dato = mysqli_fetch_array($datos)){
            /* Hacemos uso de la función explode, pues la fecha se nos proporciona en formato literal y para el tratamiento de la misma la necesitamos separar en dd/mm/YYYY.
                Para ello separo por cada espacio en blanco y me quedo con las columnas 1 2 y 3, que tras analizar el formato descrito son las que tienen el dia, mes y año.
                Luego además de esto, adicionalmente uso la función determinarMes() para a partir de la cadena obtenida, generar el numero de mes. */
            $fecha = explode("-", $dato[4]);
            ?>
            <div class="container col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4 class="panel-title">Formulario de edición:</h4></div>
                    <div class="panel-body">
                        <form role="form" action="" method="post">
                            <div class="form-group"><label>DNI:</label><input class="form-control" type="text" name="dni" placeholder="DNI" value="<?php echo $dato[3]?>"><input type="hidden" name="id" value="<?php echo $id?>"></div>
                            <div class="form-group"><label>Nombre:</label><input class="form-control" type="text" name="nombre" placeholder="Nombre" value="<?php echo $dato[1]?>"></div>
                            <div class="form-group"><label>Apellidos:</label> <input class="form-control" type="text" name="apellidos" placeholder="Apellidos" value="<?php echo $dato[2]?>"></div>
                            <div class="form-group"><label>F. Nacimiento:</label> <input class="form-control" type="text" name="fecha_nacimiento" placeholder="Fecha de nacimiento" value="<?php echo $fecha[2].'/'.$fecha[1].'/'.$fecha[0] ?>"></div>
                            <div class="form-group"><label>Salario:</label><input class="form-control" type="text" name="salario" placeholder="Salario" value="<?php echo $dato[5]?>"></div>
                            <button class="btn btn-warning" type="submit" name="Editar">Editar Empleado</button>&nbsp;<button class="btn btn-default"><a href="index.php?modo=3">Crear Empleado</a></button>
                        </form>
                    </div>
                </div>
            </div>
            <?php
        }

    }
    /* Para el caso de seleccionar la eliminacion cargariamos este modo */
    if ($modo==2  && isset($id) && !is_null($id)){
        $datos = listarEmpleado($link, $id);

        while ($dato = mysqli_fetch_array($datos)){
            /* Hacemos uso de la función explode, pues la fecha se nos proporciona en formato literal y para el tratamiento de la misma la necesitamos separar en dd/mm/YYYY.
                Para ello separo por cada espacio en blanco y me quedo con las columnas 1 2 y 3, que tras analizar el formato descrito son las que tienen el dia, mes y año.
                Luego además de esto, adicionalmente uso la función determinarMes() para a partir de la cadena obtenida, generar el numero de mes. */
            $fecha = explode("-", $dato[4]);
            ?>
            <div class="container col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4 class="panel-title">Formulario de eliminación:</h4></div>
                    <div class="panel-body">
                        <form role="form" action="" method="post">
                            <div class="form-group"><label>DNI:</label><input class="form-control" type="text" name="dni" placeholder="DNI" value="<?php echo $dato[3]?>"><input type="hidden" name="id" value="<?php echo $id?>"></div>
                            <div class="form-group"><label>Nombre:</label><input class="form-control" type="text" name="nombre" placeholder="Nombre" value="<?php echo $dato[1]?>"></div>
                            <div class="form-group"><label>Apellidos:</label> <input class="form-control" type="text" name="apellidos" placeholder="Apellidos" value="<?php echo $dato[2]?>"></div>
                            <div class="form-group"><label>F. Nacimiento:</label> <input class="form-control" type="text" name="fecha_nacimiento" placeholder="Fecha de nacimiento" value="<?php echo $fecha[2].'/'.$fecha[1].'/'.$fecha[0]?>"></div>
                            <div class="form-group"><label>Salario:</label><input class="form-control" type="text" name="salario" placeholder="Salario" value="<?php echo $dato[5]?>"></div>
                            <button class="btn btn-danger" type="submit" name="Eliminar">Eliminar Empleado</button>&nbsp;<button class="btn btn-default"><a href="index.php?modo=3">Crear Empleado</a></button>
                        </form>
                    </div>
                </div>
            </div>
            <?php
        }

    }
    /* Para el caso de seleccionar la creación cargariamos este modo */
    if ($modo==3){
        ?>
        <div class="container col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading"><h4 class="panel-title">Formulario de creación:</h4></div>
                <div class="panel-body">
                    <form role="form" action="" method="post">
                        <div class="form-group"><label>DNI:</label><input class="form-control" type="text" name="dni" placeholder="DNI"></div>
                        <div class="form-group"><label>Nombre:</label><input class="form-control" type="text" name="nombre" placeholder="Nombre"></div>
                        <div class="form-group"><label>Apellidos:</label> <input class="form-control" type="text" name="apellidos" placeholder="Apellidos"></div>
                        <div class="form-group"><label>F. Nacimiento:</label> <input class="form-control" type="text" name="fecha_nacimiento" placeholder="Fecha: dd/mm/YYYY"></div>
                        <div class="form-group"><label>Salario:</label><input class="form-control" type="text" name="salario" placeholder="Salario"></div>
                        <button class="btn btn-primary"  type="submit" name="Crear">Crear</button>
                    </form>
                </div>
            </div>
        </div>
        <?php
    }

}else{
    // Formulario a cargar por defecto.
    ?>
    <div class="container col-md-3">
        <div class="panel panel-default">
            <div class="panel-heading"><h4 class="panel-title">Formulario de creación:</h4></div>
            <div class="panel-body">
                <form role="form" action="" method="post">
                    <div class="form-group"><label>DNI:</label><input class="form-control" type="text" name="dni" placeholder="DNI"></div>
                    <div class="form-group"><label>Nombre:</label><input class="form-control" type="text" name="nombre" placeholder="Nombre"></div>
                    <div class="form-group"><label>Apellidos:</label> <input class="form-control" type="text" name="apellidos" placeholder="Apellidos"></div>
                    <div class="form-group"><label>F. Nacimiento:</label> <input class="form-control" type="text" name="fecha_nacimiento" placeholder="Fecha: dd/mm/YYYY"></div>
                    <div class="form-group"><label>Salario:</label><input class="form-control" type="text" name="salario" placeholder="Salario"></div>
                    <button class="btn btn-success"  type="submit" name="Crear">Crear Empleado</button>
                </form>
            </div>
        </div>
    </div>
    <?php
} ?>


</body>

</html>
