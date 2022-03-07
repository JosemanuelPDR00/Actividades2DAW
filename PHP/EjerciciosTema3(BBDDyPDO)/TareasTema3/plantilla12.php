<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Plantilla para Ejercicios Tema 3</title>
  <link href="dwes.css" rel="stylesheet" type="text/css">
</head>

<body>

<div id="encabezado">
	<h1>Ejercicio: </h1>

	<form id="form_seleccion" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">

		<select name="nombreProducto">

			<?php
				//CONEXION
				$dwes = new mysqli('localhost', 'dwes', '123456', 'dwes');

				$result = $dwes->stmt_init();
				$result->prepare('SELECT nombre_corto FROM producto');
				$result->execute();
				$result->bind_result($nombre_corto);
				
				while($result->fetch()){
					echo "<option value='".$nombre_corto."'>$nombre_corto</option>";
				}

				$result->close();
				$dwes->close();
			?>

		</select>
		
		<button type="submit">ENVIAR</button>
	</form>
</div>

<div id="contenido">
	<h2>Contenido</h2>
	<?php

		$dwes = new mysqli('localhost', 'dwes', '123456', 'dwes');

		$consulta=$dwes->stmt_init();
		//$resultado= $dwes->query("SELECT * FROM stock WHERE producto = (SELECT cod FROM producto WHERE nombre_corto = '".$_POST['nombreProducto']."');");
		$consulta->prepare("SELECT unidades FROM stock WHERE producto = (SELECT cod FROM producto WHERE nombre_corto = '".$_POST['nombreProducto']."');");
		
		$consulta->execute();
		
		$consulta->bind_result($unidades);

		while($consulta->fetch()){
			print "<p>El producto: ".$_POST['nombreProducto']." : hay $unidades unidades. </p>";
		}
		$consulta->close();
		$dwes->close();

		?>
</div>

<div id="pie">
</div>
</body>
</html>
