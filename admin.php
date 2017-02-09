<!DOCTYPE html>
<html lang="es">
<head>
    <title>Administrador</title>
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
                session_start();
                $id_user=$_SESSION['administrador'];
                $nombre=$_COOKIE['c_admin'];
                if(isset($_SESSION['administrador'],$_COOKIE['c_admin'])){
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
        <h1>Administrador</h1>
    </div>
    <div id="menu">
        <ul>
            <!--<li><a style="text-decoration:none;color:black" href="importar/importar_prof.php">Importar Datos Profesores</a></li>
            <li><a style="text-decoration:none;color:black" href="importar/importar_secc.php">Importar Datos Secciones</a></li>-->
            <li><a style="text-decoration:none;color:black" href="admin.php">Inicio</a></li>
        </ul>
    </div>
    <div id="contenido">
        <p id="bot"><button class="botton"><a style="text-decoration:none;color:black" href="pass/chng_pass.php">Cambiar Contraseña</a></button></p>
    </div>
</body>
</html>
