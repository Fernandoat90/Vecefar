<?php
session_start();
$id=$_GET['id'];
$nom=$_GET['nom'];

require "conect.php";
$p="SELECT * FROM productos WHERE lab_id='$id'";
$pr=mysqli_query($conn,$p);
while($fila=mysqli_fetch_assoc($pr)){
    $prod=$fila['prod_id'];


$lot="DELETE FROM lotes WHERE prod_id='$prod'";
$fa=mysqli_query($conn,$lot);

$pro="DELETE FROM productos WHERE prod_id='$prod'";

$j=mysqli_query($conn,$pro);
}

$el="DELETE FROM laboratorios WHERE lab_id='$id'";

$resul=mysqli_query($conn,$el);

if(mysqli_affected_rows($conn)>0){
 $_SESSION['mensaje'] = "el laboratorio $nom fue eliminado exitosamente";
 $_SESSION['tipo_mensaje'] = 'success';
    if ($resul){
        header("location:./laboratorio.php");
    }
    

    }
    else{
        $_SESSION['mensaje'] = "No se pudo eliminar el laboratorio $nom";
        $_SESSION['tipo_mensaje'] = 'danger';
        if ($resul){
            header("location: ./laboratorio.php");
        }
    }


?>