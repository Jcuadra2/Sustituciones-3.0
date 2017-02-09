<!DOCTYPE html>
<html lang="es">
<head>
    <title>Gestor</title>
    <meta charset="utf-8">
    <link type="text/css" href="css/estilo_principal.css" rel="stylesheet" />
    <link href='https://fonts.googleapis.com/css?family=Shadows+Into+Light|Covered+By+Your+Grace' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Jockey+One' rel='stylesheet' type='text/css'>
</head>
 
<body>
    <div id="cabecera">
        <div id="imagen">
            <img src="images/logo.png"/>
        </div>
        <div id="login">
            <?php
                require_once"/Conexion/clase_conexion.php";
                session_start();
                $id_user=$_SESSION['gestor'];
                $nombre=$_COOKIE['c_gestor'];
                if(isset($_SESSION['gestor'],$_COOKIE['c_gestor'])){
                    echo '<p>'.$nombre.'<p>';
                }else{
                    header("Location:error.php");
                }
                echo '<p>Imagen</p>';
                echo '<p id="bot"><button id="btn_cs"><a style="text-decoration:none;color:black" href="cerrar_sesion.php">Cerrar Sesion</a></button></p>';
            ?>
        </div>
    </div>
    <div id="titulo">
        <h1>Gestor</h1>
    </div>
    <div id="menu">
        <ul>
            <li><a style="text-decoration:none;color:black" href="gestor.php">Inicio</a></li>
            <li><a style="text-decoration:none;color:black" href="importar/importar_frm.php">Importar</a></li>
            <li><a style="text-decoration:none;color:black" href="profesores/profesores.php">Profesores</a></li>
            <li><a style="text-decoration:none;color:black" href="secciones/secciones.php">Secciones</a></li>
            <li><a style="text-decoration:none;color:black" href="guardias/horario_sem.php">Asignar Guardias</a></li>
            <li><a style="text-decoration:none;color:black" href="faltas/reg_faltas_frm.php">Registrar Faltas</a></li>
            <li><a style="text-decoration:none;color:black" href="sustituciones/asignar_sustitucion_frm.php">Registrar Sustituciones</a></li>
        </ul>
    </div>
    <div id="contenido">
        
    </div>
</body>
</html>