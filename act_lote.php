<?php
session_start();
$lote=$_GET['actual'];
$id=$_GET['lote_id'];
$fec_ing=$_GET['lote_fec_ing'];
$ven=$_GET['lote_venci'];
$cant=$_GET['lote_cant'];
$prod=$_GET['producto'];
$emp=$_SESSION['id'];

require "conect.php";

$b="SELECT*FROM productos WHERE prod_id='$prod'";

$n=mysqli_query($conn,$b);

while($fila=mysqli_fetch_assoc($n)){
    $a=$fila['prod_stock_actual'];
}

$re="SELECT*FROM lotes WHERE lote_id='$lote'";
$res=mysqli_query($conn,$re);

while($fila=mysqli_fetch_assoc($res)){
    $resto=$fila['lote_cant'];
}

$a=$a-$resto;

$a=$a+$cant;

if($a<0){
    $a=0;
}

if($cant<0){
    $cant=0;
}

$act="UPDATE productos
 SET prod_stock_actual=$a
  WHERE prod_id='$prod'";
$resul=mysqli_query($conn,$act);


$sql="UPDATE lotes
set lote_id='$id',lote_fec_ing='$fec_ing',lote_venci='$ven',lote_cant='$cant',prod_id='$prod',emp_id='$emp'
WHERE lote_id='$lote'";

$resulset=mysqli_query($conn,$sql);

if(mysqli_affected_rows($conn)>0){
 $_SESSION['mensaje'] = "El lote se actualizo exitosamente";
 $_SESSION['tipo_mensaje'] = 'success';
    if ($resulset){
        header("location:./list.php");
    }
    

    }
    else{
        $_SESSION['mensaje'] = "No se pudo actualizar el lote";
        $_SESSION['tipo_mensaje'] = 'danger';
        if ($resulset){
            header("location: list.php");
        }
    }

?>