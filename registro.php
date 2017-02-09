<!DOCTYPE html>
<html lang="es">
<head>
    <title>Registro</title>
    <meta charset="utf-8">
    <link type="text/css" href="css/estilo_ident.css" rel="stylesheet" />
    <link href='https://fonts.googleapis.com/css?family=Shadows+Into+Light|Covered+By+Your+Grace' rel='stylesheet' type='text/css'>
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <script src="js/validaciones_reg.js" type="text/javascript"></script>
</head>
 
<body>
    <div id="principal">
        <div id="contenedor">
            <div id="cabecera">
                <h3>Registro</h3>
            </div>
            <div id="cuerpo"> 
                <form id="form-login" action="diseno1.php" method="post" autocomplete="off">
                    <p><label> Identificador Usuario: </label></p>
                        <input name="id_usuario" type="text" id="id_usuario" placeholder="Ingresa Id_Usuario" required="" onblur="">
                    <p><label> Usuario: </label></p>
                        <input name="usuario" type="text" id="usuario" placeholder="Ingresa Usuario" required="" onblur="">
                    <p><label> Nombre Completo: </label></p>
                        <input name="nombre" type="text" id="nombre" placeholder="Ingresa Nombre" required="" onblur="">       
                    <p><label>Contraseña:</label></p>
                        <input name="pass" type="text" id="pass" placeholder="Ingresa Password" required="" onblur="">
                    <p><label> Tipo:</label></p>
                    <select name="tipo">
                        <option value="A">Administrador</option>
                        <option value="G">Gestor</option>
                    </select>
                    <p><label>Imagen: </label></p>
                        <input type="file" name="imagen">
                    <p id="bot"><input type="submit" id="submit" name="submit" value="Registrar" class="boton">
                </form>
            </div>
        </div>
    </div>
</body>
</html>