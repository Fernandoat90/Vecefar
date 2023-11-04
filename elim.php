<?php
session_start();
$el=$_GET['sel'];
$cant=$_GET['cant'];
$prod=$_GET['prod'];
require "conect.php";



    $r="DELETE FROM lotes WHERE lote_id='$el'";

    $resulset=mysqli_query($conn,$r);


    if(mysqli_affected_rows($conn)>0){

$b="SELECT*FROM productos WHERE prod_id='$prod'";

$n=mysqli_query($conn,$b);

while($fila=mysqli_fetch_assoc($n)){
    $a=$fila['prod_stock_actual'];
}
$a=$a-$cant;

if($a<0){
    $a=0;
}

$res="UPDATE productos
 SET prod_stock_actual=$a
  WHERE prod_id='$prod'";
$resul=mysqli_query($conn,$res);

if(mysqli_affected_rows($conn)>0){
 $_SESSION['mensaje'] = "El lote fue eliminado exitosamente";
 $_SESSION['tipo_mensaje'] = 'success';
    if ($resulset){
        header("location:./list.php");
    }
    

    }
    else{
        $_SESSION['mensaje'] = "No se pudo eliminar el lote";
        $_SESSION['tipo_mensaje'] = 'danger';
        if ($resulset){
            header("location: ./list.php");
        }
    }
    }
?>