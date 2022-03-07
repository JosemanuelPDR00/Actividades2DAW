<?php
    class CuatroRuedas extends Vehiculo{
        var $numPuertas;

        function repintar($color){
            $this->color=$color;
        }
        function añadirPersona($pesoPersona){
            $this->peso+=$pesoPersona;
        }

        function __construct($color,$peso,$numPuertas=4){
            parent::__construct($color,$peso);
            $this->numPuertas=$numPuertas;
        }

        public function get_numPuertas(){
            return $this->numPuertas;
        }
        public function set_numPuertas($numPuertas){
            $this->numPuertas = $numPuertas;
        }
    }
?>