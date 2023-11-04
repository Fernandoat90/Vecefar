<?php
session_start();
$id=$_GET['lab_id'];
$nom=$_GET['lab_nombre'];

require "conect.php";

$sql="UPDATE laboratorios
set lab_nombre='$nom'
WHERE lab_id='$id'";

$resulset=mysqli_query($conn,$sql);

if(mysqli_affected_rows($conn)>0){
 $_SESSION['mensaje'] = "Nombre del laboratorio:$nom  actualizado exitosamente";
 $_SESSION['tipo_mensaje'] = 'success';
    if ($resulset){
        header("location:./laboratorio.php");
    }
    

    }
    else{
        $_SESSION['mensaje'] = "No se pudo actualizar el laboratorio $nom";
        $_SESSION['tipo_mensaje'] = 'danger';
        if ($resulset){
            header("location: ./laboratorio.php");
        }
    }


?>