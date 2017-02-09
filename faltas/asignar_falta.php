<!DOCTYPE html>
<html lang="es">
<head>
    <title>Insertar Datos</title>
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
        <h1>Alta Profesor</h1>
    </div>
    </br></br>
    <div id="contenido_importar">
        <?php
            $dni=$_POST["dni"];
            $hora=$_POST["hora"];
            $tareas=$_POST["tareas"];
            $seccion=$_POST["seccion"];
            $fecha=$_POST["fecha"];

            setlocale(LC_ALL,"es_ES");
            $dia_semana=date('w',strtotime($fecha));

            $conexion=new conexionBD();
            $conexion->conectar();
            $consulta = 'INSERT INTO faltas (fecha,hora,tareas,dia_semana,idseccion,dni_prof_falta)  VALUES ("'.$fecha.'" ,"'.$hora.'","'.$tareas.'","'.$dia_semana.'","'.$seccion.'","'.$dni.'")';
            $conexion->consultar($consulta);
            $afectadas=$conexion->filas_afectadas();

            if($afectadas>0){
                echo '<h1>La falta del Profesor con DNI: "'.$dni.'" </h1>';
                echo '<h1>se ha registrado correctamente</h1>';
            }else{
                echo '<h1>No se pudo registrar la falta</h1>';
            }
        ?>    
    </div>
    <div id="btn_atras">
        <a href="reg_faltas_frm.php"><img src="../images/atras.png"/></a>
    </div>
</body>
</html>