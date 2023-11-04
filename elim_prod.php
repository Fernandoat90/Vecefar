<?php
session_start();
$prod=$_GET['sel'];
$comp=$_GET['comp'];
$dosis=$_GET['dos'];
$marc=$_GET['marc'];
require "conect.php";
$p="SELECT * FROM lotes WHERE prod_id='$prod'";
$pr=mysqli_query($conn,$p);
while($fila=mysqli_fetch_assoc($pr)){
    $lot=$fila['lote_id'];


$lot="DELETE FROM lotes WHERE lote_id='$lot'";

$fa=mysqli_query($conn,$lot);

}


$pro="DELETE FROM productos WHERE prod_id='$prod'";

$resul=mysqli_query($conn,$pro);

if(mysqli_affected_rows($conn)>0){
 $_SESSION['mensaje'] = "El Producto:$comp $dosis de la marca $marc fue eliminado exitosamente";
 $_SESSION['tipo_mensaje'] = 'success';
    if ($resul){
        header("location:./prod_list.php");
    }
    

    }
    else{
        $_SESSION['mensaje'] = "No se pudo eliminar el producto";
        $_SESSION['tipo_mensaje'] = 'danger';
        if ($resul){
            header("location: ./prod_list.php");
        }
    }


?>