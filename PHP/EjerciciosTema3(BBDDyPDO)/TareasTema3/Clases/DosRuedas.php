<?php
    class DosRuedas extends Vehiculo{
        var $cilindrada;

        function ponerGasolina($litros){
            $this->peso+=$litros;
        }

        function __construct($color,$peso,$cilindrada=125){
            parent::__construct($color,$peso);
            $this->cilindrada=$cilindrada;
        }

        function añadirPersona($pesoPersona){
            $this->peso+=$pesoPersona+2;
        }

        public function get_cilindrada(){
            return $this->cilindrada;
        }
        public function set_cilindrada($cilindrada){
            $this->cilindrada = $cilindrada;
        }
    }
?>