<?php

/**
 * Función para listar todos los empleados de la BD haciendo uso de mysqli.
 */
function listarEmpleados($link)
{
    $consulta = "SELECT * FROM empleados";
    $empleados = mysqli_query($link,$consulta) or die ("Error al realizar consulta:".mysqli_error($link));

    return $empleados;
}

/**
 * Función para listar un empleado con su id de la BD haciendo uso mysqli.
 */
function listarEmpleado($link, $id)
{
    $consulta = "SELECT * FROM empleados WHERE id='$id'";
    $empleado = mysqli_query($link,$consulta) or die ("Error al realizar consulta:".mysqli_error($link));

    return $empleado;
}

/**
 * Función para editar un empleado de la BD haciendo uso de la funcion modificarEmpleado del SERVIDOR REST
 * Lo hacemos a traves de CURL y en este caso necesitamos pasarle todos los datos del usuario al SERVIDOR por lo que usamos POST,
 * debemos hacer uso de las lineas que configuran el uso de POST y paso de JSON con todos los datos del usuario.
 */
function editarEmpleado($link, $id, $nombre, $apellidos, $dni, $dia, $mes, $anio, $salario)
{
    /* Realizamos castings del dia y mes a int pues generan problemas al venir como string */
    $dia = intval($dia);
    $mes = intval($mes);
    $anio = intval($anio);

    $consulta = "UPDATE empleados SET nombre='$nombre', apellidos='$apellidos', dni='$dni', fecha_nacimiento=STR_TO_DATE('$anio-$mes-$dia', '%Y-%m-%d'), sueldo='$salario' WHERE id='$id'";
    $empleado = mysqli_query($link,$consulta) or die ("Error al realizar consulta:".mysqli_error($link));

    return $empleado;
}

/**
 * Función para crear un nuevo empleado en la BD haciendo uso de la funcion insertarEmpleado del SERVIDOR REST
 * Lo hacemos a traves de CURL y en este caso necesitamos pasarle todos los datos del usuario al SERVIDOR por lo que usamos POST,
 * debemos hacer uso de las lineas que configuran el uso de POST y paso de JSON con todos los datos del nuevo usuario.
 */
function crearEmpleado($link, $nombre, $apellidos, $dni, $dia, $mes, $anio, $salario)
{
    /* Realizamos castings del dia y mes a int pues generan problemas al venir como string */
    $dia = intval($dia);
    $mes = intval($mes);
    $anio = intval($anio);

    $consulta = "INSERT INTO empleados(nombre, apellidos, dni, fecha_nacimiento, sueldo) VALUES ('$nombre','$apellidos','$dni', STR_TO_DATE('$dia,$mes,$anio', '%d,%m,%Y'),'$salario')";
    $empleado = mysqli_query($link,$consulta) or die ("Error al realizar consulta:".mysqli_error($link));

    return $empleado;
}

/**
 * Función para eliminar un empleado de la BD haciendo uso de la funcion eliminarEmpleado del SERVIDOR REST
 * Lo hacemos a traves de CURL y en este caso necesitamos pasarle el id del usuario al SERVIDOR por lo que usamos POST,
 * debemos hacer uso de las lineas que configuran el uso de POST y paso de JSON con el id del usuario.
 */
function eliminarEmpleado($link, $id){
    $consulta = "DELETE FROM empleados WHERE id='$id'";
    $empleado = mysqli_query($link,$consulta) or die ("Error al realizar consulta:".mysqli_error($link));

    return $empleado;
}

/**
 * Pequeña función realizada para suplir el problema de las fechas que se nos presentaban de forma literal y no con el tipico formato dd/mm/YYYY.
 * En este caso determinaremos el mes con un simple switch de lo extraido en $iniciales.
 */
function determinarMes($iniciales){

    switch ($iniciales){
        case 'Jan':
            $mes = '01';
            break;
        case 'Feb':
            $mes = '02';
            break;
        case 'Mar':
            $mes = '03';
            break;
        case 'Apr':
            $mes = '04';
            break;
        case 'May':
            $mes = '05';
            break;
        case 'Jun':
            $mes = '06';
            break;
        case 'Jul':
            $mes = '07';
            break;
        case 'Aug':
            $mes = '08';
            break;
        case 'Sep':
            $mes = '09';
            break;
        case 'Oct':
            $mes = '10';
            break;
        case 'Nov':
            $mes = '11';
            break;
        case 'Dec':
            $mes = '12';
            break;
    }

    return $mes;
}