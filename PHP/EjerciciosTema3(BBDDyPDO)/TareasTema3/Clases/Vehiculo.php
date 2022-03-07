<?php
    const SALTO_DE_LINEA = "<br>";

    abstract class Vehiculo{
        var $color;
        var $peso;
        static $numero_cambio_color = 0;

        function circula(){
            return "El vehiculo circula ";
        }

        abstract function añadirPersona($pesoPersona);

        static function ver_atributo($objeto){
            if(isset($objeto->color)){
                echo "Color:".$objeto->color.SALTO_DE_LINEA;
            }
            if(isset($objeto->peso)){
                echo "Peso:".$objeto->peso.SALTO_DE_LINEA;
            }
            if(isset($objeto->numPuertas)){
                echo "Numero de puertas:".$objeto->numPuertas.SALTO_DE_LINEA;
            }
            if(isset($objeto->cilindrada)){
                echo "Cilindrada:".$objeto->cilindrada.SALTO_DE_LINEA;
            }
            if(isset($objeto->longitud)){
                echo "Longitud:".$objeto->longitud.SALTO_DE_LINEA;
            }
            if(isset($objeto->numCadenaNieve)){
                echo "Numero de cadenas de nieve:".$objeto->numCadenaNieve;
            }
        }

        function __construct ($peso=1500,$color="Negro"){
            $this->color=$color;
            $this->peso=$peso;
        }

        public function get_color(){
            return $this->color;
        }
        public function set_color($color){
            $this->color = $color;
            self::$numero_cambio_color++;
        }

        public function get_peso(){
            return $this->peso;
        }

        public function set_peso($peso){
            if(get_class($this)=="Coche"){
                if($peso > 2100){
                    $this->peso = 2100;
                }else{
                    $this->peso=$peso;
                }
            }else{
                $this->peso=$peso;
            }
        }
    }
?>