<?php
	require_once("/../Conexion/clase_conexion.php");

	$dni=$_POST["dni"];
	$conexion = new conexionBD();
	$conexion->conectar();
	$consulta='SELECT dni FROM profesores WHERE dni="'.$dni.'";';
	$conexion->consultar($consulta);
	$num=$conexion->n_filas_devueltas();
	if($num>0){
		echo 'no';
	}else{
		echo 'si';
	}
?>