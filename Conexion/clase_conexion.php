<?php
	require "config.class.php";
	class conexionBD{
			var $servidor;
			var $usuario;
			var $contrasenia;
			var $base_datos;
			var $resultado;
			var $conexion;

		function conexionBD(){
			$conf=new conf_class();
			$this->servidor=$conf->getHostdb();
			$this->usuario=$conf->getUserdb();
			$this->contrasenia=$conf->getPassdb();
			$this->base_datos=$conf->getdb();
		}

		function conectar(){
			$this->conexion = new mysqli($this->servidor,$this->usuario,$this->contrasenia,$this->base_datos);
			if($this->conexion->connect_errno){
				echo 'Error de Conexion';
			}
		}

		function prepare($consulta){
			$sentencia = $this->conexion->prepare($consulta);
			return $sentencia;
		}

		function desconectar(){
			$this->conexion->close();
		}

		function consultar($consulta){
			$this->resultado = $this->conexion->query($consulta);
		}

		function n_filas_devueltas(){
			$num = $this->resultado->num_rows;
			return $num;
		}
        
        function filas_afectadas(){
            $afectadas = $this->conexion->affected_rows;
            return $afectadas;
        }
        function error(){
        	$error = $this->conexion->error;
        	return $error;
        }

	}	
?>