<?php

    class Empleado{

        private $nombre;
        private $sueldo;

        public function __construct($nombre, $sueldo){
            $this->nombre=$nombre;
            $this->sueldo=$sueldo;
        }

        public function impuestos(){
            echo "El empleado: ". $this->nombre .", ";
            if($this->sueldo > 3000){
                echo "debe pagar impuestos.<br>";
            }else{
                echo "no debe pagar impuestos.<br>";
            }
        }

        public function get_nombre($nombre){
            $this->nombre=$nombre;
        }
        public function get_sueldo($sueldo){
            $this->sueldo=$sueldo;
        }

    }
?>

<h1>EMPLEADOS</h1>

<?php

    $empleado1 = new Empleado("juan",2500);
    $empleado2 = new Empleado("josema",3500);

    $empleado1->impuestos();
    $empleado2->impuestos();

?>