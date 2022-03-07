<?php
    function generaArrayInt($tam, $min, $max){
        $arr = new SplFixedArray($tam);
        for($i = 0; $i < $tam; $i++){
            $arr[$i] = rand($min, $max);
        }
        return $arr;
    }

    function minimoArrayInt($arr){
        $min = $arr[0];
        foreach($arr as $n){
            if($n < $min){
                $min = $n;
            }
        }
        return $min;
    }

    function maximoArrayInt($arr){
        $max = $arr[0];
        foreach($arr as $n){
            if($n > $max){
                $max = $n;
            }
        }
        return $max;
    }

    function mediaArrayInt($arr){
        $total = 0;
        $media = 0;
        foreach($arr as $n){
            $total += $n;
        }
        $media = $total / count($arr);
        return $media;
    }

    function estaEnArrayInt($arr, $numero){
        $esta = false;
        foreach($arr as $n){
            if($n == $numero){
                $esta = true;
            }
        }
        return $esta;
    }

    function posicionEnArray($arr, $numero){
        $posicion = 0;
        foreach($arr as $pos => $n){
            if($n == $numero){
                $posicion = $pos;
                //Si queremos quedarnos con la primera aparición del número, podemos usar un break. Si no, nos quedaremos con su última aparición
                break;
            }
        }
        return $posicion;
    }

    function volteaArrayInt($arr){
        $voltear = new SplFixedArray(count($arr));
        //Empezamos un array por el principio y el otro por el final, es la manera más facil de rotar un array completo
        for($i = 0, $j = (count($arr)-1); $i < count($arr); $i++, $j--){
            $voltear[$i] = $arr[$j];
        }
        return $voltear;
    }

    function rotaDerechaArrayInt($arr, $dcha){
        $aux = 0;
        for($i=0; $i < $dcha; $i++){
            $aux = $arr[count($arr)-1];
            for($j = (count($arr)-1); $j >= 0; $j--){
                if($j == 0){
                    $arr[$j] = $aux;
                }else{
                    $arr[$j] = $arr[$j-1];
                }
            }
        }
        return $arr;
    }

    function rotaIzquierdaArrayInt($arr, $izqda){
        $aux = 0;
        for($i=0; $i < $izqda; $i++){
            $aux = $arr[0];
            for($j = 0; $j < count($arr); $j++){
                if($j == (count($arr)-1)){
                    $arr[$j] = $aux;
                }else{
                    $arr[$j] = $arr[$j+1];
                }
            }
        }
        return $arr;
    }
?>