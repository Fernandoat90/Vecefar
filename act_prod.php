<?php
session_start();
$prod=$_GET['prod_id'];
$marc=$_GET['prod_marca'];
$stock_min=$_GET['prod_stock_min'];
$comp=$_GET['prod_cant_comprimidos'];
$pre=$_GET['prod_precio'];
$dro=$_GET['dro'];
$lab=$_GET['lab'];


require "conect.php";

$sql="UPDATE productos
set prod_marca='$marc',prod_stock_min='$stock_min',prod_cant_comprimidos='$comp',prod_precio='$pre',droga_id='$dro',lab_id='$lab'
WHERE prod_id='$prod'";

$resulset=mysqli_query($conn,$sql);

if(mysqli_affected_rows($conn)>0){
 $_SESSION['mensaje'] = "Los datos se actualizaron exitosamente";
 $_SESSION['tipo_mensaje'] = 'success';
    if ($resulset){
        header("location:./producto.php");
    }
    

    }
    else{
        $_SESSION['mensaje'] = "No se pudo actualizar los datos";
        $_SESSION['tipo_mensaje'] = 'danger';
        if ($resulset){
            header("location: ./producto.php");
        }
    }


?>