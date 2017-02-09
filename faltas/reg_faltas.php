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
        <h1>Registrar Faltas</h1>
    </div>
    <div id="contenido_importar">
        <?php
            $dni=$_POST["dni"];
            $conexion=new conexionBD();
            $conexion->conectar();
            $consulta = 'SELECT * FROM secciones';
            $conexion->consultar($consulta);
            $num = $conexion->n_filas_devueltas();

            echo '<form name="formu" action="asignar_falta.php" method="post" autocomplete="off">';
                echo '<input type="hidden" value="'.$dni.'" name="dni">';
                echo 'Fecha: <input type="date" name="fecha" placeholder="Seleccione Fecha" required/>';
                echo '</br></br>';
                echo 'Hora (1-6): <input id="n_g" type="text" name="hora" required/>';
                echo '</br></br>';
                echo 'Tareas: <input type="text" name="tareas" required/>';
                echo '</br></br>';
                echo 'Seccion: ';
                echo '<select name="seccion" required>';
                    if($num>0){
                        while($fila=$conexion->resultado->fetch_array()){
                            echo '<option value='.$fila["idseccion"].'>'.$fila["nombre"].'</option>';
                        }
                    }
                echo '</select>';
                echo '</br></br>';
                echo '<input type="submit" name="registrar" value="Registrar" id="btn_cs">';
                echo '</br></br>';
                echo '-----------------------------------------------------------------';
                echo '</br></br>';
            echo '</form>'; 
                //}
        ?>
    </div>
    <div id="btn_atras">
        <a href="reg_faltas_frm.php"><img src="../images/atras.png"/></a>
    </div>
</body>
</html>
