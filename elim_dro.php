<?php
session_start();
$elec=$_GET['elec'];
$comp=$_GET['comp'];
$dosis=$_GET['dosis'];
require "conect.php";
$p="SELECT * FROM productos WHERE droga_id='$elec'";
$pr=mysqli_query($conn,$p);
while($fila=mysqli_fetch_assoc($pr)){
    $prod=$fila['prod_id'];


$lot="DELETE FROM lotes WHERE prod_id='$prod'";
$fa=mysqli_query($conn,$lot);

$pro="DELETE FROM productos WHERE prod_id='$prod'";

$j=mysqli_query($conn,$pro);
}

$el="DELETE FROM droga WHERE droga_id='$elec'";

$resul=mysqli_query($conn,$el);

if(mysqli_affected_rows($conn)>0){
 $_SESSION['mensaje'] = "La droga:$comp $dosis fue eliminada exitosamente";
 $_SESSION['tipo_mensaje'] = 'success';
    if ($resul){
        header("location:./droga.php");
    }
    

    }
    else{
        $_SESSION['mensaje'] = "No se pudo eliminar la droga: $comp $dosis";
        $_SESSION['tipo_mensaje'] = 'danger';
        if ($resul){
            header("location: ./droga.php");
        }
    }


?>