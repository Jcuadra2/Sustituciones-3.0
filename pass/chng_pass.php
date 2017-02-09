<!DOCTYPE html>
<html lang="es">
<head>
    <title>Administrador</title>
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
                $id_user=$_SESSION['administrador'];
                $nombre=$_COOKIE['c_admin'];
                if(isset($_SESSION['administrador'],$_COOKIE['c_admin'])){
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
        <h1>Administrador</h1>
    </div>
    <div id="contenido_importar">
       <h2>Cambio de Contraseña</h2>
        <form name="formu_chg_pass" action="psswd_chg.php" method="post">
            Contraseña Antigua: <input type="password" name="old_pass" required/>
            </br></br>
            Nueva Contraseña: <input type="password" name="new_pass" required/>
            </br></br>
            Repita Contraseña: <input type="password" name="new_pass2" required/>
            </br></br>
            <input type="submit" name="Enviar" id="btn_cs">
        </form>
    </div>
    <div id="btn_atras">
        <a href="../admin.php"><img src="../images/atras.png"/></a>
    </div>
</body>
</html>