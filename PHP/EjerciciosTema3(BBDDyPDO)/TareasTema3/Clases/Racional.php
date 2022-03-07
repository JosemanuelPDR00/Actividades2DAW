<?php 

    class Racional{

        private $valor1;
        private $valor2;

        function __construct($valor1=1 , $valor2=1){
            $this->valor1=$valor1;
            $this->valor2=$valor2;
        }

        function __toString(){
            return "El valor racional es: ". $this->valor1 ."/". $this->valor2;
        }

    }

?>