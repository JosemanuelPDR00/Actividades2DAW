<?php
    function esCapicua($numero){
        $primera_cifra = 0;
        $ultima_cifra = 0;
        $segunda_cifra = 0;
        $penultima_cifra = 0;
        $capicua = false;
        //Sacamos la primera cifra
        if($numero < 10){
            $primera_cifra = $numero;
            $ultima_cifra = $numero;
        }else if(($numero >= 10) && ($numero <100)){
            $primera_cifra = $numero / 10;
            $primera_cifra = floor($primera_cifra);
        }else if(($numero >= 100) && ($numero < 1000)){
            $primera_cifra = $numero / 100;
            $primera_cifra = floor($primera_cifra);
        }else if(($numero >= 1000) && ($numero < 10000)){
            $primera_cifra = $numero / 1000;
            $primera_cifra = floor($primera_cifra);
            //Necesitamos la segunda cifra de los números de 4 y 5 cifras
            $segunda_cifra = $numero / 100;
            $segunda_cifra = floor($segunda_cifra);
            $segunda_cifra = $segunda_cifra % 10;
            //Sacamos la penúltima cifra
            $penultima_cifra = $numero % 100;
            $penultima_cifra = $penultima_cifra / 10;
            $penultima_cifra = floor($penultima_cifra);
        }else if(($numero >= 10000) && ($numero < 100000)){
            $primera_cifra = $numero / 10000;
            $primera_cifra = floor($primera_cifra);
            //Sacamos la segunda cifra
            $segunda_cifra = $numero / 1000;
            $segunda_cifra = floor($segunda_cifra);
            $segunda_cifra = $segunda_cifra % 10;
            //Sacamos la penúltima cifra
            $penultima_cifra = $numero % 100;
            $penultima_cifra = $penultima_cifra / 10;
            $penultima_cifra = floor($penultima_cifra);
        }
        //Sacamos la última cifra
        $ultima_cifra = $numero % 10;

        if(($primera_cifra == $ultima_cifra) && ($segunda_cifra == $penultima_cifra)){
            $capicua = true;
        }else{
            $capicua = false;
        }
        return $capicua;
    }

    function esPrimo($numero){
        $es_primo = true;
        //Empezamos el bucle en 2 y acabamos antes de llegar al numero introducido; asi si alguna vez es divisible sabremos que no es primo
        //En caso de que sea positivo o negativo habra que usar un bucle diferente
        if($numero >= 0){
            for($i=2; $i<$numero; $i++){
                if(($numero % $i) == 0){
                    //Si en algun caso es divisible, se descarta
                    $es_primo = false;
                }
            }
        }else{
            for($i=($numero+1); $i<-1; $i++){
                if(($numero % $i) == 0){
                    $es_primo = false;
                }
            }
        }
        return $es_primo;
    }

    function siguientePrimo($numero){
        $candidato  = $numero;
        $es_primo = true;
        $primo = 0;
        while($primo == 0){
            $candidato ++;
            for($i=2; $i<$candidato; $i++){
                if(($candidato % $i) == 0){
                    //Si en algun caso es divisible, se descarta
                    $es_primo = false;
                }
            }
            if($es_primo == true){
                $primo = $candidato;
            }else{
                $es_primo = true;
            }
        }
        return $primo;
    }

    function potencia($base,$exponente){
        $potencia = 0;
        for($i = 1; $i < $exponente; $i++){
            $potencia += $base * $base;
        }
        return $potencia;
    }

    function digitos($numero){
        $dig=0;
        $contador = $numero;
        while($contador>0){
            $contador = $contador/10;
            $contador = floor($contador);
            $dig++;
        }
        return $dig;
    }

    function voltea($numero){
        $reverso = 0;
        $operacion = $numero;
        while($operacion>0){
            //Multiplicamos el numero por 10 para que, al añadir el proximo valor del numero no se sumen
            $reverso = $reverso * 10;
            //Cogemos el ultimo numero...
            $reverso += $operacion % 10;
            $operacion = $operacion / 10;
            $operacion = floor($operacion);
        }
        return $reverso;
    }

    function digitoN($numero, $posicion){
        $contar = $numero;
        $operacion = $numero;
        $localizacion = -1; //La primera posición será 0
        $cifra = 0;

        while($contar > 0){
            $contar = $contar/10;
            $contar = floor($contar);
            $localizacion ++;
        }

        while($operacion > 0){
            $cifra = $operacion % 10;
            if($localizacion == $posicion){
                return $cifra;
            }
            $operacion = $operacion / 10;
            $operacion = floor($operacion);
            $localizacion --;
        }
    }

    function posicionDeDigito($numero, $digito){
        $posicion = -1;
        $contar = $numero;
        $operacion = $numero;
        $longitud = -1;
        $cifra = 0;
        while($contar > 0){
            $contar = $contar / 10;
            $contar = floor($contar);
            $longitud ++;
        }

        while($operacion > 0){
            $cifra = $operacion % 10;
            if($cifra == $digito){
                $posicion = $longitud;
            }
            $operacion = $operacion / 10;
            $operacion = floor($operacion);
            $longitud --;
        }
        return $posicion;
    }

    function quitaPorDetras($numero, $cantidad){
        $cortar = $numero;
        $contador = 0;

        while($contador < $cantidad){
            $cortar = floor($cortar / 10);
            $contador++;
        }
        return $cortar;
    }

    function quitaPorDelante($numero, $cantidad){
        $quitar = voltea($numero);
        $quitar = quitaPorDetras($quitar, $cantidad);
        $quitar = voltea($quitar);
        return $quitar;
    }

    function pegaPorDetras($numero, $digito){
        $pegar = $numero;
        $pegar *= 10;
        //Para añadir UN dígito, solo es necesario multiplicar el número por 10 y sumar el digito
        $pegar += $digito;
        return $pegar;
    }

    function pegaPorDelante($numero, $digito){
        $pegar = voltea($numero);
        $pegar *= 10;
        $pegar += $digito;
        $pegar = voltea($pegar);
        return $pegar;
    }

    function trozoDeNumero($numero, $inicio, $fin){
        $trocear = $numero;
        $trocear = quitaPorDetras($trocear, $fin);
        $trocear = quitaPorDelante($trocear, $inicio);
        return $trocear;
    }

    function juntaNumeros($primero, $segundo){
        $juntar = $primero;
        $contar = $segundo;
        $cantidad = 0;
        //Contamos las cifras del segundo número
        while($contar>0){
            $contar = floor($contar/10);
            $cantidad ++;
        }
        //Multiplicamos el primer número por 10 tantas veces como cifras tenga el número
        for($i = 0; $i<$cantidad; $i++){
            $juntar *= 10;
        }
        //Por último, solo tenemos que sumar el segundo número
        $juntar += $segundo;
        return $juntar;
    }
?>