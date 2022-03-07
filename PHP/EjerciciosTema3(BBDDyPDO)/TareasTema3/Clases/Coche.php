<?php
    class Coche extends CuatroRuedas{

        var $numCadenaNieve;
        
        function añadirCadenaNieve($numCadena){
            $this->numCadenaNieve+=$numCadena;
        }

        function añadirPersona($pesoPersona){
            $this->peso+=$pesoPersona;
            if($this->peso>=1500 && $this->numCadenaNieve<=2){
                echo "Atención, ponga 4 cadenas para la nieve."; //apartado 5
            }
        }
        
        function quitarCadenaNieve($numCadena){
            if($this->numCadenaNieve-$numCadena<0){
                $this->numCadenaNieve=0;
            }else{
                $this->numCadenaNieve-=$numCadena;
            }
        }

        function __construct($peso,$color,$numPuertas,$numCadenaNieve=4){
            parent::__construct($peso,$color,$numPuertas);
            $this->numCadenaNieve=$numCadenaNieve;
        }

        public function get_numCadenaNieve(){
            return $this->numCadenaNieve;
        }
        public function set_numCadenaNieve($numCadenaNieve){
            $this->numCadenaNieve = $numCadenaNieve;
        }
    }
?>