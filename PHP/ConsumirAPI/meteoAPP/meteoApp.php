<?php
    if(array_key_exists('submit', $_GET)) {
        // comprobamos si el input esta vacio
        if (!$_GET['city']) {
            $error = "Por favor, rellena el campo de busqueda para obtener una respuesta";
        }
        if ($_GET['city']) {
            $apiData = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=" . $_GET['city'] . "&lang=es&appid=fc60f31c1c7fcd8952fc59cfc2c438f7");
            //echo "$apiData";
            $weatherArray = json_decode($apiData, true);
            //print_r($weatherArray);

            if ($weatherArray['cod'] == 200) {
                $tempCelsius = intval($weatherArray['main']['temp'] - 273);
                $windSpeed = intval($weatherArray['wind']['speed'] * 3.6);
                $sunrise = $weatherArray['sys']['sunrise'];
                $sunset = $weatherArray['sys']['sunset'];
                $name = $weatherArray['name'];
                $country = $weatherArray['sys']['country'];

                $weather = "<h5><b>$name, $country: $tempCelsius&deg;C</b></h5>";
                $weather .= "<b>Condiciones actuales: </b>" . $weatherArray['weather']['0']['description'] . "<br>";
                $weather .= "<b>Velocidad del viento: </b>" . $windSpeed . "km/h <br>";
                date_default_timezone_set('UTC');
                $weather .= "<b>Salida del sol a las </b>" . date("H:i:s", $sunrise) . '<br>';
                $weather .= "<b>Puesta del sol a las </b>" . date("H:i:s", $sunset) . '<br>';
            } else {
                $error = "No hemos encontrado la ciudad indicada";
            }
            
        }
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="style.css"/>


    <title>Meteo APP</title>

  </head>
  <body>
    
    <div class="container">
        <h1>MeteoAPP <i class="bi bi-cloud-sun"></i> </h1> 
        <h2>Conoce la previsión meteorológica</h2>
        <br>
        <br>
        <form action="" method="get">
            <p><label for="city">Introduce el nombre de una ciudad</label></p>
            <input type="text" name="city" id="city" placeholder="Nombre de la ciudad">
            <button type="submit" name="submit" class="btn btn-success">Consultar</button>
            <br>
            <br>
            <div class="output">
                <?php 
                if (isset($weatherArray)) {
                    echo '<div class="alert alert-success">';
                    echo $weather; 
                    echo '</div>';
                }

                if (isset($error)){
                    echo '<div class="alert alert-danger">';
                    echo $error; 
                    echo '</div>';
                }
                ?>
            </div>
        </form>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>