<?php 

    class RacionalCompleto{

        private $valor;

        function __construct($valor){
            $this->valor = $valor;
        }

        function __toString(){
            return "El valor racional es: ". $this->valor;
        }

    }

?>