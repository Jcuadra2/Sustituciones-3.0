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
    <div id="titulo">
        <h1>Alta Seccion</h1>
    </div>
    </br></br>
    <div id="contenido_importar">
        <form name="formu" action="insertar_seccion.php" method="post" enctype="multipart/form-data">
            Id Seccion: <input id="dni" type="text" name="idseccion" required/>
            </br></br>
            Nombre Completo: <input id="nombre" type="text" name="nombre" required/>
            </br></br>
            <input id="btn_cs" type="submit" name="alta" value="Enviar" class="boton">
        </form>    
    </div>
    <div id="btn_atras">
        <a href="secciones.php"><img src="../images/atras.png"/></a>
    </div>
</body>
</html>