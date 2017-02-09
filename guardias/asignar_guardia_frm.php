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
        <h1>Asignación de Guardias</h1>
    </div>
    <div id="contenido_calnd">
    <?php
        $hora=$_GET["id_h"];
        $dia=$_GET["id_d"];
        $conexion=new conexionBD();
        $conexion->conectar();
        $consulta = 'SELECT * FROM profesores WHERE n_guardias="0" ORDER BY n_guardias';
        $conexion->consultar($consulta);
        $num = $conexion->n_filas_devueltas();
        if($num>0){
            while($fila = $conexion->resultado->fetch_array()){
                echo '<form name="formu" action="asignar_guardia.php" method="post" autocomplete="off">';
                    echo 'Nombre y Apellidos: <input value="'.$fila["nombre"].'" type="text" name="nombre" >';
                    echo '&nbsp&nbsp';
                    echo 'Nº Guardias Semanal: <input id="n_g" value="'.$fila["n_guardias"].'" type="text" name="n_guardias" >';
                    echo '&nbsp&nbsp';
                    echo 'Nº Guardias Totales: <input id="n_g" value="'.$fila["n_guardias_tot"].'" type="text" name="n_guardias_tot" >';
                    echo '&nbsp&nbsp';
                    echo '<input type="hidden" value="'.$fila["dni"].'" name="dni">';
                    echo '&nbsp&nbsp';
                    echo 'Hora Asignada: <input id="n_g" type="text" name="hora" value="'.$hora.'">';
                    echo '&nbsp&nbsp';
                    echo 'Dia semana: <input style="width:60px" type="text" name="d_semana" value="'.$dia.'">';
                    echo '&nbsp&nbsp';
                    echo '<input type="submit" name="Asignar" value="Asignar" id="btn_cs">';
                    echo '</br></br>';
                    echo '-----------------------------------------------------------------';
                    echo '</br></br>';
                echo '</form>'; 
            }
        }else{
            echo '<h1 style="margin-left:350px">Ningun Profesor para Asignar</h1>';
        }
        ?>
    </div>
    <div id="btn_atras">
        <a href="horario_sem.php"><img src="../images/atras.png"/></a>
    </div>
</body>
</html>