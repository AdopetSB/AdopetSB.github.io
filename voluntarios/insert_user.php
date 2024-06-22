<?php
include("connection.php");
$con = connection();

$id = null;
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$experiencia = $_POST['experiencia']; 
$puesto = $_POST['puesto']; 


$sql = "INSERT INTO voluntarios VALUES('$id','$nombre','$correo','$telefono', '$experiencia', '$puesto')";
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: index.php");
}else{

}

?>