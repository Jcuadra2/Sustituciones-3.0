<!DOCTYPE html>
<html lang="es">
<head>
    <title>Modificar Datos</title>
    <meta charset="utf-8">
    <link type="text/css" href="../css/estilo_principal.css" rel="stylesheet" />
    <link href='https://fonts.googleapis.com/css?family=Shadows+Into+Light|Covered+By+Your+Grace' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Jockey+One' rel='stylesheet' type='text/css'>
</head>
<body>
	<div id="imagen">
            <img src="../images/logo.png"/>
    </div>
    <div id="login">
		<?php
	        require_once"/../Conexion/clase_conexion.php";
	        session_start();
	        $id_user=$_SESSION['gestor'];
	        $nombre=$_COOKIE['c_gestor'];
	        if(isset($_SESSION['gestor'],$_COOKIE['c_gestor'])){
	            echo '<p>'.$nombre.'<p>';
	        }else{
	            header("Location:../error.php");
	        }
	        echo '<p>Imagen</p>';
	        echo '<p id="bot"><button id="btn_cs"><a style="text-decoration:none;color:black" href="../cerrar_sesion.php">Cerrar Sesion</a></button></p>';
        ?>
    </div>
    <div id="titulo">
        <h1>Modificar Datos Secciones</h1>
    </div>
	</br></br>
	<div id="contenido_importar">
		<?php
			$id_seccion=$_POST["id_seccion"];
			$nombre=$_POST["nombre"];
			$id_old=$_POST["id_old"];

            $conexion=new conexionBD();
            $conexion->conectar();
            $consulta = 'SELECT * FROM secciones WHERE idseccion="'.$id_old.'";';
            $conexion->consultar($consulta);
            if($fila = $conexion->resultado->fetch_array()){
               $bd_id=$fila["idseccion"];
               echo '<h1>La seccion con Id: '.$bd_id.'</h1>'; 
            }else{
            	echo 'error';
            }
			$num = $conexion->n_filas_devueltas();
			if($num>0){
				$conexion2=new conexionBD();
				$conexion2->conectar();
				$consulta = 'UPDATE secciones SET idseccion="'.$id_seccion.'", nombre="'.$nombre.'" WHERE idseccion="'.$id_old.'";';
	            $conexion2->consultar($consulta);
	            $afectadas = $conexion2->filas_afectadas();

				if($afectadas>0){
					echo '<h1> a sido modificada correctamente</h1>';
			    }
				else{
			        echo '<h1> no se a modificado</h1>';
			    }
			}
		    $conexion->desconectar();
 		?>
	</div>
	<div id="btn_atras">
        <a href="secciones.php"><img src="../images/atras.png"/></a>
    </div>
</body>
</html>