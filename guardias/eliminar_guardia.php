<!DOCTYPE html>
<html lang="es">
<head>
    <title>Gestor</title>
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
        <h1>Profesor Asignado</h1>
    </div>
    <div id="contenido_importar">
        <?php
            $dni=$_GET["dni"];
            $conexion=new conexionBD();
            $conexion->conectar();
            $consulta = 'UPDATE profesores SET n_guardias=n_guardias-1,n_guardias_tot=n_guardias_tot-1 WHERE dni="'.$dni.'";';
            $conexion->consultar($consulta);
            $afectadas = $conexion->filas_afectadas();
            if($afectadas>0){
                $conexion2=new conexionBD();
                $conexion2->conectar();
                $consulta = 'DELETE FROM guardias WHERE dni_prof_guardia="'.$dni.'";';
                $conexion2->consultar($consulta);
                $afectadas = $conexion2->filas_afectadas();
                echo '<h1>Se ha eliminado la Asignacion</h1>';
            }
        ?>
    </div>
    <div id="btn_atras">
        <a href="calendario_simple.php"><img src="../images/atras.png"/></a>
    </div>
</body>
</html>