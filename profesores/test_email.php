<?php
	require_once("/../Conexion/clase_conexion.php");

	$email=$_POST["correo"];
	$conexion = new conexionBD();
	$conexion->conectar();
	$consulta='SELECT * FROM profesores WHERE correo="'.$email.'";';
	$conexion->consultar($consulta);
	$num=$conexion->n_filas_devueltas();
	if($num>0){
		echo 'no';
	}else{
		echo 'si';
	}
?>