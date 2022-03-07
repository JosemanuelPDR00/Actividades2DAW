<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<title>Plantilla para Ejercicios Tema 3</title>
</head>
<body>
<?php
		$dwes = new PDO('mysql:host=localhost;dbname=dwes', 'dwes', '123456');

?>
<div id="encabezado">
	<h1>Ejercicio: </h1>
	<form id="form_seleccion" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
		<select name="nombreProducto">
			<?php
				$result = $dwes->query('SELECT nombre_corto FROM producto');
				
				while($fila = $result->fetch()){
					echo "<option value='".$fila['nombre_corto']."'>".$fila['nombre_corto']."</option>";
				}

				$result=null;
				$fila=null;
			?>

		</select>
		
		<button type="submit" name="enviar">ENVIAR</button>
	</form>
</div>

<div id="contenido">
	<h2>Contenido</h2>
	<?php
		if(isset($_POST['enviar'])){
			//$resultado= $dwes->query("SELECT * FROM stock WHERE producto = (SELECT cod FROM producto WHERE nombre_corto = '".$_POST['nombreProducto']."');");
			$consulta=$dwes->query("SELECT unidades,tienda FROM stock WHERE producto = (SELECT cod FROM producto WHERE nombre_corto = '".$_POST['nombreProducto']."');");
			
			while($fila=$consulta->fetch()){
				print "<p>El producto: ".$_POST['nombreProducto']." : hay". $fila['unidades'] ." unidades ";
				$consulta2=$dwes->query("SELECT nombre FROM tienda WHERE cod= '".$fila['tienda']."';");
				if($consulta2){

					while($nombreTienda=$consulta2->fetch()){
						print "en la tienda ".$nombreTienda['nombre'].".</p>";
					
					}

				}

			}
			$consulta=null;
			$fila=null;
			$dwes=null;
			
		}
		?>
</div>

<div id="pie">
</div>
</body>
</html>
