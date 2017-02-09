<!DOCTYPE html>
<html lang="es">
<head>
    <title>Borrar Datos</title>
    <meta charset="utf-8">
    <link type="text/css" href="../css/estilo_principal.css" rel="stylesheet" />
    <link href='https://fonts.googleapis.com/css?family=Shadows+Into+Light|Covered+By+Your+Grace' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Jockey+One' rel='stylesheet' type='text/css'>
</head>
 
<body>
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
        <h1>Borrar Seccion</h1>
    </div>
    </br></br>
    <div id="contenido_importar">
        <?php
            $id_seccion=$_GET["id_seccion"];

            $conexion=new conexionBD();
            $conexion->conectar();
            $consulta = 'SELECT * FROM secciones WHERE idseccion="'.$id_seccion.'";';
            $conexion->consultar($consulta);
            if($fila = $conexion->resultado->fetch_array()){
               $bd_id=$fila["idseccion"];
               echo '<h1>La seccion con Id: '.$bd_id.'</h1>'; 
            }
            $num = $conexion->n_filas_devueltas();
            if($num>0){
                $conexion2=new conexionBD();
                $conexion2->conectar();
                $consulta = 'DELETE FROM secciones WHERE idseccion="'.$id_seccion.'";';
                $conexion2->consultar($consulta);
                $afectadas = $conexion2->filas_afectadas();

                if($afectadas>0){
                    echo '<h1> a sido eliminada</h1>';
                }
                else{
                    echo '<h1> no a podido eliminarse</h1>';
                } 
            }else{
                echo '<h1>Eror al recuperar los datos</h1>';
            }
            $conexion->desconectar();
        ?>
    </div>
    <div id="btn_atras">
        <a href="secciones.php"><img src="../images/atras.png"/></a>
    </div>
</body>
</html>