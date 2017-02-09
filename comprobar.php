<?php
    session_start();
    $user=$_POST["usuario"];

    require_once"/Conexion/clase_conexion.php";
    $conexion=new conexionBD();
    $conexion->conectar();
    $sentencia = $conexion->prepare('SELECT * FROM usuarios WHERE user=?');
    $sentencia->bind_param('s',$user);
    $sentencia->execute();
    $conexion->resultado = $sentencia->get_result();
    $num = $conexion->n_filas_devueltas();
    
    if($num>0){
        $pass=$_POST["pass"];
        $fila = $conexion->resultado->fetch_array();
        $bd_pass = $fila["pass"];
        if(password_verify($pass,$bd_pass)){
            if($fila["tipo"]=='A'){
                $_SESSION['administrador']=$fila["id_user"];
                setcookie("c_admin",$fila["nombre"],time()+3600);
                header("Location:admin.php");
            }elseif($fila["tipo"]=='G'){
                $_SESSION['gestor']=$fila["id_user"];
                setcookie("c_gestor",$fila["nombre"],time()+3600);
                header("Location:gestor.php");
            }
        }else{
            header("Location:identificacion.php?varUser=false");
        } 
    }else{
         header("Location:identificacion.php?varUser=false");
    }
    
    $sentencia->close();
    $conexion->desconectar();
?>
