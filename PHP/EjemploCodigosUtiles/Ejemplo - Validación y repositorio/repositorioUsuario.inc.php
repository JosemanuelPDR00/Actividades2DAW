<?php

class RepositorioUsuario {

    public static function obtenerTodos($conexion){
        $usuarios = array();

        if(isset($conexion)){

            try{
                include_once 'usuario.inc.php';

                $sql = "SELECT * FROM usuario";

                $sentencia = $conexion -> prepare($sql);
                $sentencia -> execute();
                $resultado = $sentencia -> fetchAll();

                if(count($resultado)){
                    foreach ($resultado as $fila){
                        $usuarios[] = new Usuario($fila['nombre'], $fila['usuario'], $fila['password'], $fila['rol'] ,$fila['correo'], $fila['fecha_alta'], $fila['fecha_baja']);
                    }
                }

            }catch (PDOException $ex){
                print "ERROR" . $ex ->getMessage();
            }
        }

        return $usuarios;
    }

    //FUNCION PARA OBTENER EL Nº DE USUARIOS DE LA TABLA USUARIO
    public static function obtenerNumeroUsuarios($conexion){
        $totalUsuarios = null;

        if (isset($conexion)){
            try{
                $sql = "SELECT COUNT(*) as total FROM usuario";

                $sentencia = $conexion -> prepare($sql);
                $sentencia -> execute();
                $resultado = $sentencia -> fetch();

                $totalUsuarios = $resultado['total'];
            }catch (PDOException $ex){
                print 'ERROR' . $ex -> getMessage();
            }
        }

        return $totalUsuarios;
    }

    //FUNCIONES PARA INSERTAR UN USUARIO EN LA TABLA USUARIO DE LA BD
    public static function insertarUsuario($conexion, $usuario){
        $usuarioInsertado = false;

        if (isset($conexion)){
            try{
                $sql1 = "INSERT INTO direccion (calle, numero, piso, puerta, cod_postal, localidad, provincia) VALUES (:calle, :numero, :piso, :puerta ,:codPostal, :ciudad, :provincia)";

                $provinciatemp = $usuario -> getProvincia();
                $ciudadtemp = $usuario->getCiudad();
                $codPostaltemp = $usuario->getCodPostal();
                $calletemp = $usuario->getCalle();
                $numerotemp = $usuario->getNumero();
                $pisotemp = $usuario->getPiso();
                $puertatemp = $usuario->getPuerta();

                $sentencia1 = $conexion -> prepare($sql1);

                $sentencia1 -> bindParam(':provincia', $provinciatemp, PDO::PARAM_STR);
                $sentencia1 -> bindParam(':ciudad', $ciudadtemp, PDO::PARAM_STR);
                $sentencia1 -> bindParam(':codPostal', $codPostaltemp, PDO::PARAM_STR);
                $sentencia1 -> bindParam(':calle', $calletemp, PDO::PARAM_STR);
                $sentencia1 -> bindParam(':numero', $numerotemp, PDO::PARAM_STR);
                $sentencia1 -> bindParam(':piso', $pisotemp, PDO::PARAM_STR);
                $sentencia1 -> bindParam(':puerta', $puertatemp, PDO::PARAM_STR);


                $sentencia1 -> execute();

                //Recuperamos el id de la direccion para la tabla de usuario
                $idDireccion = $conexion -> lastInsertId();

                /* ANTES DE INSERTAR EL USUARIO HEMOS INSERTADO LA DIRECCION PARA TENER EL ID */

                $sql2 = "INSERT INTO usuario (nombre, usuario, password, rol, correo, id_direccion, fecha_alta, fecha_baja) VALUES (:nombre, :usuario, :password, 'user', :correo ,:id_direccion, NOW(), NULL)";

                $nombretemp = $usuario -> getNombre();
                $usuariotemp = $usuario->getUsuario();
                $correotemp = $usuario->getCorreo();
                $passwordtemp = $usuario->getPassword();
                $direcciontemp = $idDireccion; /* Aqui nos quedaremos con el id ya insertado en la tabla de direcciones */

                $sentencia2 = $conexion -> prepare($sql2);

                $sentencia2 -> bindParam(':nombre', $nombretemp, PDO::PARAM_STR);
                $sentencia2 -> bindParam(':usuario', $usuariotemp, PDO::PARAM_STR);
                $sentencia2 -> bindParam(':correo', $correotemp, PDO::PARAM_STR);
                $sentencia2 -> bindParam(':password', $passwordtemp, PDO::PARAM_STR);
                $sentencia2 -> bindParam(':id_direccion', $direcciontemp, PDO::PARAM_STR);

                $usuarioInsertado = $sentencia2 -> execute();

            }catch (PDOException $ex){
                print 'ERROR' . $ex -> getMessage();
            }

        }

        return $usuarioInsertado;
    }

    public static function insertarUsuarioAdmin($conexion, $usuario){
        $usuarioInsertado = false;

        if (isset($conexion)){
            try{
                $sql1 = "INSERT INTO direccion (calle, numero, piso, puerta, cod_postal, localidad, provincia) VALUES (:calle, :numero, :piso, :puerta ,:codPostal, :ciudad, :provincia)";

                $provinciatemp = $usuario -> getProvincia();
                $ciudadtemp = $usuario->getCiudad();
                $codPostaltemp = $usuario->getCodPostal();
                $calletemp = $usuario->getCalle();
                $numerotemp = $usuario->getNumero();
                $pisotemp = $usuario->getPiso();
                $puertatemp = $usuario->getPuerta();

                $sentencia1 = $conexion -> prepare($sql1);

                $sentencia1 -> bindParam(':provincia', $provinciatemp, PDO::PARAM_STR);
                $sentencia1 -> bindParam(':ciudad', $ciudadtemp, PDO::PARAM_STR);
                $sentencia1 -> bindParam(':codPostal', $codPostaltemp, PDO::PARAM_STR);
                $sentencia1 -> bindParam(':calle', $calletemp, PDO::PARAM_STR);
                $sentencia1 -> bindParam(':numero', $numerotemp, PDO::PARAM_STR);
                $sentencia1 -> bindParam(':piso', $pisotemp, PDO::PARAM_STR);
                $sentencia1 -> bindParam(':puerta', $puertatemp, PDO::PARAM_STR);


                $sentencia1 -> execute();

                //Recuperamos el id de la direccion para la tabla de usuario
                $idDireccion = $conexion -> lastInsertId();

                /* ANTES DE INSERTAR EL USUARIO HEMOS INSERTADO LA DIRECCION PARA TENER EL ID */

                $sql2 = "INSERT INTO usuario (nombre, usuario, password, rol, correo, id_direccion, fecha_alta, fecha_baja) VALUES (:nombre, :usuario, :password, :rol, :correo ,:id_direccion, NOW(), NULL)";

                $nombretemp = $usuario -> getNombre();
                $usuariotemp = $usuario->getUsuario();
                $correotemp = $usuario->getCorreo();
                $passwordtemp = $usuario->getPassword();
                $roltemp = $usuario -> getRol();
                $direcciontemp = $idDireccion; /* Aqui nos quedaremos con el id ya insertado en la tabla de direcciones */

                $sentencia2 = $conexion -> prepare($sql2);

                $sentencia2 -> bindParam(':nombre', $nombretemp, PDO::PARAM_STR);
                $sentencia2 -> bindParam(':usuario', $usuariotemp, PDO::PARAM_STR);
                $sentencia2 -> bindParam(':correo', $correotemp, PDO::PARAM_STR);
                $sentencia2 -> bindParam(':password', $passwordtemp, PDO::PARAM_STR);
                $sentencia2 -> bindParam(':rol', $roltemp, PDO::PARAM_STR);
                $sentencia2 -> bindParam(':id_direccion', $direcciontemp, PDO::PARAM_STR);

                $usuarioInsertado = $sentencia2 -> execute();

            }catch (PDOException $ex){
                print 'ERROR' . $ex -> getMessage();
            }

        }

        return $usuarioInsertado;
    }

    //FUNCIONES PARA A EDICION DE LOS DATOS DE LOS USUARIOS EN LA BD
    public static function actualizarUsuario($conexion, $usuario, $id, $idDireccion){
        $usuarioActualizado = false;
        //$direccionInsertada = false;

        if (isset($conexion)){
            try{
                $sql1 = "UPDATE direccion SET calle=:calle, numero=:numero, piso=:piso, puerta=:puerta, cod_postal=:codPostal, localidad=:ciudad, provincia=:provincia WHERE id='$idDireccion'";

                $provinciatemp = $usuario -> getProvincia();
                $ciudadtemp = $usuario->getCiudad();
                $codPostaltemp = $usuario->getCodPostal();
                $calletemp = $usuario->getCalle();
                $numerotemp = $usuario->getNumero();
                $pisotemp = $usuario->getPiso();
                $puertatemp = $usuario->getPuerta();

                $sentencia1 = $conexion -> prepare($sql1);

                $sentencia1 -> bindParam(':provincia', $provinciatemp, PDO::PARAM_STR);
                $sentencia1 -> bindParam(':ciudad', $ciudadtemp, PDO::PARAM_STR);
                $sentencia1 -> bindParam(':codPostal', $codPostaltemp, PDO::PARAM_STR);
                $sentencia1 -> bindParam(':calle', $calletemp, PDO::PARAM_STR);
                $sentencia1 -> bindParam(':numero', $numerotemp, PDO::PARAM_STR);
                $sentencia1 -> bindParam(':piso', $pisotemp, PDO::PARAM_STR);
                $sentencia1 -> bindParam(':puerta', $puertatemp, PDO::PARAM_STR);


                $sentencia1 -> execute();

                /* ANTES DE INSERTAR EL USUARIO HEMOS INSERTADO LA DIRECCION PARA TENER EL ID */

                $nombretemp = $usuario -> getNombre();
                $usuariotemp = $usuario->getUsuario();
                $correotemp = $usuario->getCorreo();
                $passwordtemp = $usuario->getPassword();

                if(!password_verify("", $usuario->getPassword())) {

                    $sql2 = "UPDATE usuario SET nombre=:nombre, usuario=:usuario, password=:password, correo=:correo WHERE id='$id'";

                    $sentencia2 = $conexion->prepare($sql2);

                    $sentencia2->bindParam(':nombre', $nombretemp, PDO::PARAM_STR);
                    $sentencia2->bindParam(':usuario', $usuariotemp, PDO::PARAM_STR);
                    $sentencia2->bindParam(':correo', $correotemp, PDO::PARAM_STR);
                    $sentencia2->bindParam(':password', $passwordtemp, PDO::PARAM_STR);
                } else {
                    $sql2 = "UPDATE usuario SET nombre=:nombre, usuario=:usuario, correo=:correo WHERE id='$id'";

                    $sentencia2 = $conexion->prepare($sql2);

                    $sentencia2->bindParam(':nombre', $nombretemp, PDO::PARAM_STR);
                    $sentencia2->bindParam(':usuario', $usuariotemp, PDO::PARAM_STR);
                    $sentencia2->bindParam(':correo', $correotemp, PDO::PARAM_STR);
                }

                $usuarioActualizado = $sentencia2 -> execute();

            }catch (PDOException $ex){
                print 'ERROR' . $ex -> getMessage();
            }

        }

        return $usuarioActualizado;
    }

    //FUNCIÓN PARA LA EDICION POR PARTE DEL LOS ADMIN DE UN USUARIO EN CUESTION, NO SE PODRÁ EDITAR LA CONTRASEÑA PERO SI EL ROL, INCLUSO PODRIAMOS DAR VALOR A FECHA DE BAJA
    public static function actualizarUsuarioAdmin($conexion, $usuario, $id, $idDireccion){
        $usuarioActualizado = false;

        if (isset($conexion)){
            try{
                $sql1 = "UPDATE direccion SET calle=:calle, numero=:numero, piso=:piso, puerta=:puerta, cod_postal=:codPostal, localidad=:ciudad, provincia=:provincia WHERE id='$idDireccion'";

                $provinciatemp = $usuario -> getProvincia();
                $ciudadtemp = $usuario->getCiudad();
                $codPostaltemp = $usuario->getCodPostal();
                $calletemp = $usuario->getCalle();
                $numerotemp = $usuario->getNumero();
                $pisotemp = $usuario->getPiso();
                $puertatemp = $usuario->getPuerta();

                $sentencia1 = $conexion -> prepare($sql1);

                $sentencia1 -> bindParam(':provincia', $provinciatemp, PDO::PARAM_STR);
                $sentencia1 -> bindParam(':ciudad', $ciudadtemp, PDO::PARAM_STR);
                $sentencia1 -> bindParam(':codPostal', $codPostaltemp, PDO::PARAM_STR);
                $sentencia1 -> bindParam(':calle', $calletemp, PDO::PARAM_STR);
                $sentencia1 -> bindParam(':numero', $numerotemp, PDO::PARAM_STR);
                $sentencia1 -> bindParam(':piso', $pisotemp, PDO::PARAM_STR);
                $sentencia1 -> bindParam(':puerta', $puertatemp, PDO::PARAM_STR);


                $sentencia1 -> execute();

                /* ANTES DE INSERTAR EL USUARIO HEMOS INSERTADO LA DIRECCION PARA TENER EL ID */

                $nombretemp = $usuario -> getNombre();
                $usuariotemp = $usuario->getUsuario();
                $correotemp = $usuario->getCorreo();
                $roltemp = $usuario->getRol();

                $sql2 = "UPDATE usuario SET nombre=:nombre, usuario=:usuario, rol=:rol, correo=:correo WHERE id='$id'";

                $sentencia2 = $conexion->prepare($sql2);

                $sentencia2->bindParam(':nombre', $nombretemp, PDO::PARAM_STR);
                $sentencia2->bindParam(':usuario', $usuariotemp, PDO::PARAM_STR);
                $sentencia2->bindParam(':correo', $correotemp, PDO::PARAM_STR);
                $sentencia2->bindParam(':rol', $roltemp, PDO::PARAM_STR);


                $usuarioActualizado = $sentencia2 -> execute();

            }catch (PDOException $ex){
                print 'ERROR' . $ex -> getMessage();
            }

        }

        return $usuarioActualizado;
    }

    //FUNCIONES PARA DAR DE BAJA O ELIMINAR A UN USUARIO DE LA BD

    //2 OPCIONES, O DEVOLVER EN EL GET LA FUNCION NOW() O NO DEPENDER DE EL Y HACERLO DIRECTAMENTE EN EL CÓDIGO
    public static function darDeBaja($conexion, $id){
        $usuarioBaja = false;

        try{
            $sql = "UPDATE usuario SET fecha_baja=NOW() WHERE id='$id'";

            $sentencia = $conexion -> prepare($sql);

            $usuarioBaja = $sentencia -> execute();

        }catch (PDOException $ex){
            print 'ERROR' . $ex -> getMessage();
        }
        return $usuarioBaja;
    }

    /* TENER EN CUENTA QUE PARA BORRAR UN USUARIO, DEBEMOS BORRAR SU DIRECCION TAMBIEN */
    public static function eliminarUsuario($conexion, $id, $idDireccion){
        $usuarioEliminado = false;
        $direccionEliminada = false;

        try{

            $sql = "DELETE FROM usuario WHERE id='$id'";

            $sentencia = $conexion -> prepare($sql);

            $usuarioEliminado = $sentencia -> execute();

            $sql = "DELETE FROM direccion WHERE id='$idDireccion'";

            $sentencia = $conexion -> prepare($sql);

            $direccionEliminada = $sentencia -> execute();

            if($direccionEliminada && $usuarioEliminado){
                return true;
            }

        }catch (PDOException $ex){
            print 'ERROR' . $ex -> getMessage();
        }

        if($direccionEliminada && $usuarioEliminado){
            return true;
        } else return false;
    }

    //FUNCIONES PARA COMPROBAR SI EXISTE UN REGISTRO QUE SE CORRESPONDA CON EL NOMBRE, USUARIO O CORREO INTRODUCIDO
    public static function nombreExiste($conexion, $nombre){
        $nombreExiste = true;

        if (isset($conexion)){
            try{
                $sql = "SELECT * FROM usuario WHERE nombre = :nombre";

                $sentencia = $conexion -> prepare($sql);

                $sentencia -> bindParam(':nombre', $nombre, PDO::PARAM_STR);

                $sentencia -> execute();
                $resultado = $sentencia->fetchAll();

                if (count($resultado)){
                    $nombreExiste = true;
                }else{
                    $nombreExiste = false;
                }
            }catch (PDOException $ex){
                print  'ERROR' . $ex -> getMessage();
            }
        }

        return $nombreExiste;
    }

    public static function usuarioExiste($conexion, $usuario){
        $usuarioExiste = true;

        if (isset($conexion)){
            try{
                $sql = "SELECT * FROM usuario WHERE usuario = :usuario";

                $sentencia = $conexion -> prepare($sql);

                $sentencia -> bindParam(':usuario', $usuario, PDO::PARAM_STR);

                $sentencia -> execute();

                $resultado = $sentencia->fetchAll();

                if (count($resultado)){
                    $usuarioExiste = true;
                }else{
                    $usuarioExiste = false;
                }
            }catch (PDOException $ex){
                print  'ERROR' . $ex -> getMessage();
            }
        }

        return $usuarioExiste;
    }

    public static function usuarioDeBaja($correo, $conexion){
        $usuarioBaja = true;

        if (isset($conexion)){
            try{
                $sql = "SELECT * FROM usuario WHERE correo = :correo";

                $sentencia = $conexion -> prepare($sql);

                $sentencia -> bindParam(':correo', $correo, PDO::PARAM_STR);

                $sentencia -> execute();

                $resultado = $sentencia->fetch();

                if (isset($resultado['fecha_baja'])){
                    $usuarioBaja = true;
                }else{
                    $usuarioBaja = false;
                }
            }catch (PDOException $ex){
                print  'ERROR' . $ex -> getMessage();
            }
        }

        return $usuarioBaja;
    }

    public static function correoExiste($conexion, $correo){
        $correoExiste = true;

        if (isset($conexion)){
            try{
                $sql = "SELECT * FROM usuario WHERE correo = :correo";

                $sentencia = $conexion -> prepare($sql);

                $sentencia -> bindParam(':correo', $correo, PDO::PARAM_STR);

                $sentencia -> execute();

                $resultado = $sentencia->fetchAll();

                if (count($resultado)){
                    $correoExiste = true;
                }else{
                    $correoExiste = false;
                }
            }catch (PDOException $ex){
                print  'ERROR' . $ex -> getMessage();
            }
        }

        return $correoExiste;
    }

    public static function obtenerUsuarioPorCorreo($conexion, $correo){
        $usuario = null;

        if (isset($conexion)){
            try{
                include_once 'usuario.inc.php';

                $sql = "SELECT * FROM usuario WHERE correo = :correo";

                $sentencia = $conexion -> prepare($sql);

                $sentencia -> bindParam(':correo', $correo, PDO::PARAM_STR);

                $sentencia -> execute();

                $resultado = $sentencia -> fetch();

                $idDireccion = $resultado['id_direccion'];

                $sql2 = "SELECT * FROM direccion WHERE id='$idDireccion'";

                $sentencia = $conexion -> prepare($sql2);

                $sentencia -> execute();

                $resultado2 = $sentencia -> fetch();

                if (!empty($resultado)){
                    $usuario = new Usuario(
                        $resultado['nombre'],
                        $resultado['usuario'],
                        $resultado['password'],
                        $resultado['rol'],
                        $resultado['correo'],
                        $resultado['fecha_alta'],
                        $resultado['fecha_baja'],
                        $resultado2['provincia'],
                        $resultado2['localidad'],
                        $resultado2['cod_postal'],
                        $resultado2['calle'],
                        $resultado2['numero'],
                        $resultado2['piso'],
                        $resultado2['puerta']);
                }
            }catch (PDOException $ex){
                print 'ERROR' . $ex -> getMessage();
            }
        }

        return $usuario;
    }

}
