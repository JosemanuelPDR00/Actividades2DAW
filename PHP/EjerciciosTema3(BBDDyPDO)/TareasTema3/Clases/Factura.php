<?php

class Factura{
    const IVA = 0.21;
    private $importeBase;
    private $fecha;
    private $impuestos;
    private $importeBruto;
    private $estado;


    public function __construct($importeBase, $fecha, $impuestos, $importeBruto, $estado){
        $this->importeBase=$importeBase;
        $this->fecha=$fecha;
        $this->impuestos=$impuestos;
        $this->importeBruto=$importeBruto;
        $this->estado=$estado;
    }

    public function __toString(){
        return "IVA: ". self::IVA ."<br>".
        "Importe Base: " . $this->importeBase . " <br>".
        "Fecha: " . $this->fecha . " <br>".
        "Impuestos: " . $this->impuestos . "<br>".        
        "Importe Bruto: " . (($this->importeBase*self::IVA)+$this->importeBase) . "<br>".
        "Estado: " . $this->estado . "<br>";
    }

}

?>

<h1>FACTURACION</h1>

<?php

    $factura1 = new Factura(10 ,"10/10",0.5 ,20,"pagado" );

    echo $factura1;

?>