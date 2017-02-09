<!DOCTYPE html>
<html lang="es">
<head>
    <title>Identificacion</title>
    <meta charset="utf-8">
    <link type="text/css" href="css/estilo_ident.css" rel="stylesheet" />
    <link href='https://fonts.googleapis.com/css?family=Shadows+Into+Light|Covered+By+Your+Grace' rel='stylesheet' type='text/css'>
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <script src="../js/validaciones_ident.js" type="text/javascript"></script>
</head>
 
<body>
    <div id="principal">
        <div id="contenedor">
            <div id="cabecera" >
                <h3>Gestion Sustituciones</h3>
            </div>
 
            <div id="cuerpo"> 
                <form id="form-login" action="comprobar.php" method="post" autocomplete="off">
                    <p><label >Identificador Usuario: </label></p>
                        <input name="usuario" type="text" id="usuario" placeholder="Ingresa Usuario" required="" onblur="validarIdUsuario(this)"></p>
 
                    <p><label>Contraseña:</label></p>
                        <input name="pass" type="password" id="pass" placeholder="Ingresa Password" required="" onblur="validarPass(this)"></p>

                    <p id="bot"><input type="submit" id="submit" name="submit" value="Ingresar" class="boton"></p>
                    </br>
                </form>
            </div>
            <div id="pie">
                <a href="recuperar_pass.php" style="text-decoration:none">Recuperar mi contraseña</a>
            </div>
            <!--<?php
                /*if(isset($_GET["varUser"])){
                    echo '<script language="javascript">alert("Datos no validos");</script>'; 
                }*/
            ?>-->
            <?php
                if(isset($_GET["varUser"])){
                    echo '<h2 style="color:red;text-align:center">Datos no validos</h2>'; 
                }
            ?>
        </div>
    </div>
</body>
</html>
