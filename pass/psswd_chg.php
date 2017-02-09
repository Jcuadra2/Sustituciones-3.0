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
        <?php
            $old_pass=$_POST["old_pass"];
            $conexion=new conexionBD();
            $conexion->conectar();
            $consulta = 'SELECT * FROM usuarios WHERE tipo="A";';
            $conexion->consultar($consulta);
            $fila = $conexion->resultado->fetch_array();
            $bd_pass= $fila["pass"];

            if(password_verify($old_pass,$bd_pass)){
                $new_pass=$_POST["new_pass"];
                $new_pass2=$_POST["new_pass2"];
                if($new_pass==$new_pass2){
                    $new_pass2_hash=password_hash($new_pass2,PASSWORD_BCRYPT);
                    $conexion2=new conexionBD();
                    $conexion2->conectar();
                    $consulta = 'UPDATE usuarios SET pass="'.$new_pass2_hash.'" WHERE tipo="A";';
                    $conexion2->consultar($consulta);
                        echo '<h1>Contraseña Cambiada Correctamente</h1>';   
                }else{
                    echo '<h1>Las contraseñas no coinciden</h1>';
                }
            }else{
                echo '<h1>La contraseña antigua no es correcta</h1>';
            }
        ?>
    </div>
    <div id="btn_atras">
        <a href="../admin.php"><img src="../images/atras.png"/></a>
    </div>
</body>
</html>

<!--pass="'.$old_pass.'" AND--> 