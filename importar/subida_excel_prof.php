<!DOCTYPE html>
<html lang="es">
<head>
    <title>Administrador</title>
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
        <h1>Gestor</h1>
    </div>
    <div id="contenido_importar">
    	<?php
			$ruta = 'archivos/'.basename($_FILES["fichero"]["name"]);
            if(copy($_FILES['fichero']['tmp_name'],$ruta)){
                require_once("/../Conexion/simplexlsx.class.php");
                $conexion=new conexionBD();
                $conexion->conectar();
                $consulta = 'DELETE FROM PROFESORES WHERE n_guardias<=0';
                $conexion->consultar($consulta);
                
                $xlsx = new SimpleXLSX($ruta);
                $array = $xlsx->rows();
                for($i=0;$i < sizeof($array);$i++){
                        $dni = $array[$i][0];
                        $nombre = $array[$i][1];
                        $correo = $array[$i][2];
                        $guardias = "0";
                        $guardias_tot = "0";
                        $conexion2=new conexionBD();
                        $conexion2->conectar();

                        $consulta='INSERT INTO profesores(dni, nombre, correo, n_guardias, n_guardias_tot) VALUES(?,?,?,?,?)';

                        $sentencia=$conexion2->prepare($consulta);
                            $sentencia->bind_param('ssssi',$dni,$nombre,$correo,$guardias,$guardias_tot);
                            $sentencia->execute();
                            $conexion2->resultado = $sentencia->get_result();
                }
                echo '<h1>Datos Almacenados Correctamente</h1>';
            }else{
                echo "¡Posible ataque de subida de ficheros!\n";
            }
    
		?>
	</div>
    <div id="btn_atras">
        <a href="../gestor.php"><img src="../images/atras.png"/></a>
    </div>
</body>
</html>

