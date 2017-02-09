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
        <h1>Registro de Faltas</h1>
    </div>
    <div id="contenido_calnd">
        <?php
            $conexion=new conexionBD();
            $conexion->conectar();
            $consulta = 'SELECT DISTINCT dni_prof_falta,fecha,hora,dia_semana,tareas,idseccion FROM faltas INNER JOIN profesores';
            $conexion->consultar($consulta);
            $num = $conexion->n_filas_devueltas();
            if($num>0){
                while($fila=$conexion->resultado->fetch_array()){
                    echo '<form name="formu" action="updt_delt_profesor_frm.php" method="post" autocomplete="off">';
                        echo '<input value="'.$fila["dni_prof_falta"].'" type="text" name="dni" style="margin-left:150px">';
                        echo '&nbsp&nbsp';
                        echo 'Fecha: <input value="'.$fila["fecha"].'" type="text" name="fecha" >';
                        echo '&nbsp&nbsp';
                        echo 'Hora: <input id="n_g" value="'.$fila["hora"].'" type="text" name="fecha" >';
                        echo '&nbsp&nbsp';
                        if($fila["dia_semana"]==1){
                            echo 'Dia semana: <input style="width:60px" value="Lunes" type="text" name="fecha" >';
                            echo '&nbsp&nbsp';
                        }elseif($fila["dia_semana"]==2){
                            echo 'Dia semana: <input style="width:60px" value="Martes" type="text" name="fecha" >';
                            echo '&nbsp&nbsp';
                        }elseif($fila["dia_semana"]==3){
                            echo 'Dia semana: <input style="width:60px" value="Miercoles" type="text" name="fecha" >';
                            echo '&nbsp&nbsp';
                        }elseif($fila["dia_semana"]==4){
                            echo 'Dia semana: <input style="width:60px" value="Jueves" type="text" name="fecha" >';
                            echo '&nbsp&nbsp';
                        }elseif($fila["dia_semana"]==5){
                            echo 'Dia semana: <input style="width:60px" value="Viernes" type="text" name="fecha" >';
                            echo '&nbsp&nbsp';
                        }
                        /*echo '<input type="submit" name="accion" value="Modificar" id="btn_cs">';
                        echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
                        echo '<input type="submit" name="accion" value="Eliminar" id="btn_cs">';
                        echo '<button id="btn_cs"><a style="text-decoration:none;color:black" href="borrar_profesor.php">Eliminar</a></button>';*/
                        echo '</br></br>';
                        echo '-----------------------------------------------------------------';
                        echo '</br></br>';
                    echo '</form>'; 
                }
                
            }else{
                echo '<h1>No hay profesores para mostrar</h1>';
            }
        ?>
    </div>
    <div id="btn_atras">
        <a href="../gestor.php"><img src="../images/atras.png"/></a>
    </div>
</body>
</html>