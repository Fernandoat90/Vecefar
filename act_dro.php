<?php
session_start();
$dro=$_GET['droga_id'];
$comp=$_GET['dro_componentes'];
$dos=$_GET['dro_dosis'];

require "conect.php";

$sql="UPDATE droga
set droga_id='$dro',dro_componentes='$comp',dro_dosis='$dos'
WHERE droga_id='$dro'";

$resulset=mysqli_query($conn,$sql);

if(mysqli_affected_rows($conn)>0){
 $_SESSION['mensaje'] = "Los datos se actualizaron exitosamente";
 $_SESSION['tipo_mensaje'] = 'success';
    if ($resulset){
        header("location:./droga.php");
    }
    

    }
    else{
        $_SESSION['mensaje'] = "No se pudo actualizar los datos";
        $_SESSION['tipo_mensaje'] = 'danger';
        if ($resulset){
            header("location: ./droga.php");
        }
    }


?>