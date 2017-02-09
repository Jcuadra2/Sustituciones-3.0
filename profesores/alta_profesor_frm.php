<!DOCTYPE html>
<html lang="es">
<head>
    <title>Insertar Datos</title>
    <meta charset="utf-8">
    <link type="text/css" href="../css/estilo_principal.css" rel="stylesheet" />
    <link href='https://fonts.googleapis.com/css?family=Shadows+Into+Light|Covered+By+Your+Grace' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Jockey+One' rel='stylesheet' type='text/css'>
    <script src="../js/validaciones_reg.js" type="text/javascript"></script>
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
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
        <h1>Alta Profesor</h1>
    </div>
    </br></br>
    <div id="contenido_importar">
        <form name="formulario" action="insertar_profesor.php" method="post" enctype="multipart/form-data">
            DNI: <input id="dni" type="text" name="dni" onblur="validarDni(this)" required/>
            </br></br>
            Nombre y Apellidos: <input id="nombre" type="text" name="nombre" onblur="" required/>
            </br></br>
            Correo: <input id="correo" type="text" name="correo" onblur="validarEmail(this)" required/>
            </br></br>
            <input id="btn_cs" type="submit" name="alta" value="Enviar" class="boton">
            </br></br>
            <p style="color:red" id="resultado"></p>
            <p style="color:red" id="mensaje"></p>
        </form>
        <p id="resultado"></p>    
    </div>
    <div id="btn_atras">
        <a href="profesores.php"><img src="../images/atras.png"/></a>
    </div>
</body>
</html>