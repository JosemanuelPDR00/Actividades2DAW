<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./estilo/style.css">
    <title>Ahorcado</title>
</head>
<body>
    <div id="codigo">
        <div id="titulo">
            <h1>AHORCADO</h1>
        </div>
        <hr>

        <h2 id="buscaPalabra">COMPLETA LA PALABRA:</h2>
        <div id="contenedorDatos">
            <?php

                //con esto lo que conseguimos es mantener el valor de los intentos
                if(isset($_POST['intento'])){
                    $intento=$_POST['intento'];
                }
                //guardamos la palabra secreta en una variable.
                if(isset($_POST['palabraSecreta'])){
                    $palabraSecreta=$_POST['palabraSecreta'];
                    if(!isset($_POST['cadenaGuiones'])){
                        //aqui igualamos los guiones necesarios al tamaño de la palabra.
                        for($i=0;$i<strlen($palabraSecreta);$i++){
                            $cadenaGuiones.="_";
                        }
                    }
                }
                //guardamos la cadena de guiones que guarda los guiones que simulan la palabra
                //en una variable
                if(isset($_POST['cadenaGuiones'])){
                    $cadenaGuiones=$_POST['cadenaGuiones'];
                }
                //si pulsamos sobre el boton enviarLetra, guardamos el valor en la variable letra
                if(isset($_POST['EnviarLetra'])){
                    $letra = $_POST['introLetra'];
                    //si la letra esta en la palabra secreta, nos da un valor numerico de la posicion
                    if(strpos($palabraSecreta, $letra)!==false){
                        //recorremos la cadena de guiones y sustituimos el valor guion bajo por
                        //la letra introducida
                        for($i=0;$i<strlen($palabraSecreta);$i++){

                            if($palabraSecreta[$i]==$letra){
                                $cadenaGuiones[$i]=$letra;
                            }
                        }
                    }else{
                        //si es incorrecto, incrementamos un error y seguimos el juego.
                        $intento++;
                        //si el numero de intentos es 12, termina el juego.
                        if($intento==12){
                            echo "Has perdido la partida. Intentalo de nuevo.";
                        }
                    }
                }

                //palabras
                if(isset($_POST['EnviarPalabra'])){
                    $palabra = $_POST['introPalabra'];
                    if($_POST['introPalabra']!=$palabra){
                        echo "Palabra Incorrecta.";
                        $intento=12;
                    }else{
                        echo "Enhorabuena has ganado.";
                    }
                }



                if(!isset($_POST['EnviarLetra']) && !isset($_POST['EnviarPalabra']) && !isset($_POST['Enviar'])){
                    $intento=1;
            
            ?>
                    <form action="#" method="post">
                        <input type="hidden" name="intento" value="<?php echo $intento; ?>">
                        <input type="text" name="palabraSecreta" placeholder="Introduce la palabra secreta">
                        <input type="submit" value="Enviar" name="Enviar">
                    </form>
            <?php 
            
                }else{

            ?>
                    <form action="#" method="post">
                        <input type="hidden" name="palabraSecreta" value="<?php echo $palabraSecreta; ?>">
                        <input type="hidden" name="intento" value="<?php echo $intento; ?>">
                        <input type="hidden" name="cadenaGuiones" value="<?php echo $cadenaGuiones; ?>">

                        <input type="text" name="introLetra" class="introDatos" maxlength="1">
                        <input type="submit" value="EnviarLetra" name="EnviarLetra"><br><br>

                        <input type="text" name="introPalabra" class="introDatos" minlength="2">
                        <input type="submit" value="EnviarPalabra" name="EnviarPalabra">
                    </form>
                    <br>
            <?php

                }

            ?>
        </div>

    </div>

    <img src="./imagenes/<?php echo $intento; ?>.png">

    <?php

        for($i=0;$i<strlen($cadenaGuiones);$i++){
            echo $cadenaGuiones[$i]." ";
        }

        echo "<br><br>";
        //si el numero de intentos es 12, termina el juego.
        if($intento==12){
            echo "Has perdido la partida. Intentalo de nuevo.";
        }

    ?>


</body>
</html>