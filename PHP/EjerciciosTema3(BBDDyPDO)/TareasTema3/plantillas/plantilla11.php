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

				//ALMACENAMOS EN UNA VARIABLE LA CONSULTA
				$result=$dwes->query('SELECT nombre_corto FROM producto');

				$producto=$result->fetch_object();
				while($producto!=null){
					
					echo "<option value='".$producto->nombre_corto."'>$producto->nombre_corto</option>";
					$producto=$result->fetch_object();
				}
				$dwes->close();
			?>

		</select>
		
		<button type="submit" name="enviar">ENVIAR</button>
	</form>
</div>

<div id="contenido">
	<h2>Contenido</h2>
	<?php
	if(isset($_POST['enviar'])){
		//var_dump ($_POST['nombreProducto']);
		//CONEXION
		$dwes = new mysqli('localhost', 'dwes', '123456', 'dwes');
		//COMPROBACION ERRORES CONEXION
		$error = $dwes->connect_errno;
		//SI HAY ERROR ...
		if($error!=null){
			echo "<p>Error $error conectando a la base de datos: $dwes->connect_error</p>";
			exit();
		//SI NO HAY ERRORES ...
		}else{
			$resultado= $dwes->query("SELECT * FROM stock WHERE producto = (SELECT cod FROM producto WHERE nombre_corto = '".$_POST['nombreProducto']."');");
			if($resultado){
				$stock = $resultado->fetch_array();
				while($stock!=null){
					print "<p>Hay ". $stock['unidades']. " unidades en stock ";

					$resultado2 = $dwes->query("SELECT nombre FROM tienda WHERE cod= '".$stock['tienda']."'; ");
					//print $stock['tienda'];
					if($resultado2){
						$nombreTienda=$resultado2->fetch_array();
						while($nombreTienda!=null){
							print "en la tienda ".$nombreTienda['nombre'].".</p>";
							$nombreTienda = $resultado2->fetch_array();
						}
					}

					$stock = $resultado->fetch_array();
				}
				
			}
		}
		$dwes->close();
	}
	?>
</div>

<div id="pie">
</div>
</body>
</html>
