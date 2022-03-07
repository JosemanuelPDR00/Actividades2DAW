<?php
    class Camion extends CuatroRuedas{

        var $longitud;

        function añadirRemolque($longitudRemolque){
            $this->longitud+=$longitudRemolque;
        }

        function __construct($peso,$color,$numPuertas,$longitud){
            parent::__construct($peso,$color,$numPuertas);
            $this->longitud=$longitud;
        }

        public function get_longitud(){
            return $this->longitud;
        }
        public function set_longitud($longitud){
            $this->longitud = $longitud;
        }
    }
?>