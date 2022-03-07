<?php
function validar_dni($dni){
	$letra = substr($dni, -1);
	$numeros = substr($dni, 0, -1);
	if (substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros%23, 1) == $letra && strlen($letra) == 1 && strlen ($numeros) == 8){
		echo 'DNI valido';
	}else{
		echo 'DNI no valido';
	}
}
?>