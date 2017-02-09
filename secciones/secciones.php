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
                    header("Location:error.php");
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
            <li><a style="text-decoration:none;color:black" href="alta_seccion_frm.php">Alta Nueva Seccion</a></li>
        </ul>
    </div>
    <div id="contenido_formu">
        <?php
            $conexion=new conexionBD();
            $conexion->conectar();
            $consulta = 'SELECT * FROM secciones';
            $conexion->consultar($consulta);
            $num = $conexion->n_filas_devueltas();
            if($num>0){
                while($fila = $conexion->resultado->fetch_array()){
                    echo '<form name="formu" action="modificar_seccion.php" method="post" autocomplete="off">';
                        echo 'Id Seccion: <input value="'.$fila["idseccion"].'" type="text" name="id_seccion">';
                        echo '&nbsp&nbsp';
                        echo '<input type="hidden" name="id_old" value="'.$fila["idseccion"].'">';
                        echo 'Nombre: <input value="'.$fila["nombre"].'" type="text" name="nombre">';
                        echo '&nbsp&nbsp';
                        echo '<input type="submit" name="Modificar" value="Modificar" id="btn_cs">';
                        echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
                        echo '<button id="btn_cs"><a style="text-decoration:none;color:black" href="borrar_seccion.php?id_seccion='.$fila["idseccion"].'">Eliminar</a></button>';
                        echo '</br></br>';
                        echo '-----------------------------------------------------------------';
                        echo '</br></br>';
                    echo '</form>'; 
                }
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