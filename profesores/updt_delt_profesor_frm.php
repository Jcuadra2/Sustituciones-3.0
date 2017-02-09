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
   <div id="cabecera">
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
    </div>
    <div id="titulo">
        <h1>Modificar Datos Profesor</h1>
    </div>
	</br></br>
	<div id="contenido">
		<?php
		$bd_dni=$_POST["dni"];
			if ($_POST["accion"] == "Modificar") {
			    $conexion=new conexionBD();
	            $conexion->conectar();
	            $consulta = 'SELECT * FROM profesores WHERE dni="'.$bd_dni.'";';
	            $conexion->consultar($consulta);
	            $num = $conexion->n_filas_devueltas();
	            $fila = $conexion->resultado->fetch_array();
	            if($num>0){
	                echo '<form name="formu" action="modificar_profesor.php" method="post" autocomplete="off">';
	                	echo '<input type="hidden" name="dni" value="'.$fila["dni"].'">';
	                    echo 'Nombre y Apellidos: <input value="'.$fila["nombre"].'" type="text" name="nombre" >';
	                    echo '&nbsp&nbsp';
	                    echo 'Correo: <input value="'.$fila["correo"].'" type="text" name="correo">';
	                    echo '&nbsp&nbsp';
	                    echo '<input type="submit" name="Modificar" value="Modificar" id="btn_cs">';
	                    echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
	                    echo '</br></br>';
	                    echo '-----------------------------------------------------------------';
	                    echo '</br></br>';
	                echo '</form>'; 
	            }else{
	                echo '<h1>No hay profesores para mostrar</h1>';
	            }
			} else if ($_POST["accion"] == "Eliminar") {
			    header("Location:borrar_profesor.php?dni=$bd_dni");
            }else {
			   echo '<h3>Mierda puta</h3>';
			}			
 		?>
	</div>
	<div id="btn_atras">
        <a href="profesores.php"><img src="../images/atras.png"/></a>
    </div>
</body>
</html>
