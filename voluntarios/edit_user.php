<?php

include("connection.php");
$con = connection();

$id =$_POST["id"];
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$experiencia = $_POST['experiencia']; 
$puesto = $_POST['puesto']; 



$sql="UPDATE voluntarios SET nombre='$nombre', correo='$correo', telefono='$telefono', experiencia='$experiencia', puesto='$puesto' WHERE id='$id'";
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: index.php");
}else{

}

?>