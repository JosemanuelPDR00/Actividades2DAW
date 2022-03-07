<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CifradoCesar</title>
</head>
<body>
    
    <?php

        error_reporting(E_ALL);
        ini_set('display_errors', '1');

        $indice = 19;
        $i = 0;
        $cadenaFinal = "";

        $cadena = "Xizi ycm Iztizpbw ami lmdcmsbw lmjmzia pubmzxzmbiz ms dpssiukpkw 'Si Tizptwzmui' ikwtxiviulwsw kwu ikwzlma lm *cpbizzi lcziubm cuw lm swa zmkzmwa ycm ycmliu. Am ikmxbi kwtw sc*iz: ms zmkzmw, ms lmxizbitmubw lm punwztibpki w ms icsi. Bwlw mssw xzmdpw idpaw xizi idpaiz is xcjspkw ycm mabm pubmzmailw. XOziuX";
        $cadena = strtolower($cadena);


        while($i < strlen($cadena)){
                
            if(substr($cadena, $i, 1) == " "){
                $cadenaFinal .= " ";

            }else if(substr($cadena, $i, 1) == "."){
                $cadenaFinal .= ".";

            }else if(substr($cadena, $i, 1) == ","){
                $cadenaFinal .= ",";

            }else if(substr($cadena, $i, 1) == ":"){
                $cadenaFinal .= ":";

            }else if(substr($cadena, $i, 1) == "'"){
                $cadenaFinal .= "'";

            }else{
                $letra = substr($cadena, $i, 1);
                $letra = letraNum($letra, $indice);
                $letra = numLetra($letra);
                $cadenaFinal .= $letra;
            }
        
        $i++;

        }

        function letraNum($letra, $indice){

            $alfabetoMayus = ["a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l" ,"m", "n", "*", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z"];

            for($i = 0; $i < count($alfabetoMayus); $i++){

                if($letra == $alfabetoMayus[$i]){
                    $letra = $i;
                    $letra += $indice;
                }
            }

            if($letra >= count($alfabetoMayus)){
                $letra = count($alfabetoMayus) - $letra;
                $letra = abs($letra);
            }

            return $letra;

        }

        function numLetra($letra){
            $alfabetoMayus = ["a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l" ,"m", "n", "*", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z"];
            return $alfabetoMayus[$letra];
        }

        $i = 0;

        while($i < strlen($cadena)){

            if($cadenaFinal[$i] == "*"){
                echo '&ntilde;';
            }else{
                echo $cadenaFinal[$i];
            }

            $i++;
        }
    ?>

</body>
</html>