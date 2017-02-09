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
     <div id="menu">
        <ul>
            <li><a href="faltas_prof.php" style="text-decoration:none;color:black">Registro de Faltas</a></li>
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
                echo '<form name="formu" action="reg_faltas.php" method="post" autocomplete="off">';
                    /*echo 'DNI: <input value="'.$fila["dni"].'" type="text" name="dni" readonly="readonly">';
                    echo '&nbsp&nbsp';
                    echo 'Nombre y Apellidos: <input value="'.$fila["nombre"].'" type="text" name="nombre" >';
                    echo '&nbsp&nbsp';
                    echo 'Correo: <input value="'.$fila["correo"].'" type="text" name="correo" >';
                    echo '&nbsp&nbsp';
                    echo '<input type="submit" name="registrar" value="Registrar" id="btn_cs">';
                    echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
                    echo '<button id="btn_cs"><a style="text-decoration:none;color:black" href="borrar_profesor.php?dni='.$fila["dni"].'">Eliminar</a></button>';
                    echo '</br></br>';
                    echo '-----------------------------------------------------------------';
                    echo '</br></br>';*/
                    echo 'Seleccione Profesor: <select name="dni" id="select_prof" required>';
                    while($fila=$conexion->resultado->fetch_array()){
                        echo '<option value='.$fila["dni"].'>'.$fila["nombre"].'</option>';
                    } 
                    echo '</select>';
                    echo '&nbsp&nbsp';
                    echo '<input type="submit" name="registrar" value="Registrar" id="btn_cs">';
                echo '</form>'; 
            }else{
                echo '<h1>Error al recuperar los datos</h1>'; 
            }
        ?>
    </div>
    <div id="btn_atras">
        <a href="../gestor.php"><img src="../images/atras.png"/></a>
    </div>
</body>
</html>
