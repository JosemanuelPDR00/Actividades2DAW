<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio1</title>
</head>
<body>
    <?php
        error_reporting(E_ALL);

        include_once("./Vehiculo.php");
        include_once("./DosRuedas.php");
        include_once("./CuatroRuedas.php");
        include_once("./Coche.php");
        include_once("./Camion.php");



        /*EJERCICIO 2*/
        //$vehiculo1 = new Vehiculo(1500,"Negro");
        //$vehiculo1->añadirPersona(70);
        //var_dump($vehiculo1);
        /*ESTA COMENTADO YA QUE AL SER ABSTRACTO DARIA FALLO*/



        /*EJERCICIO 3*/
        $coche = new CuatroRuedas(5,"azul",4);
        $coche->repintar("blanco");
        //var_dump($coche);

        $moto = new DosRuedas(450,"AZUL",750);
        $moto->ponerGasolina(15);
        //var_dump($moto);

        $audi = new Coche(3000,"AZUL",3,2);
        $audi->set_numCadenaNieve(4);
        //var_dump($audi);
        $audi->get_numCadenaNieve(0);
        //var_dump($audi);

        $pegasso = new Camion(50000,"ROJO",3,10);
        $pegasso->añadirRemolque(2);
        //var_dump($pegasso);

        $audi->set_peso(1400);
        $audi->set_color("Verde");
        $audi->añadirPersona(65);
        $audi->añadirPersona(65);
        //var_dump($audi);

        $audi->set_color("ROJO");
        $audi->añadirCadenaNieve(2);
        //var_dump($audi);

        $moto->set_color("Negro");
        $moto->set_peso(120);
        $moto->añadirPersona(80);
        $moto->ponerGasolina(20);
        //var_dump($moto);

        $pegasso->set_peso(10000);
        $pegasso->set_longitud(10);
        $pegasso->set_numPuertas(2);
        $pegasso->añadirRemolque(5);
        $pegasso->añadirPersona(80);
        //var_dump($pegasso);



        /*EJERCICIO 4*/

        $moto2 = new DosRuedas(150,"Rojo",300);
        $moto2->añadirPersona(70);
        //var_dump($moto2);

        $moto2->set_color("Verde");
        $moto2->set_cilindrada(1000);
        Vehiculo::ver_atributo($moto2);

        echo "<br><br>";

        $pegasso2 = new Camion(6000,"blanco",2,8);
        $pegasso2->añadirPersona(84);
        $pegasso2->set_color("Azul");
        Vehiculo::ver_atributo($pegasso2);

        echo "<br><br>";

        $maseratti = new Coche(2100,"gris",4,0);
        $maseratti->añadirCadenaNieve(2);
        $maseratti->añadirPersona(80);
        $maseratti->set_color("azul");
        $maseratti->quitarCadenaNieve(4);
        $maseratti->repintar("Negro");
        Vehiculo::ver_atributo($maseratti);


    ?>
</body>
</html>