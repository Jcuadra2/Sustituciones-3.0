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
        <h1>Gestor</h1>
    </div>
     <div id="menu">
        <ul>
            <li><a style="text-decoration:none;color:black" href="alta_profesor_frm.php">Alta Nuevo Profesor</a></li>
        </ul>
    </div>
    <div id="contenido_calnd">
        <?php
            $conexion=new conexionBD();
            $conexion->conectar();
            $consulta = 'SELECT * FROM profesores';
            $conexion->consultar($consulta);
            $num = $conexion->n_filas_devueltas();
            if($num>0){
                echo '<form name="formu" action="updt_delt_profesor_frm.php" method="post" autocomplete="off">';
                    /*echo 'DNI: <input value="'.$fila["dni"].'" type="text" name="dni" readonly="readonly">';
                    echo '&nbsp&nbsp';
                    echo 'Nombre y Apellidos: <input value="'.$fila["nombre"].'" type="text" name="nombre" >';
                    echo '&nbsp&nbsp';
                    echo 'Correo: <input value="'.$fila["correo"].'" type="text" name="correo" >';
                    echo '&nbsp&nbsp';*/
                    echo 'Seleccione Profesor:';
                    echo '<select name="dni" id="select_prof" required>';
                        while($fila=$conexion->resultado->fetch_array()){
                            echo '<option value='.$fila["dni"].'>'.$fila["nombre"].'</option>';
                        } 
                    echo '</select>';
                    echo '<input type="submit" name="accion" value="Modificar" id="btn_cs">';
                    echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
                    echo '<input type="submit" name="accion" value="Eliminar" id="btn_cs">';
                    //echo '<button id="btn_cs"><a style="text-decoration:none;color:black" href="borrar_profesor.php">Eliminar</a></button>';
                    echo '</br></br>';
                    echo '-----------------------------------------------------------------';
                    echo '</br></br>';
                echo '</form>'; 
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
