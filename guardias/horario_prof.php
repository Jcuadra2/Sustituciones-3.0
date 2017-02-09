<!DOCTYPE html>
<html lang="es">
<head>
    <title>Gestor</title>
    <meta charset="utf-8">
    <link type="text/css" href="../css/estilo_principal.css" rel="stylesheet" />
    <link type="text/css" href="../css/calendario.css" rel="stylesheet" />
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
        <h1>Asignados</h1>
    </div>
    <div id="menu">
        <ul>
            <li><a style="text-decoration:none;color:black" href="horario_sem.php">Horario de Asignacion</a></li>
    </div>
    <div id="contenido">
        <?php
            /*$hora=$_GET["id_h"];
            $dia=$_GET["id_d"];
            $conexion=new conexionBD();
            $conexion->conectar();
            $consulta = 'SELECT * FROM profesores INNER JOIN guardias
             ON profesores.dni=guardias.dni_prof_guardia WHERE profesores.n_guardias>"0"';
            $conexion->consultar($consulta);
            $num = $conexion->n_filas_devueltas();
            $fila = $conexion->resultado->fetch_array();*/
                    /*echo '<form name="formu" action="modificar_guardia.php" method="post" autocomplete="off">';
                        echo 'DNI: <input value="'.$fila["dni"].'" type="text" name="dni" required/>';
                        echo '&nbsp&nbsp';
                        echo 'Nombre y Apellidos: <input value="'.$fila["nombre"].'" type="text" name="nombre" required/>';
                        echo '&nbsp&nbsp';
                        echo 'N Guardias Semanales: <input id="n_g" value="'.$fila["n_guardias"].'" type="text" name="n_guardias" readonly="readonly">';
                        echo '&nbsp&nbsp';
                        echo 'N Guardias Totales: <input id="n_g" value="'.$fila["n_guardias_tot"].'" type="text" name="n_guardias_tot" readonly="readonly">';
                        echo '&nbsp&nbsp';
                        echo 'Hora Asignada: <input id="n_g" type="text" name="hora" value="'.$fila["hora"].'" readonly="readonly">';
                        echo '&nbsp&nbsp';
                        echo 'Dia semana: <input style="width:60px"  type="text" name="d_semana" value="'.$fila["dia_semana"].'"readonly="readonly">';
                        echo '&nbsp&nbsp';
                        echo '<input type="hidden" name="dni_bd" value="'.$fila["dni"].'">';
                        echo '</br></br>';
                        echo '<input id="btn_cs" type="submit" name="Modificar" value="Modificar">';
                        echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
                        echo '<button id="btn_cs"><a style="text-decoration:none;color:black" href=eliminar_guardia.php?dni='.$fila["dni"].'>Eliminar</a></button>';
                        echo '</br></br>';
                        echo '-----------------------------------------------------------------';
                        echo '</br></br>';
                    echo '</form>';*/
            echo '<table id="calendario">';
                echo '<thead>';
                    echo '<tr id="mes">';
                        echo '<td colspan="7">HORARIO PROFESORES ASIGNADOS</td>';
                    echo '</tr>';
                    echo '</br></br>';
                echo '</thead>';
                echo '<tbody>';
                        $dia=array("Lunes","Martes","Miercoles","Jueves","Viernes","");
                        echo '<tr id="dia">';
                        for($i=0;$i<5;$i++){
                            echo '<td>'.$dia[$i].'</td>';
                            /*for($j=0;$j<6;$j++){
                                if($fila["dia_semana"]=="Lunes"){
                                    echo '<td id="hora">'.$fila["nombre"].'</td>';
                                }elseif($fila["dia_semana"]=="Martes"){
                                    echo '<td id="hora">'.$fila["nombre"].'</td>';
                                }elseif($fila["dia_semana"]=="Miercoles"){
                                    echo '<td id="hora">'.$fila["nombre"].'</td>';
                                }elseif($fila["dia_semana"]=="Jueves"){
                                    echo '<td id="hora">'.$fila["nombre"].'</td>';
                                }elseif($fila["dia_semana"]=="Viernes"){
                                    echo '<td id="hora">'.$fila["nombre"].'</td>';
                                }
                                //echo '<td id="hora"><a href="asignar_guardia_frm.php?id_h='.$hora[$j].'&id_d='.$dia[$i].'" style="text-decoration:none;">'.$fila["nombre"].'</a></td>';*/
                        }
                        echo '</tr>';
                echo '</tbody>';
            echo '</table>';
            //echo '<h1>Pagina en Manteminiento</h1>'; 
        ?>
    </div>
    <!--<div id="btn_atras">
        <a href="horario_sem.php"><img src="../images/atras.png"/></a>
    </div>-->
</body>
</html>
