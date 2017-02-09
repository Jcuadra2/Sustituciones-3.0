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
        <h1>Calendario</h1>
    </div>
    <div id="menu">
        <ul>
            <li><a style="text-decoration:none;color:black" href="prof_asignados.php">Profesores Asignados</a></li>
    </div>
    <div id="contenido_calnd">
        <?php
        require_once("/../Conexion/clase_conexion.php");
        $conexion=new conexionBD();
        $conexion->conectar();
        $consulta = 'SELECT * FROM profesores';
        $conexion->consultar($consulta);
        $fila=$conexion->resultado->fetch_array();
        
            echo '<table id="calendario">';
                echo '<thead>';
                    echo '<tr id="mes">';
                        echo '<td colspan="7">HORARIO ASIGNACION GUARDIAS</td>';
                    echo '</tr>';
                    echo '</br></br>';
                echo '</thead>';
                echo '<tbody>';
                        $dia=array("Lunes","Martes","Miercoles","Jueves","Viernes","");
                        $hora= array("1","2","3","4","5","6");
                        for($i=0;$i<5;$i++){
                            echo '<tr id="dia">';
                            echo '<td>'.$dia[$i].'</td>';
                            for($j=0;$j<6;$j++){
                                echo '<td id="hora"><a href="asignar_guardia_frm.php?id_h='.$hora[$j].'&id_d='.$dia[$i].'" style="text-decoration:none;">'.$hora[$j].'Hora</a></td>';
                            }
                            echo '</tr>';
                        }
                echo '</tbody>';
            echo '</table>';
            //echo '<button id="btn_calnd"><a style="text-decoration:none;color:black" href="horario_prof.php">Horario con Profesores Asignados</a></button>';
        ?>
    </div>
    <div id="btn_atras">
        <a href="../gestor.php"><img src="../images/atras.png"/></a>
    </div>
</body>
</html>