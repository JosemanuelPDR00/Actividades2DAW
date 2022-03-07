<?php

include_once 'repositorioUsuario.inc.php';

class ValidadorLogin{
    private $usuario;
    private $error;

    public function __construct($correo, $password, $conexion) {
        $this -> error = "";

        if (!$this -> variableIniciada($correo) || !$this -> variableIniciada($password)){
            $this -> usuario = null;
            $this -> error = "Debes introducir tu correo y tu contraseña.";
        } else {
            $this -> usuario = RepositorioUsuario::obtenerUsuarioPorCorreo($conexion, $correo);

            if (is_null($this -> usuario) || !password_verify($password, $this -> usuario ->getPassword())){
                $this -> error = "Datos incorrectos.";
            }
        }
    }

    private function variableIniciada($variable) {
        if (isset($variable) && !empty($variable)) {
            return true;
        } else {
            return false;
        }
    }

    public function obtenerUsuario(){
        return $this->usuario;
    }

    public function obtenerError(){
        return $this->error;
    }

    public function mostrarError(){
        if ($this->error !== ''){
            echo "<br/><div class='alert alert-danger' role='alert'>";
            echo $this -> error;
            echo "</div><br/>";
        }
    }
}