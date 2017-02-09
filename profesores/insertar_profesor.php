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
        <?php
            $dni=$_POST["dni"];
            $nombre=$_POST["nombre"];
            $correo=$_POST["correo"];

            $conexion=new conexionBD();
            $conexion->conectar();
            $consulta = 'INSERT INTO profesores (dni,nombre,correo)  VALUES ("'.$dni.'" ,"'.$nombre.'","'.$correo.'")';
            $conexion->consultar($consulta);
            $afectadas=$conexion->filas_afectadas();

            if($afectadas>0){
                echo '<h1>Profesor con DNI: "'.$dni.'" </h1>';
                echo '<h1>insertado correctamente</h1>';
            }else{
                echo '<h1>No se pudieron insertar los datos</h1>';
            }
        ?>    
    </div>
    <div id="btn_atras">
        <a href="profesores.php"><img src="../images/atras.png"/></a>
    </div>
</body>
</html>