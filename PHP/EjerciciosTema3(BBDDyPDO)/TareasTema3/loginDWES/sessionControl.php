<?php

class SessionControl {
    /**
     * Función estática para iniciar la sesión con el nombre y rol del usuario.
     *
     * @param $usuario
     * @param $rol
     */
    public static function initSession($usuario, $rol){
        // Si la sessión no tiene asignada un id, no esta iniciada
        if (session_id() == '') {
            session_start();
        }

        $_SESSION['usuario'] = $usuario;
        $_SESSION['rol'] = $rol;
    }

    /**
     * Función estática para cerrar la sesión y eliminar los valores iniciados con canterioridad
     */
    public static function closeSession(){
        if (session_id() == '') {
            session_start();
        }

        // Con estos isset aseguramos que el unset solo se haga en caso de tener datos
        if (isset($_SESSION['usuario'])) {
            unset($_SESSION['usuario']);
        }

        if (isset($_SESSION['rol'])){
            unset($_SESSION['rol']);
        }

        session_destroy();
    }

    /**
     * Función estática para comprobar si la sesión está iniciada
     * @return bool
     */
    public static function isSessionInit(){
        if (session_id() == '') {
            session_start();
        }

        if (isset($_SESSION['usuario']) &&  isset($_SESSION['rol'])){
            return true;
        } else {
            return false;
        }
    }

}